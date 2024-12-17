<template>
    <AdminLayout>
        <template #actions>
                <input @keydown.enter.prevent="applyFilters()" type="text" v-model="filters.q" placeholder="Search" class="border border-black rounded-md p-2">
            <SpecialisationForm />
        </template>
        <ul class="flex flex-col gap-2 bg-white rounded-2xl overflow-hidden py-2 text-center">
            <li class="p-3 bg-primary text-white font-bold">
                <ul class="grid grid-cols-4 gap-2 ">
                    <li>Name</li>
                    <li>Description</li>
                    <li>Update</li>
                    <li>Delete</li>
                </ul>
            </li>
            <li v-for="(item, index) in specialisations.data" :key="index">
                <ul class="grid grid-cols-4 gap-2 h-[50px]">
                    <li>{{ item.name }}</li>
                    <li>{{ item.description }}</li>
                    <li>
                        <SpecialisationForm isUpdate :specialisation="item" />
                    </li>
                    <li>
                        <!-- @vue-ignore -->
                        <DangerButton @click="router.delete(route('admin.consultation.specialisations.destroy', item.id))">Delete</DangerButton>
                    </li>
                </ul>
            </li>
        </ul>
        <Pagination v-if="specialisations.links.length <= 0" :prev="specialisations.prev_page_url" :next="specialisations.next_page_url" @paginate="paginate" />
    </AdminLayout>
</template>

<script setup lang="ts">
import Pagination from '@/Components/Pagination.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { router } from '@inertiajs/vue3';
import { reactive} from 'vue';
// import UpdateBlog from './Partials/UpdateBlog.vue';
import DangerButton from '@/Components/Admin/DangerButton.vue';
import SpecialisationForm from './Partials/SpecialisationForm.vue';
const props = defineProps({specialisations: Object, filters: Object})
const filters = reactive({ ...props.filters });
const applyFilters = () => {
    // @ts-ignore
  router.get(route('admin.blog.specialisations.index'), filters, { preserveState: true });
};
const paginate = (url) => {
  router.get(url, filters, { preserveState: true });
};
</script>

<style scoped>
</style>
