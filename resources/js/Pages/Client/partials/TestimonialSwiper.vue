<template>
    <div>
       <!-- @vue-ignore -->
       <swiper v-bind="swiperOptions">
           <swiper-slide v-for="(item, index) in testimonials" :key="index">
            <div class="grid grid-row-2 gap-8">
                <div class="m-b-4 flex flex-col gap-2">
                    <h3 class="text-xl font-semibold">{{ item.caption }}</h3>
                    <p>{{ item.content }}</p>
                </div>
                <div class="flex flex-col gap-2 items-center">
                    <img :src="item.image" alt="" width="100" height="100" class="rounded-full size-20 object-cover">
                    <h3 class="text-xl font-semibold">{{ item.name }}</h3>
                    <p>{{ item.occupation }}</p>
                </div>
            </div>
           </swiper-slide>

       </swiper>
       <div class="my-pagination"></div>

    </div>

</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/pagination';
import { Pagination } from 'swiper/modules';

// Register modules
const modules = [Pagination];

const props = defineProps<{
 testimonials: {
   name: string;
   content: string;
   image: string;
   occupation: string;
   caption: string;
 }[];
}>();

onMounted(()=>{
    console.log(props.testimonials)
})
// Swiper options
const swiperOptions = ref({
 modules,
 spaceBetween: 10,
 slidesPerView: 1,
 pagination: {
   el: '.my-pagination', // Attach pagination element
   clickable: true,
   renderBullet: function (index: number, className: string) {
     return '<span class="' + className + '"></span>';
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
