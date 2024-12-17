<template>
    <AdminLayout>
        <template #actions>
            <form @submit.prevent="create()" class="flex flex-row justify-between gap-3">
                <TextInput v-model="form.name" placeholder="Category Name" />
                <PrimaryButton>Create Category</PrimaryButton>
            </form>
        </template>
        <div v-if="!categories.data.length" class="h-full text-center sm:rounded-lg">
            <p>No Categories currently, Kindly create some</p>
        </div>

        <div class="overflow-scroll shadow-xl sm:rounded-lg grid grid-cols-3 gap-2" v-else>
            <span v-for="item in categories.data">{{ item.name }}</span>
            <ProductItem v-for="(item, index) in categories.data" :key="index" :item="item"/>
        </div >

        <Pagination v-if="categories.next_page_url" :prev="categories.prev_page_url" :next="categories.next_page_url" @paginate="paginate" />
    </AdminLayout>
</template>

<script setup lang="ts">
import PrimaryButton from '@/Components/Admin/PrimaryButton.vue';
import TextInput from '@/Components/Admin/TextInput.vue';
import Pagination from '@/Components/Pagination.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { router, useForm } from '@inertiajs/vue3';

const props = defineProps<{
    categories: any,
}>();

const form = useForm({
    name: '',
});

const create = () => {
    // @ts-ignore
    form.post(route('admin.categories.store'),{
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        }
    });
}

const paginate = (url) => {
  router.get(url, { preserveState: true });
};
</script>

<style scoped>
</style>
