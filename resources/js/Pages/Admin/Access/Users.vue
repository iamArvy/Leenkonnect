<template>
    <AdminLayout>
        <template #actions>
                <input @keydown.enter.prevent="applyFilters()" type="text" v-model="filters.u" placeholder="Search" class="border border-black rounded-md p-2">
                <select name="" id="" v-model="filters.r" class="capitalize">
                    <option @click.prevent="applyFilters()" :value="null" class="capitalize">All Roles</option>
                    <!-- @vue-ignore -->
                    <option @click.prevent="applyFilters()" :value="item.name" v-for="(item, index) in roles" :key="index" >
                        {{ item.name }}
                    </option>
                </select>
                <select name="" id="" class="capitalize" :disabled="selectedItems == null">
                    <option :value="null" class="capitalize" disabled selected>Change Role</option>
                    <!-- @vue-ignore -->
                    <option :disabled="!selectedItems || selectedItems.length === 0" @click="router.post(route('admin.access.users.roles.add'), { ids: selectedItems, role: item.name})" :value="item" v-for="(item, index) in roles" :key="index" >
                        {{ item.name }}
                    </option>
                </select>
            <CreateUserForm :roles="roles" />
            <!-- <DangerButton :disabled="!selectedItems || selectedItems.length === 0" @click="router.delete(route('admin.access.users.destroy'), {data: { ids: selectedItems}})"> Delete Users </DangerButton> -->
        </template>
        <ul class="p-2 bg-white rounded-lg gap-2 flex flex-col">
            <li class="grid grid-cols-7">
                <input
                type="checkbox"
                name=""
                id=""
                :checked="isAllSelected"
                @change="toggleSelectAll
                ">
                <p class="col-span-2 z-3">Name</p>
                <p class="col-span-2 z-3">Email</p>
                <p>Role</p>
                <p>Delete</p>
            </li>
            <li v-for="item in users.data" :key="item.id" class="grid grid-cols-7">
                <input type="checkbox" name="" id=""
                :checked="isSelected(item.id)"
                @change="toggleItemSelection(item.id)"
                >
                <p class="col-span-2 z-3 hover:underline cursor-pointer" @click="console.log('hi')">{{ item.name }}</p>
                <p class="col-span-2 z-3 hover:underline cursor-pointer" @click="console.log('hi')">{{ item.email }} </p>
                <p>{{ item.roles[0].name }}</p>
                <!-- @vue-ignore -->
                <DangerButton @click="router.delete(route('admin.access.users.destroy', item.id))"> Delete </DangerButton>
            </li>
        </ul>
        <Pagination v-if="users.next_page_url" />
    </AdminLayout>

</template>

<script setup lang="ts">
import Pagination from '@/Components/Pagination.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { router } from '@inertiajs/vue3';
import { computed, onMounted, reactive, ref, watch } from 'vue';
// import CreateProduct from './Partials.vue/CreateProduct.vue';
// import ProductItem from './Partials.vue/ProductItem.vue';
import PrimaryButton from '@/Components/Admin/PrimaryButton.vue';
import CreateUserForm from './Partials/CreateUserForm.vue';
import DangerButton from '@/Components/Admin/DangerButton.vue';
const props = defineProps<{users: any, roles: {name:string}[], filters: any }>()
const filters = reactive({ ...props.filters });
const applyFilters = () => {
    // @ts-ignore
  router.get(route('admin.access.users.index'), filters, { preserveState: true });
};
const paginate = (url) => {
  router.get(url, filters, { preserveState: true });
};

const selectedItems = ref([]);

const isAllSelected = computed(() => {
    return props.users.data.length > 0 && selectedItems.value.length === props.users.data.length;
});

const toggleSelectAll = (event) => {
    if (event.target.checked) {
        selectedItems.value = props.users.data.map((item) => item.id); // Select all
    } else {
        selectedItems.value = [];
    }
};

// Check if a specific order is selected
const isSelected = (itemId) => {
    return selectedItems.value.includes(itemId);
};

// Toggle selection for a specific order
const toggleItemSelection = (itemId) => {
    if (isSelected(itemId)) {
        selectedItems.value = selectedItems.value.filter((id) => id !== itemId);
    } else {
        selectedItems.value.push(itemId);
    }
};

</script>

<style scoped>

</style>
