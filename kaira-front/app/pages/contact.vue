<template>
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="page-title pb-2">{{ t('menu.contact_us') }}</h1>
            </div>
        </div>
    </section>
<section class="contact-us-wrap py-5 bg-light">
  <div class="container">
    <div class="row g-4 align-items-start">
      
      <!-- Контакты -->
      <div class="col-md-6">
        <div class="content-box p-4 bg-white shadow-sm rounded-3 h-100">
          <h2 class="fs-3 fw-bold text-uppercase mb-3">{{ t('menu.head_office') }}</h2>
          <p class="text-muted mb-4">
            {{ t('menu.online_only_store_notice') }}
          </p>

          <h5 class="element-title text-uppercase mb-3">{{ t('menu.contact') }}</h5>
          <p class="mb-2">
            <i class="bi bi-telephone-fill text-primary me-2"></i>
            <a href="tel:+123123654" class="text-decoration-none text-dark">+123 123 654</a>
          </p>
          <p>
            <i class="bi bi-envelope-fill text-primary me-2"></i>
            <a href="mailto:kaira@templatesjungle.com" class="text-decoration-none text-dark">
              kaira.shop@gmail.com
            </a>
          </p>
        </div>
      </div>

      <!-- Соцсети -->
      <div class="col-md-6">
        <div class="content-box p-4 bg-white shadow-sm rounded-3 text-center h-100">
          <h5 class="element-title text-uppercase mb-4">Social Info</h5>
          <div class="social-links">
            <ul class="list-unstyled d-flex justify-content-center flex-wrap gap-3">
              <li>
                <a href="#" class="text-secondary">
                  <svg width="32" height="32" viewBox="0 0 24 24">
                    <use xlink:href="#instagram"></use>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#" class="text-secondary">
                  <svg width="32" height="32" viewBox="0 0 24 24">
                    <use xlink:href="#telegram"></use>
                  </svg>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

</template>
<script setup>
const { t, locale } = useI18n()
</script>