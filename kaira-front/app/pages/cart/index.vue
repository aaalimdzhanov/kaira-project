<template>
    <div>
        <section class="py-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="page-title pb-2">{{ t('menu.cart') }}</h1>
                    <nav class="breadcrumb">
                    <NuxtLink to="/" class="breadcrumb-item">{{ t('menu.home') }}</NuxtLink>
                    <span class="breadcrumb-item active" aria-current="page">{{ t('menu.cart') }}</span>
                </nav>
                </div>
            </div>
        </section>

        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="cart-table">
                            <div class="cart-header">
                                <div class="row d-flex">
                                    <h6 class="cart-title text-uppercase text-muted col-lg-4 pb-3">{{ t('menu.product') }}</h6>
                                    <h6 class="cart-title text-uppercase text-muted col-lg-3 pb-3">{{ t('menu.quantity') }}</h6>
                                    <h6 class="cart-title text-uppercase text-muted col-lg-4 pb-3">{{ t('menu.subtotal') }}</h6>
                                </div>
                            </div>

                            <div v-for="item in cart.items" :key="item.id" class="cart-item border-top border-bottom">
                                <div class="row align-items-center">
                                    <!-- Product info -->
                                    <div class="col-lg-4 col-md-3">
                                        <div class="cart-info d-flex flex-wrap align-items-center mb-4">
                                            <div class="col-lg-5">
                                                <div class="card-image">
                                                    <img :src="item.image?.large" alt="product" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="card-detail ps-3">
                                                    <h5 class="card-title">
                                                        <a href="#" class="text-decoration-none">{{ item.name }}</a>
                                                    </h5>
                                                    <div class="card-price">
                                                        <span class="money text-dark">{{ formatPrice(item.price)
                                                            }}</span>
                                                    </div>
                                                    <small class="text-body-secondary">
                                                        Цвет: {{ item.color?.title || '-' }} , 
                                                        Размер: {{item.size?.title || '-' }}
                                                    </small>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Quantity -->
                                    <div class="col-lg-6 col-md-7">
                                        <div class="row d-flex">
                                            <div class="col-lg-4">
                                                <div class="input-group product-qty">
                                                    <button type="button"
                                                        class="quantity-left-minus btn btn-light btn-number"
                                                        @click="decreaseQty(item)">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                    <input type="text" class="form-control input-number text-center"
                                                        v-model.number="item.qty" min="1">
                                                    <button type="button"
                                                        class="quantity-right-plus btn btn-light btn-number"
                                                        @click="increaseQty(item)">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 text-center">
                                                <div class="total-price">
                                                    <span class="money text-dark">{{ formatPrice(item.price * item.qty)
                                                        }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Remove -->
                                    <div class="col-lg-1 col-md-2">
                                        <div class="cart-remove">
                                            <a href="#" @click.prevent="removeItem(item)">
                                                <svg width="32px">
                                                    <use xlink:href="#trash"></use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Total -->
                            <div class="cart-footer mt-3 text-end">
                                <strong>{{ t('menu.total') }}: {{ formatPrice(totalPrice) }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cart-totals bg-grey py-5">
                            <h4 class="text-dark pb-4">{{ t('menu.cart_total') }}</h4>
                            <div class="total-price pb-5">
                                <table cellspacing="0" class="table text-uppercase">
                                    <tbody>
                                        <tr class="order-total pt-2 pb-2 border-bottom">
                                            <th>{{ t('menu.total') }}</th>
                                            <td data-title="Total">
                                                <span class="price-amount amount text-dark ps-5">
                                                    <bdi>{{ totalPrice}} <span class="price-currency-symbol">UZS</span> </bdi>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <form @submit.prevent="submitCart">
                                <div class="button-wrap row g-2">
                                    <div class="col-md-12">
                                        <input type="tel" v-model="phoneNumber" placeholder="Enter your phone number"
                                            class="form-control text-uppercase btn-rounded-none w-100" required />
                                    </div>
                                    <div class="col-md-12">
                                        Capcha
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary text-uppercase btn-rounded-none w-100">
                                            {{ t('menu.order') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>
</template>

<script setup>
import { useToast } from "vue-toastification"
const toast = useToast()
const { t, locale } = useI18n()
import { computed } from 'vue'
import { useCartStore } from '~/stores/cart'

const cart = useCartStore()

// Форматируем цену
const formatPrice = (price) => {
    return new Intl.NumberFormat('ru-RU', { style: 'currency', currency: 'UZS' }).format(price)
}

// Общая сумма
const totalPrice = computed(() => {
    return cart.items.reduce((sum, item) => sum + parseFloat(item.price) * item.qty, 0)
})

// Увеличение/уменьшение количества
const increaseQty = (item) => {
    if (item.qty < item.stock) item.qty++
}

const decreaseQty = (item) => {
    if (item.qty > 1) item.qty--
}

// Удаление из корзины
const removeItem = (item) => {
    cart.items = cart.items.filter(i => i.id !== item.id)
}
const submitCart = async () => {
    try {
        const response = await $fetch('/api/cart', {
            method: 'POST',
            body: {
                items: cart.items.map(i => ({
                    id: i.id,
                    qty: i.qty,
                    colorId: i.color.id,
                    sizeId: i.size.id
                })),
                total: totalPrice.value
            }
        })

        console.log('Ответ сервера:', response)
        // Можно очистить корзину
        // cart.items = []
    } catch (err) {
        console.error('Ошибка отправки корзины:', err)
    }
}

</script>