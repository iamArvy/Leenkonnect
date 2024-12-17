<template>
    <ClientLayout title="Blogs">
        <!-- <div class="bg-primary bg-[url('/images/servicesbg.png')] text-white">
            <Section>
                <div class="text-white min-h-[50svh] flex flex-col justify-center items-center">
                    <h1 class="text-2xl text-center font-bold">Blog Catalog</h1>
                </div>
            </Section>
        </div> -->
        <Section class="my-0 py-0">
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
                </div>

            </header>
            <main>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 " v-if="posts.data.length > 0" >
                    <BlogCard v-for="(post, index) in posts.data" :key="index" :blog="post" />
                </div>
                <div v-else class="py-14 text-center">
                    <p>There are no blogs available for this query, Adjust Query and try again</p>
                </div>
            </main>
            <Pagination :next="posts.next_page_url" :prev="posts.prev_page_url" @paginate="paginate" />
        </Section>
    </ClientLayout>
</template>

<script setup lang="ts">
import { reactive, ref } from "vue";
// @ts-ignore
import BlogCard from "@/Components/Client/BlogCard.vue";
import Section from "@/Components/Client/Section.vue";
import ClientLayout from "@/Layouts/ClientLayout.vue";
import { router } from "@inertiajs/vue3";
import Pagination from "@/Components/Pagination.vue";
// import axios from 'axios';
const props = defineProps({
    categories: Array,
    posts: Object,
    filters: Object
})
const filters = reactive({ ...props.filters });
const applyFilters = () => {
    // @ts-ignore
  router.get(route('blog.index'), filters, { preserveState: true });
};
const paginate = (url) => {
  router.get(url, filters, { preserveState: true });
};

</script>

<style scoped>

</style>
