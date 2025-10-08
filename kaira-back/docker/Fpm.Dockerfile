FROM php:8.3-fpm-bookworm

# Install composer and php-extension-installer
COPY --from=composer:lts /usr/bin/composer /usr/local/bin/composer
COPY --from=mlocati/php-extension-installer:2.1 /usr/bin/install-php-extensions /usr/local/bin/

# Install required packages
RUN apt-get update \
    && apt-get install -y \
    tzdata \
    supervisor \
    git \
    && rm -rf /var/lib/apt/lists/*

RUN mkdir -p "/var/log/supervisor"
COPY /docker/conf/supervisord.conf /etc/supervisor/supervisord.conf
COPY /docker/conf/php.ini /usr/local/etc/php/conf.d/php.ini

# Set timezone (you can modify this according to your timezone)
RUN cp /usr/share/zoneinfo/Asia/Tashkent /etc/localtime \
    && echo "Asia/Tashkent" > /etc/timezone
ENV TZ="Asia/Tashkent"

WORKDIR /var/www/kaira-back

RUN install-php-extensions \
# Add common extensions
    bcmath \
    exif \
    gd \
    imagick \
    pcntl \
    zip \
    soap \
    intl \
    xsl \
# Add LDAP support to PHP (uncomment if needed)
    ldap \
# Add MySQL support to PHP (uncomment if needed)
    pdo_mysql \
# Add PostgreSQL support to PHP (uncomment if needed)
    pdo_pgsql pgsql \
# Add MSSQL support to PHP (uncomment if needed)
    pdo_sqlsrv sqlsrv \
# Add Redis support to PHP (uncomment if needed)
    redis

RUN apt-get update && apt-get install -y cron
COPY /docker/conf/crontab /etc/cron.d/crontab
RUN chmod 0644 /etc/cron.d/crontab
RUN crontab /etc/cron.d/crontab
RUN touch /var/log/cron.log
RUN chmod 0757 /var/log/cron.log

EXPOSE 22 80

CMD /usr/bin/supervisord -n -c /etc/supervisor/supervisord.conf & cron && tail -f /var/log/cron.log & php-fpm
