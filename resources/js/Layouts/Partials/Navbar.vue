<template>
    <div class="relative">
        <div class="fixed top-0 left-0 w-full h-full bg-white z-20 flex flex-col gap-2">
            <header class="flex justify-between bg-primary text-white p-4 ">
                <button @click="closeNav()" class="md:hidden">Close</button>
                <h1 class="text-2xl font-bold">Leenkonnect</h1>
            </header>
            <nav class="gap-2 text-lg flex flex-col p-4 text-center">
                <Link v-for="(nav, index) in navs" :key="index" :href="nav.href" class=" border border-primary px-3" :class="nav.active ? 'text-primary border-2 font-bold' : null">{{ nav.name }}</Link>
            </nav>
        </div>
    </div>
</template>

<script setup lang="ts">
  import { Head, Link, router } from '@inertiajs/vue3';

defineProps<{
    navs: any,
    closeNav: Function
}>()

document.body.style.overflow = 'hidden';

</script>

<style scoped>
</style>
