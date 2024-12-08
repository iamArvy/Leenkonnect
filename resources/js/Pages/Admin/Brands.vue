<template>
    <AdminLayout>
        <template #actions>
            <form @submit.prevent="create()" class="flex flex-row justify-between gap-3">
                <TextInput v-model="form.name" placeholder="Category Name" />
                <PrimaryButton>Create Brand</PrimaryButton>
            </form>
        </template>
        <div class="overflow-scroll shadow-xl sm:rounded-lg grid grid-cols-3 gap-2" v-if="brands.data">
            <span v-for="item in brands.data">{{ item.name }}</span>
            <ProductItem v-for="(item, index) in brands.data" :key="index" :item="item"/>
        </div >
        <div v-else class="h-full text-center sm:rounded-lg">
            <p>No Categories currently, Kindly create some</p>
        </div>
        <Pagination v-if="brands.last_page > 1" :prev="brands.prev_page_url" :next="brands.next_page_url" @paginate="paginate" />
    </AdminLayout>
</template>

<script setup lang="ts">
import PrimaryButton from '@/Components/Admin/PrimaryButton.vue';
import TextInput from '@/Components/Admin/TextInput.vue';
import Pagination from '@/Components/Pagination.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { router, useForm } from '@inertiajs/vue3';
import { onMounted } from 'vue';

const props = defineProps<{
    brands: any,
}>();

const form = useForm({
    name: '',
});

const create = () => {
    // @ts-ignore
    form.post(route('admin.brands.store'),{
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        }
    });
}

const paginate = (url) => {
  router.get(url, { preserveState: true });
};

onMounted(()=>{
    console.log(props.brands)
})
</script>

<style scoped>
</style>
