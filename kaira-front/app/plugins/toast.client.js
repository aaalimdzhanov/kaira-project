import { defineNuxtPlugin } from '#app'
import Toast from 'vue-toastification'
import 'vue-toastification/dist/index.css'

export default defineNuxtPlugin((nuxtApp) => {
  // Подключаем Toast к Vue
  nuxtApp.vueApp.use(Toast, {
    timeout: 1000,
    position: 'top-right',
    transition: 'Vue-Toastification__fade'
  })
})
