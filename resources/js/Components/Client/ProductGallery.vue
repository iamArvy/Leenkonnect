<template>
    <swiper v-bind="swiperOptions">
        <swiper-slide v-for="(image, index) in images" :key="index">
    <a
      :href="image"
      :data-fancybox="'gallery'"
    >
    <figure class="px-4">
        <img :src="image" :alt="image" width=100% class="rounded-xl" />
    </figure>
    </a>
    <!-- <h1>Hi</h1> -->
        </swiper-slide>
    </swiper>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';
// import { Fancybox } from '@fancyapps/ui';
import '@fancyapps/ui/dist/fancybox/fancybox.css';
import { Swiper, SwiperSlide } from 'swiper/vue'
import 'swiper/css'
import 'swiper/css/pagination';
import { Pagination } from 'swiper/modules';

const modules = [Pagination]
const props = defineProps<{
images: string[]
}>()
const swiperOptions = ref({
// spaceBetween: 50,
slidesPerView: 1,
// pagination: true,
modules: modules,
})
  // Set up Fancybox when the component is mounted
//   onMounted(() => {
//     console.log(props.images)
//     Fancybox.bind('[data-fancybox="gallery"]', {
//       // Optional: Customize Fancybox options here
//       // Example:
//     //   loop: true,
//     //   infinite: true,
//     });
//   });
</script>

<style scoped>
</style>
