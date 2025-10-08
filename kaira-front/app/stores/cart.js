import { defineStore } from 'pinia'

export const useCartStore = defineStore('cart', {
    state: () => ({
        items: []
    }),
    actions: {
        addToCart(product, qty = 1) {
            const existing = this.items.find(
                i =>
                    i.id === product.id &&
                    i.color?.id === product.color?.id &&
                    i.size?.id === product.size?.id
            )

            if (existing) {
                existing.qty += qty
            } else {
                this.items.push({ ...product, qty })
            }

            this.save()
        },
        removeItem(id) {
            this.items = this.items.filter(i => i.id !== id)
            this.save()
        },
        save() {
            if (process.client) localStorage.setItem('cart', JSON.stringify(this.items))
        },
        load() {
            if (process.client) {
                const data = localStorage.getItem('cart')
                if (data) this.items = JSON.parse(data)
            }
        },
        clear() {
            this.items = []
            this.save()
        },
        updateQty(productId, qty) {
            const item = this.items.find(i => i.id === productId)
            if (!item) return

            if (qty <= 0) {
                this.removeItem(productId) // ← правильное имя метода
            } else {
                item.qty = qty
            }
            this.save()
        }, 
        checkExist(product){
            const existing = this.items.find(
                i =>
                    i.id === product.id &&
                    i.color?.id === product.color?.id &&
                    i.size?.id === product.size?.id
            )
            if (existing) {
               return true
            } 
            return false
        }

    }
})
