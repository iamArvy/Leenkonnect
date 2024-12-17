<template>
    <Head :title="title" />
    <div class="flex flex-col min-h-screen">
        <Header />
        <main class="flex-grow ">
            <slot />
        </main>
        <Footer />
    </div>
  </template>
  <script setup lang="ts">
  import { Head, Link, router } from '@inertiajs/vue3';
// @ts-ignore
import Button from '@/Components/Client/Button.vue';
import Header from '@/Layouts/Partials/Header.vue';
import Footer from '@/Layouts/Partials/Footer.vue';
import { ref } from 'vue';
import Cart from '@/Components/Client/Cart.vue';
defineProps<{
    title: string
}>()


  </script>

<style scoped>
.user-options i {
  font-size: 24px;
}

i{
    font-size: 44px
}
</style>
