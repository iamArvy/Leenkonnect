<template>
    <ClientLayout title="Shop">
        <!-- <Section> -->
            <CategorySwiper :title="item.name" :href="item.slug" class="max-w-screen-lg mx-auto p-4" v-for="(item, index) in promotions" :key="index">
                <swiper v-bind="swiperOptions">
                    <swiper-slide v-for="product in item.products" :key="product.id">
                        <ProductCard :product="product" />
                    </swiper-slide>
                </swiper>
            </CategorySwiper>
            <CategorySwiper :title="item.name" :href="item.slug" class="max-w-screen-lg mx-auto p-4" v-for="(item, index) in categories" :key="index">
                <swiper v-bind="swiperOptions">
                    <swiper-slide v-for="product in item.products" :key="product.id">
                        <ProductCard :product="product" />
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
    promotions: any,
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
