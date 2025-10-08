<template>
  <main class="main-content mt-5">
    <div class="container">
      <nav class="breadcrumb">
        <NuxtLink to="/" class="breadcrumb-item">{{ t('menu.home') }}</NuxtLink>
        <NuxtLink to="/scarves" class="breadcrumb-item">{{ t('menu.shop.scarves') }}</NuxtLink>
      </nav>
    </div>
    <section id="product-detail" class="single-product py-5 no-padding-top">
      <div class="container">
        <div class="row g-5">
          <div class="col-md-7">
            <div class="row flex-column-reverse flex-lg-row">
              <div class="col-md-12 col-lg-3">
                <!-- product-thumbnail-slider -->
                <div class="swiper product-thumbnail-slider">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide" v-for="variant in variants">
                      <img :src="variant.image.thumbnail" alt="" class="thumb-image img-fluid">
                    </div>
                  </div>
                </div>
                <!-- / product-thumbnail-slider -->
              </div>
              <div class="col-md-12 col-lg-9">
                <!-- product-large-slider -->
                <div class="swiper product-large-slider">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide" v-for="(variant, index) in variants" :key="index">
                      <div class="image-zoom" :data-image="variant.image.large" :key="variant.id">
                        <img :src="variant.image.large" alt="product-large" class="img-fluid" />
                      </div>
                    </div>
                  </div>
                  <div class="swiper-pagination"></div>
                </div>
                <!-- / product-large-slider -->
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="product-info">
              <div class="element-header">
                <h2 itemprop="name" class="product-title text-uppercase">{{ name }}</h2>
              </div>
              <div class="product-price">
                <span class="fs-2">{{ activeVariant.price }}</span>
                <del>{{ activeVariant.oldPrice }}</del>
                UZS
              </div>
              <p>{{ description }}</p>
              <!-- COLOR -->
              <div class="color-product-options mt-4">
                <div class="color-toggle" data-option-index="0">
                  <div class="item-title">
                    {{ t('menu.country') }}: <span>{{ activeVariant?.country.title }}</span>
                  </div>
                  <div class="item-title">
                    {{ t('menu.brand') }}: <span>{{ activeVariant?.brands.title }}</span>
                  </div>
                  <div class="item-title">
                    {{ t('menu.season') }}: <span>{{ activeVariant?.season.title }}</span>
                  </div>
                  <div class="item-title">
                    {{ t('menu.material') }}: <span>{{ activeVariant?.material.title }}</span>
                  </div>
                  <div class="item-title">
                    {{ t('menu.color') }}: <span>{{ activeVariant?.color?.title || '-' }}</span>
                  </div>
                  <div class="color-item" v-for="v in variants" :key="v.color.id" :data-val="v.color.key"
                    :title="v.color.title" @click="activeVariant = v">
                    <span class="color-inner" :style="{ backgroundColor: v.color.key }"></span>
                  </div>
                </div>
              </div>

              <div class="swatch d-flex flex-wrap option-1 mt-4" data-option-index="1">
                <div class="item-title">{{ t('menu.size') }}:</div>

                <div v-for="variant in variants" :key="variant.size.id" class="swatch-element"
                  @click="activeVariant = variant">
                  <input class="swatch-input hide" type="radio" :id="`size-${variant.size.id}`" name="option-1"
                    :value="variant.size.title" :checked="activeVariant.size.id === variant.size.id" />
                  <label class="swatch-label square-only" :for="`size-${variant.size.id}`">
                    {{ variant.size.title }}
                  </label>
                </div>
              </div>

              <div class="product-action mt-4">
                <div class="item-title">{{ activeVariant.stock }} {{ t('menu.in_stock') }}</div>
                <div class="product-quantity d-flex flex-wrap">
                  <div class="input-group product-qty me-3" style="max-width: 150px;">
                    <span class="input-group-btn">
                      <button type="button" class="quantity-left-minus btn btn-light btn-number" @click="decrease">
                        <svg width="16" height="16">
                          <use xlink:href="#minus"></use>
                        </svg>
                      </button>
                    </span>

                    <input type="number" id="quantity" name="quantity" class="form-control input-number text-center"
                      v-model="quantity" min="1" max="100" />

                    <span class="input-group-btn">
                      <button type="button" class="quantity-right-plus btn btn-light btn-number" @click="increase">
                        <svg width="16" height="16">
                          <use xlink:href="#plus"></use>
                        </svg>
                      </button>
                    </span>
                  </div>
                  <button type="submit" name="add" id="add-to-cart" @click="addToCart(activeVariant)"
                    class="btn btn-dark product-cart-submit btn-lg text-uppercase me-3">
                    <span id="add-to-cart">{{ t('menu.add_to_cart') }}</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script setup>
const { t, locale } = useI18n()
import { ref } from 'vue'
import { useFetch, useRoute } from '#app'
import { useCartStore } from '~/stores/cart'
const { $toast } = useNuxtApp()
const cart = useCartStore()
const route = useRoute()
const { data } = await useFetch(`/api/scarves/${route.params.id}`)
const { name, description } = data.value
const variants = computed(() => {
  if (!data.value) return []
  return data.value.values?.map(v => ({
    id: data.id,
    image: v.image,
    color: v.color,
    size: v.size,
    price: v.price,
    oldPrice: v.old_price,
    stock: v.stock,
    name: data.value.name,
    material: data.value.material,
    season: data.value.season,
    country: data.value.country,
    brands: data.value.brands
  })) || []
})

const activeVariant = ref(null)
const quantity = ref(1)
watchEffect(() => {
  if (variants.value.length > 0 && !activeVariant.value) {
    activeVariant.value = variants.value[0]
  }
})
const addToCart = (product) => {
  if (cart.checkExist(product)) {
    return
  }
  cart.addToCart(product, quantity.value)
  quantity.value = 1
  $toast.success("Товар добавлен в корзину!")
}
const increase = () => {
  quantity.value++
}
const decrease = () => {
  if (quantity.value > 1) {
    quantity.value--
    cart.updateQty(activeVariant.value.id, quantity.value)
  } else {
    // если дошли до 1 и нажали "-", удаляем из корзины
    // если в корзине только один товар → после удаления будет пусто
    const isLastItem = cart.items.length === 1
    cart.removeItem(activeVariant.value.id)
    quantity.value = 1
    if (!isLastItem) {
      $toast.info("Товар удалён из корзины")
    }
  }
}
</script>
