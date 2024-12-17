<template>
    <ClientLayout title="Catelog">
        <Section>
            <header class="py-3 flex flex-col sm:flex-row gap-3">
                <input type="text" v-model="filters.search" @keydown.enter="applyFilters" placeholder="Search" class="flex-grow border-0 border-b-2 outline-0 focus:outline-0 focus:border-0 ">
                <div class="flex justify-between sm:gap-3">
                    <select name="" id="" class="w-full py-2 pr-7 pl-4 text-base border focus:border-[#80bdff] transition-all ease-in-ou" v-model="filters.category">
                        <option :value="null" @click="applyFilters" class="capitalize">All Categories</option>
                        <!-- @vue-ignore -->
                        <option @click="applyFilters" v-for="(item, index) in categories" :key="index" :value="item.id" class="capitalize">
                            <!-- @vue-ignore -->
                            {{ item.name }}
                        </option>
                    </select>
                    <select name="" id="" class="py-2 pr-7 pl-4 text-base border focus:border-[#80bdff] transition-all ease-in-ou" v-model="filters.price_range">
                        <option :value="null" @click="applyFilters" class="capitalize">All Prices</option>
                        <option @click="applyFilters" v-for="(item, index) in priceRange" :key="index" :value="item" class="capitalize">{{ item }}</option>
                    </select>
                </div>

            </header>
            <main>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 " v-if="products.data.length > 0" >
                    <ProductCard v-for="(product, index) in products.data" :key="index" :product="product" />
                </div>
                <div v-else class="py-14 text-center">
                    <p>There are no products available for this query, Adjust Query and try again</p>
                </div>
            </main>
            <Pagination :next="products.next_page_url" :prev="products.prev_page_url" @paginate="paginate" />
        </Section>
    </ClientLayout>

</template>

<script setup lang="ts">
import { reactive, ref } from "vue";
// @ts-ignore
import ProductCard from "@/Components/Client/ProductCard.vue";
import Section from "@/Components/Client/Section.vue";
import ClientLayout from "@/Layouts/ClientLayout.vue";
import { router } from "@inertiajs/vue3";
import Pagination from "@/Components/Pagination.vue";
// import axios from 'axios';
const props = defineProps({
    categories: Array,
    products: Object,
    category: String,
    filters: Object
})
const priceRange = [
    "1-50000",
    "50000-100000"
]
const filters = reactive({ ...props.filters });
const applyFilters = () => {
    // @ts-ignore
  router.get(route('shop.catalog'), filters, { preserveState: true });
};
const paginate = (url) => {
  router.get(url, filters, { preserveState: true });
};

</script>

<style scoped>
#main{

    grid-column: span 3 / span 3;
}
</style>
