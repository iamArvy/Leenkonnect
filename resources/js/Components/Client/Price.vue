<script setup lang="ts">
    defineProps<{
        price: number
        discount?: number
    }>();
const discountedPrice = (price:number, discount:number) => {
  return price - (price * (discount / 100));
}
</script>
<template>
    <div class="flex flex-row gap-2">
        <h3 class="font-bold text-2xl" >&#8358;{{ discount ? discountedPrice(price, discount) : price }}</h3>
        <div class="inline align-middle" v-if="discount">
          <h3 class="font-bold text-2xl text-gray-500 line-through">${{ price }}</h3>
          <span class="text-red-500 text-xs rounded p-1 bg-red-200">-{{discount}}%</span>
        </div>
      </div>
</template>
