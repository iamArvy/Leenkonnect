<template>
     <div>
        <!-- @vue-ignore -->
        <swiper v-bind="swiperOptions">
            <swiper-slide v-for="(service, index) in services" :key="index">
                <div class="flex flex-col gap-4 border p-8 rounded-md min-h-[300px]">
                    <div></div>
                    <h3 class="text-xl font-bold">{{ service.name }}</h3>
                    <p>{{ service.description }}</p>
                </div>
            </swiper-slide>

        </swiper>
        <div class="my-pagination"></div>

     </div>

</template>

<script setup lang="ts">
import { ref } from 'vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/pagination';
import { Pagination } from 'swiper/modules';

// Register modules
const modules = [Pagination];

const props = defineProps<{
  services: {
    name: string;
    description: string;
    image: string;
  }[];
}>();

// Swiper options
const swiperOptions = ref({
  modules,
  spaceBetween: 10,
  slidesPerView: 3,
  pagination: {
    el: '.my-pagination', // Attach pagination element
    clickable: true,
    renderBullet: function (index: number, className: string) {
      return '<span class="' + className + '"></span>';
    },
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    640: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  }
//   on: {
//     init: function () {
//       console.log('swiper initialized');
//     },
//   }
});
</script>

<style scoped>
:deep(.swiper-pagination-bullet) {
  width: 30px;
  height: 1px;
  background: white;
  border-radius: unset;
}

:deep(.swiper-pagination-bullet-active) {
  color: #fff;
  height: 3px
}
</style>
