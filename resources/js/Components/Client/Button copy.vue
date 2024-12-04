<template>
    <button class="px-16 py-4 rounded-3xl text-base transition-all duration-500 ease-in-out border" :class="classes">
        <slot />
    </button>
</template>

<script setup lang="ts">
import { computed, ref } from 'vue';
const props = defineProps<{ primary?: boolean, secondary?: boolean }>();
const classes = computed(() => {
  return {
    'bg-black text-white hover:bg-transparent hover:text-black hover:border hover:border-black': props.primary,
    'bg-white text-black': props.secondary
  }
})
</script>

<style scoped>

</style>
