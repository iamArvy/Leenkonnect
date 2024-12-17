<template>
    <AdminLayout>
        <template #actions>
                <input @keydown.enter.prevent="applyFilters()" type="text" v-model="filters.q" placeholder="Search" class="border border-black rounded-md p-2">
                <select name="" id="" v-model="filters.c" class="capitalize" placeholder="Categories">
                    <option :value="null" class="capitalize">All</option>
                    <!-- @vue-ignore -->
                    <option @click="applyFilters()" :value="item.id" v-for="(item, index) in services" :key="index" >
                        <!-- @vue-ignore -->
                        {{ item.name }}
                    </option>
                </select>
            <ConsultantForm :specialisations="specialisations" />
        </template>
        <ul class="flex flex-col gap-2 bg-white rounded-2xl overflow-hidden py-2 text-center">
            <li class="p-3 bg-primary text-white font-bold">
                <ul class="grid grid-cols-4 gap-2 ">
                    <li>Title</li>
                    <li>Date</li>
                    <li>Update</li>
                    <li>Delete</li>
                </ul>
            </li>
            <li v-for="(item, index) in consultants.data" :key="index">
                <ul class="grid grid-cols-4 gap-2 h-[50px]">
                    <li>{{ item.name }}</li>
                    <li>{{ item.email }}</li>
                    <li>
                        <ConsultantForm update :consultant="item" :specialisations="specialisations" />
                    </li>
                    <li>
                        <!-- @vue-ignore -->
                        <DangerButton @click="router.delete(route('admin.consultation.consultants.destroy', item.id))">Delete</DangerButton>
                    </li>
                </ul>
            </li>
        </ul>
        <Pagination v-if="consultants.links.length <= 0" :prev="consultants.prev_page_url" :next="consultants.next_page_url" @paginate="paginate" />
    </AdminLayout>
</template>

<script setup lang="ts">
import Pagination from '@/Components/Pagination.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { router } from '@inertiajs/vue3';
import { reactive} from 'vue';
import CreateBlog from './Partials/ConsultantForm.vue';
// import UpdateBlog from './Partials/UpdateBlog.vue';
import DangerButton from '@/Components/Admin/DangerButton.vue';
import ConsultantForm from './Partials/ConsultantForm.vue';
const props = defineProps<{consultants: any, specialisations: any, filters: any}>()
const filters = reactive({ ...props.filters });
const applyFilters = () => {
    // @ts-ignore
  router.get(route('admin.consultation.consultants.index'), filters, { preserveState: true });
};
const paginate = (url) => {
  router.get(url, filters, { preserveState: true });
};
</script>

<style scoped>
</style>
