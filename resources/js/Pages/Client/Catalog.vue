<template>
    <ClientLayout title="Catelog">
        <Section>
            <div class="flex md:grid grid-cols-4 gap-4 mycontainer">
                <!-- Sidebar -->
                <div class="hidden flex-col md:flex gap-4 overflow-y-auto" id="sidebar">
                    <input type="text" class="w-full p-2 border border-gray-300 rounded-md outline-none" placeholder="Search">
                    <hr>
                    <ul>
                        <h2 class="font-semibold capitalize">Brand</h2>
                        <div class="flex flex-col gap-2 p-2 text-sm">
                            <!-- @vue-ignore -->
                            <li @click="router.get(route('shop.catalog'))" class="cursor-pointer capitalize">All</li>
                            <!-- @vue-ignore -->
                            <li v-for="(category, index) in categories" :key="index" @click="router.get(route('shop.catalog', {category: category.slug}))" class="cursor-pointer capitalize">{{ category.name }}</li>
                        </div>
                    </ul>
                    <hr>
                    <ul>
                        <h2 class="font-semibold capitalize">Price</h2>
                        <div class="flex flex-col gap-2 p-2 text-sm">
                            <input type="number" name="" id="" placeholder="0">
                            <input type="number" name="" id="" placeholder="99999999">
                        </div>
                    </ul>
                </div>

                <!-- Main Content -->
                <div id="main" >
                    <header class="flex flex-row justify-between items-center sticky top-0 bg-white">
                        <h1 class="capitalize text-2xl font-bold">{{ category }}</h1>
                        <div>
                            <label for="sort">Sort by:
                                <select name="sort" id="sort" class="border-none outline-none">
                                    <option value="price">Price</option>
                                    <option value="name">Name</option>
                                    <option value="rating">Ratings</option>
                                </select>
                            </label>
                        </div>
                    </header>
                    <div class="" >
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-6 " >
                            <ProductCard v-for="(product, index) in products.data" :key="index" :product="product" />
                        </div>
                        <div ref="last" class="-translate-y-28"></div>
                        <div v-if="loading" class="text-center py-4">Loading...</div>
                        <div v-if="!products.next_page_url" class="text-center py-4">No more products</div>
                    </div>
                </div>
            </div>

        </Section>
    </ClientLayout>

</template>

<script setup lang="ts">
import { ref, watch } from "vue";
// @ts-ignore
import { useIntersectionObserver } from '@vueuse/core';
import ProductCard from "@/Components/Client/ProductCard.vue";
import Section from "@/Components/Client/Section.vue";
import ClientLayout from "@/Layouts/ClientLayout.vue";
import { router } from "@inertiajs/vue3";
import axios from 'axios';
const props = defineProps({
    categories: Array,
    products: Object,
    category: String
})

const loading = ref(false);
const last = ref(null);
useIntersectionObserver(
    last,
    ([{ isIntersecting }]) => {
        if (isIntersecting && !loading.value && props.products.next_cursor) {
            loadMore();
        }
    },
    { rootMargin: '100px' }
);
const loadMore = async () => {
    loading.value = true;
    axios.get(`${props.products.path}?cursor=${props.products.next_cursor}`).then((response) => {
        props.products.data = [...props.products.data, ...response.data.products.data];
        props.products.next_cursor = response.data.products.next_cursor;
        loading.value = false;
    });
};
</script>

<style scoped>
#main{

    grid-column: span 3 / span 3;
}
</style>
