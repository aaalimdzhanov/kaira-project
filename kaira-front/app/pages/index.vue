<template>
  <div class="homepage">
    <section id="billboard" class="bg-light py-5">
      <div class="container">
        <div class="row justify-content-center">
          <h1 class="section-title text-center mt-4" data-aos="fade-up">{{ t('home.new-collections') }}</h1>
          <div class="col-md-6 text-center" data-aos="fade-up" data-aos-delay="300">
            <p>{{ t('menu.greeting') }}</p>
          </div>
        </div>
        <div class="row">
          <div v-if="bestsellers.length" class="swiper main-swiper py-4" data-aos="fade-up" data-aos-delay="600">
            <div class="swiper-wrapper d-flex border-animation-left">
              <div class="swiper-slide" v-for="item in newded" :key="item.link">
                <div class="banner-item image-zoom-effect">
                  <div class="image-holder">
                    <a :href="item.link">
                      <img :src="item.url" alt="iproduct" class="img-fluid" />
                    </a>
                  </div>
                  <div class="banner-content py-4">
                    <h5 class="element-title text-uppercase">
                      <a :href="item.link" class="item-anchor">{{ item.name }}</a>
                    </h5>
                    <p>{{ item.description }}</p>
                    <div class="btn-left">
                      <a href="#" class="btn-link fs-6 text-uppercase item-anchor text-decoration-none">{{
                        t('home.discover_now') }}</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="icon-arrow icon-arrow-left"><svg width="50" height="50" viewBox="0 0 24 24">
              <use xlink:href="#angle-left"></use>
            </svg></div>
          <div class="icon-arrow icon-arrow-right"><svg width="50" height="50" viewBox="0 0 24 24">
              <use xlink:href="#angle-right"></use>
            </svg></div>
        </div>
      </div>
    </section>

    <section class="features py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="0">
            <div class="py-5">
              <svg width="38" height="38" viewBox="0 0 24 24">
                <use xlink:href="#calendar"></use>
              </svg>
              <h4 class="element-title text-capitalize my-3">{{ t('home.delevery') }}</h4>
              <p>{{ t('home.delevery_desc') }}</p>
            </div>
          </div>
          <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="300">
            <div class="py-5">
              <svg width="38" height="38" viewBox="0 0 24 24">
                <use xlink:href="#shopping-bag"></use>
              </svg>
              <h4 class="element-title text-capitalize my-3">{{ t('home.pickup_store') }}</h4>
              <p>{{ t('home.pickup_store_desc') }}</p>
            </div>
          </div>
          <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="600">
            <div class="py-5">
              <svg width="38" height="38" viewBox="0 0 24 24">
                <use xlink:href="#gift"></use>
              </svg>
              <h4 class="element-title text-capitalize my-3">{{ t('home.special_packaging') }}</h4>
              <p>{{ t('home.special_packaging_desc') }}</p>
            </div>
          </div>
          <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="900">
            <div class="py-5">
              <svg width="38" height="38" viewBox="0 0 24 24">
                <use xlink:href="#arrow-cycle"></use>
              </svg>
              <h4 class="element-title text-capitalize my-3">{{ t('home.order') }}</h4>
              <p>{{ t('home.order_desc') }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="categories overflow-hidden">
      <div class="container">
        <div class="open-up" data-aos="zoom-out">
          <div class="row">
            <div class="col-md-4">
              <div class="cat-item image-zoom-effect">
                <div class="image-holder">
                   <NuxtLink to="/clothing">
                    <img src="/images/cat-item1.jpg" alt="categories" class="product-image img-fluid">
                    </NuxtLink>
                </div>
                <div class="category-content">
                  <div class="product-button">
                    <NuxtLink class="btn btn-common text-uppercase" to="/clothing">{{ t('menu.shop.clothing') }}
                    </NuxtLink>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="cat-item image-zoom-effect">
                <div class="image-holder">
                  <NuxtLink to="/scarves">
                    <img src="/images/cat-item2.jpg" alt="categories" class="product-image img-fluid">
                  </NuxtLink>
                </div>
                <div class="category-content">
                  <div class="product-button">
                    <NuxtLink class="btn btn-common text-uppercase" to="/scarves">{{ t('menu.shop.scarves') }}
                    </NuxtLink>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="cat-item image-zoom-effect">
                <div class="image-holder">
                  <NuxtLink to="/accessories">
                    <img src="/images/cat-item3.jpg" alt="categories" class="product-image img-fluid">
                  </NuxtLink>
                </div>
                <div class="category-content">
                  <div class="product-button">
                    <NuxtLink class="btn btn-common text-uppercase" to="/accessories">{{ t('menu.shop.accessories') }}
                    </NuxtLink>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="new-arrival" class="new-arrival product-carousel py-5 position-relative overflow-hidden">
      <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
          <h4 class="text-uppercase">{{ t('home.our_new_arrivals') }}</h4>
          <a href="shop-sidebar.html" class="btn-link">{{ t('home.all_products') }}</a>
        </div>
        <div v-if="bestsellers.length" class="swiper product-swiper open-up" data-aos="zoom-out">
          <div class="swiper-wrapper d-flex">
            <div class="swiper-slide" v-for="item in expensive" :key="item.link">
              <div class="product-item image-zoom-effect link-effect">
                <div class="image-holder position-relative">
                  <a :href="item.link">
                    <img :src="item.url" alt="categories" class="product-image img-fluid" />
                  </a>
                  <div class="product-content">
                    <h5 class="element-title text-uppercase fs-5 mt-3">
                      <a :href="item.link">{{ item.name }}</a>
                    </h5>
                    <a href="cart.html" class="text-decoration-none" data-after="Add to cart">
                      <span>{{ item.price }} сум</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
        <div class="icon-arrow icon-arrow-left"><svg width="50" height="50" viewBox="0 0 24 24">
            <use xlink:href="#angle-left"></use>
          </svg></div>
        <div class="icon-arrow icon-arrow-right"><svg width="50" height="50" viewBox="0 0 24 24">
            <use xlink:href="#angle-right"></use>
          </svg></div>
      </div>
    </section>

    <section class="collection bg-light position-relative py-5">
      <div class="container">
        <div class="row">
          <div class="title-xlarge text-uppercase txt-fx domino">Collection</div>
          <div class="collection-item d-flex flex-wrap my-5">
            <div class="col-md-6 column-container">
              <div class="image-holder">
                <img src="/images/single-image-2.jpg" alt="collection" class="product-image img-fluid">
              </div>
            </div>
            <div class="col-md-6 column-container bg-white">
              <div class="collection-content p-5 m-0 m-md-5">
                <h3 class="element-title text-uppercase">{{ t('home.season_collection') }}</h3>
                <p>{{ t('home.season_collection_desc') }}</p>
                <a href="#" class="btn btn-dark text-uppercase mt-3">{{ t('home.shop_collection') }}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="best-sellers" class="best-sellers product-carousel py-5 position-relative overflow-hidden">
      <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
          <h4 class="text-uppercase">{{ t('home.best_selling_items') }}</h4>
          <a href="shop-sidebar.html" class="btn-link">{{ t('home.all_products') }}</a>
        </div>
        <div v-if="bestsellers.length" class="swiper product-swiper open-up" data-aos="zoom-out">
          <div class="swiper-wrapper d-flex">
            <div class="swiper-slide" v-for="item in bestsellers" :key="item.link">
              <div class="product-item image-zoom-effect link-effect">
                <div class="image-holder">
                  <a :href="item.link">
                    <img :src="item.url" :alt="item.name" class="product-image img-fluid" />
                  </a>
                  <div class="product-content">
                    <h5 class="text-uppercase fs-5 mt-3">
                      <a :href="item.link">{{ item.name }}</a>
                    </h5>
                    <a href="cart.html" class="text-decoration-none" data-after="Add to cart">
                      <span>{{ item.price }} сум</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
        <div class="icon-arrow icon-arrow-left"><svg width="50" height="50" viewBox="0 0 24 24">
            <use xlink:href="#angle-left"></use>
          </svg></div>
        <div class="icon-arrow icon-arrow-right"><svg width="50" height="50" viewBox="0 0 24 24">
            <use xlink:href="#angle-right"></use>
          </svg></div>
      </div>
    </section>
    <section id="related-products" class="related-products product-carousel py-5 position-relative overflow-hidden">
      <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
          <h4 class="text-uppercase">{{ t('home.you_may_also_like') }}</h4>
          <a href="shop-sidebar.html" class="btn-link">{{ t('home.all_products') }}</a>
        </div>
        <div v-if="bestsellers.length" class="swiper product-swiper open-up" data-aos="zoom-out">
          <div class="swiper-wrapper d-flex">
            <div class="swiper-slide" v-for="item in recommended" :key="item.link">
              <div class="product-item image-zoom-effect link-effect">
                <div class="image-holder">
                  <a :href="item.link">
                    <img :src="item.url" :alt="item.name" class="product-image img-fluid" />
                  </a>
                  <div class="product-content">
                    <h5 class="text-uppercase fs-5 mt-3">
                      <a :href="item.link">{{ item.name }}</a>
                    </h5>
                    <a href="cart.html" class="text-decoration-none" data-after="Add to cart">
                      <span>{{ item.price }} сум</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
        <div class="icon-arrow icon-arrow-left"><svg width="50" height="50" viewBox="0 0 24 24">
            <use xlink:href="#angle-left"></use>
          </svg></div>
        <div class="icon-arrow icon-arrow-right"><svg width="50" height="50" viewBox="0 0 24 24">
            <use xlink:href="#angle-right"></use>
          </svg></div>
      </div>
    </section>
    <section class="logo-bar py-5 my-5">
      <div class="container">
        <div class="row">
          <div class="logo-content d-flex flex-wrap justify-content-between">
            <img src="/images/logo1.png" alt="logo" class="logo-image img-fluid">
            <img src="/images/logo2.png" alt="logo" class="logo-image img-fluid">
            <img src="/images/logo3.png" alt="logo" class="logo-image img-fluid">
            <img src="/images/logo4.png" alt="logo" class="logo-image img-fluid">
            <img src="/images/logo5.png" alt="logo" class="logo-image img-fluid">
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script setup>
import { ref, nextTick } from 'vue'
const { t, locale } = useI18n()
const bestsellers = ref([])
const recommended = ref([])
const newded = ref([])
const expensive = ref([])
const loadProducts = async () => {
  const res = await $fetch(`/api/products?lang=${locale.value}`)
  bestsellers.value = res.bestsellers || []
  recommended.value = res.recommended || []
  newded.value = res.newded || []
  expensive.value = res.expensive || []
  // ждем, пока DOM обновится
  await nextTick()

  // перезапуск инициализации слайдера через сторонний JS
  if (window.initSwiper) {  // если в твоем проекте есть функция инициализации
    window.initSwiper('.product-swiper')
  }
}

onMounted(() => {
  loadProducts()
})

</script>