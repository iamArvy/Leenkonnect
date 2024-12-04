<template>
  <span class="stars" >
    <!-- Assuming bxs-star represents a filled star -->
    <box-icon name='star' type="solid" color="#ffd900" size="16px" v-for="n in rating" :key="n"></box-icon>
  </span>
  <div class="rating-fill"></div>
</template>

<script setup lang="ts">
// Props definition
const props = defineProps<{
  rating: number // Rating out of 5
}>()
</script>
