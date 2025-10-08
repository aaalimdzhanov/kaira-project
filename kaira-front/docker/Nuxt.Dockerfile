# kaira-front/docker/Nuxt.Dockerfile
FROM node:20-alpine

WORKDIR /app

# Копируем только package.json
COPY package*.json ./

RUN npm install

# Копируем весь проект
COPY . .

RUN npm run build

ENV PORT=3000
ENV HOST=0.0.0.0
EXPOSE 3000

CMD ["npm", "run", "start"]
