import { useCartStore } from '~/stores/cart'

export default defineNuxtPlugin(() => {
  if (process.client) {
    const cart = useCartStore()
    cart.load()
  }
})
