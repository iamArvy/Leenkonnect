<template>
    <ClientLayout title="Shop">
        <!-- <Section> -->
            <CategorySwiper :title="item.name" :href="item.slug" class="max-w-screen-lg mx-auto p-4" v-for="(item, index) in categories" :key="index">
                <swiper v-bind="swiperOptions">
                    <swiper-slide v-for="product in item.products" :key="product.id">
                        <!-- <div> -->
                            <ProductCard :product="product" />
                        <!-- </div> -->
                        <!-- <div class="swiper-zoom-container">
                            <img :src="product.image" :alt="product.name" class="w-full h-full object-cover">
                        </div> -->
                    </swiper-slide>
                </swiper>
            </CategorySwiper>
        <!-- </Section> -->
    </ClientLayout>
</template>

<script setup lang="ts">
import ClientLayout from '@/Layouts/ClientLayout.vue';
import Section from '@/Components/Client/Section.vue';
import CategorySwiper from './partials/CategorySwiper.vue';
import ProductCard from '@/Components/Client/ProductCard.vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import { onMounted, ref } from 'vue';
const props = defineProps<{
    featuredProducts: any,
    categories: any
}>()
onMounted(()=>{
    console.log(props.categories)
})
const swiperOptions = ref({
//   modules,
  spaceBetween: 10,
  slidesPerView: 5,
  breakpoints: {
    0: {
      slidesPerView: 2,
    },
    600: {
      slidesPerView: 3,
    },
    800:{
        slidesPerView: 4,
    },
    1024: {
      slidesPerView: 5,
    },
  }
//   pagination: {
//     el: '.my-pagination', // Attach pagination element
//     clickable: true,
//     renderBullet: function (index: number, className: string) {
//       return '<span class="' + className + '"></span>';
//     },
//   },
});
</script>

<style scoped>

</style>
