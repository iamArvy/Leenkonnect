<template>
    <AdminLayout>
        <template #actions>
            <form @submit.prevent="applyFilters()" class="flex flex-row justify-between gap-3">
                <input type="text" v-model="filters.search" placeholder="Search" class="border border-black rounded-md p-2">
                <!-- <input type="text" v-model="filters.sku" placeholder="SKU" class="border border-black rounded-md p-2"> -->
                <select name="" id="" v-model="filters.category" class="capitalize" placeholder="Categories">
                    <option value="" class="capitalize">All</option>
                    <!-- @vue-ignore -->
                    <option :value="item.id" v-for="(item, index) in categories" :key="index" >
                        <!-- @vue-ignore -->
                        {{ item.name }}
                    </option>
                </select>
                <PrimaryButton>Apply filters</PrimaryButton>
            </form>
            <CreateProduct :categories="categories" :brands="brands" />
        </template>
        <div class="overflow-scroll shadow-xl sm:rounded-lg grid grid-cols-3 gap-2">
            <ProductItem v-for="(item, index) in products.data" :key="index" :item="item" :categories="categories" :brands="brands" />
        </div >
        <Pagination :prev="products.prev_page_url" :next="products.next_page_url" @paginate="paginate" />
    </AdminLayout>
</template>

<script setup lang="ts">
import Pagination from '@/Components/Pagination.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { router } from '@inertiajs/vue3';
import { onMounted, reactive, ref, watch } from 'vue';
import CreateProduct from './Partials/CreateProduct.vue';
import ProductItem from './Partials/ProductItem.vue';
import PrimaryButton from '@/Components/Admin/PrimaryButton.vue';
const props = defineProps({products: Object, categories: Array, filters: Object, brands: Array, })
const filters = reactive({ ...props.filters });
const applyFilters = () => {
    // @ts-ignore
  router.get(route('admin.products.index'), filters, { preserveState: true });
};
const paginate = (url) => {
  router.get(url, filters, { preserveState: true });
};
</script>

<style scoped>
</style>
