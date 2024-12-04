<template>
    <div class="my-5">
        <h2 class="font-bold text-lg capitalize text-center mb-4">{{ title }}</h2>
        <!-- <header class="flex flex-row justify-between items-center mb-4">
            <Link :href="route(href)">See More</Link>
        </header> -->
        <div>
            <slot />
        </div>
        <div class="flex justify-center items-center mt-3">
            <button class="border-2 rounded-2xl px-4 py-2" @click="router.get(route('shop.catalog', {category: href}))">See More</button>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3';
import { route } from '../../../../../vendor/tightenco/ziggy/src/js';

defineProps({
    title: String,
    href: String
})
</script>

<style scoped>

</style>
