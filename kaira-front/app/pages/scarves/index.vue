<template>
    <section class="pt-3 border-bottom">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                 <h1 class="text-uppercase fs-3">{{ t('menu.shop.scarves') }}</h1>
                <nav class="breadcrumb">
                    <NuxtLink to="/" class="breadcrumb-item">{{ t('menu.home') }}</NuxtLink>
                    <span class="breadcrumb-item active" aria-current="page">{{ t('menu.shop.scarves') }}</span>
                </nav>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row py-2">
                <div class="col-md-9">
                    <span>{{ t('menu.showing') }} 1–12 of 55 {{ t('menu.results') }}</span>
                </div>
                <div class="col-md-3">
                    <select class="form-select border-0" aria-label="Default select example">
                        <option selected>{{ t('menu.default_sorting') }}</option>
                        <option value="1">Color</option>
                        <option value="2">Size</option>
                        <option value="3">Price</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 mb-3 product-item link-effect" v-for="(product, index) in products" :key="index">
                    <div class="image-holder position-relative">
                        <NuxtLink :to="product.link">
                            <img :src="product.url" :alt="product.name" class="product-image img-fluid" />
                        </NuxtLink>
                        <div class="product-content">
                            <h5 class="text-uppercase fs-5 mt-3">
                                <NuxtLink :to="product.link">{{ product.name }}</NuxtLink>
                            </h5>
                            <span class="text-decoration-none" data-after="Add to cart">${{ product.price }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation" class="d-flex justify-content-center mt-5">
                <ul class="pagination">
                    <!-- prev -->
                    <li class="page-item" :class="{ disabled: !links.prev }">
                        <a class="page-link" href="#" @click.prevent="goToPage(currentPage - 1)">
                            <i class="icon icon-arrow-left"></i>
                        </a>
                    </li>
                    <!-- список страниц -->
                    <li v-for="page in meta.last_page" :key="page" class="page-item"
                        :class="{ active: page === meta.current_page }">
                        <a class="page-link" href="#" @click.prevent="goToPage(page)">{{ page }}</a>
                    </li>
                    <!-- next -->
                    <li class="page-item" :class="{ disabled: !links.next }">
                        <a class="page-link" href="#" @click.prevent="goToPage(currentPage + 1)">
                            <i class="icon icon-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</template>


<script setup>
const { t, locale } = useI18n()
import { ref, computed, watch } from 'vue'
import { useAsyncData } from '#app'
const currentPage = ref(1)
// получаем данные с бэка
const { data, pending, error, refresh } = await useAsyncData(
    'scarves',
    () => $fetch(`/api/scarves?page=${currentPage.value}&lang=${locale.value}`)
)
// computed для удобства
const products = computed(() => data.value?.data || [])
const meta = computed(() => data.value?.meta || {})
const links = computed(() => data.value?.links || {})

// следим за страницей → рефрешим данные
watch(currentPage, () => refresh())
// обработчик смены страницы
function goToPage(page) {
    if (page >= 1 && page <= meta.value.last_page) {
        currentPage.value = page
    }
}
</script>