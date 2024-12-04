<template>
    <AdminLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div v-for="product in products.data" :key="product.id">
      <h3>{{ product.name }}</h3>
    </div>

    <div class="pagination">
      <button :disabled="!products.prev_page_url" @click="router.get(products.prev_page_url)">
        Previous
      </button>
      <button :disabled="!products.next_page_url" @click="router.get(products.next_page_url)">
        Next
      </button>
    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup lang="ts">
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { router } from '@inertiajs/vue3';
defineProps({products: Object})
</script>

<style scoped>
</style>
