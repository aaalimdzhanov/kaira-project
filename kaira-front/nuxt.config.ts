// nuxt.config.ts
export default defineNuxtConfig({
  modules: ['@nuxtjs/i18n','@pinia/nuxt'],
  app: {
    head: {
      title: 'Kaira',
      meta: [
        { charset: 'utf-8' },
        { 'http-equiv': 'X-UA-Compatible', content: 'IE=edge' },
        { name: 'viewport', content: 'width=device-width, initial-scale=1.0' },
        { name: 'format-detection', content: 'telephone=no' },
        { name: 'apple-mobile-web-app-capable', content: 'yes' },
        { name: 'author', content: 'TemplatesJungle' },
        { name: 'keywords', content: 'ecommerce,fashion,store' },
        { name: 'description', content: 'Bootstrap 5 Fashion Store HTML CSS Template' },
      ],
      link: [
        // CSS
        { rel: 'stylesheet', href: 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css', integrity: 'sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ', crossorigin: 'anonymous' },
        { rel: 'stylesheet', href: '/css/vendor.css' },
        { rel: 'stylesheet', href: 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css' },
        { rel: 'stylesheet', href: '/css/style.css' },
        { rel: 'preconnect', href: 'https://fonts.googleapis.com' },
        { rel: 'preconnect', href: 'https://fonts.gstatic.com', crossorigin: '' },
        { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Marcellus&display=swap' },
      ],
      script: [
        // JS
        { src: '/js/jquery.min.js', defer: true },
        { src: '/js/plugins.js', defer: true },
        { src: '/js/SmoothScroll.js', defer: true },
        { src: 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js', integrity: 'sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe', crossorigin: 'anonymous', defer: true },
        { src: 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', defer: true },
        { src: '/js/script.js', defer: true }
      ]
    }
  },
  i18n: {
    langDir: 'locales',
    locales: [
      { code: 'en', name: 'English', file: 'en.json' },
      { code: 'ru', name: 'Русский', file: 'ru.json' }
    ],
    defaultLocale: 'en',
    strategy: 'prefix_except_default'
  },
   runtimeConfig: {
    apiUrl: process.env.NUXT_API_URL || 'http://localhost:8088/api/v1',
    public: {}
  },
})
