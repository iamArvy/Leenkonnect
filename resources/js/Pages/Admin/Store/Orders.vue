<template>
    <AdminLayout>
        <template #actions>
                <input @keydown.enter.prevent="applyFilters()" type="text" v-model="filters.orn" placeholder="Search" class="border border-black rounded-md p-2">
                <select name="" id="" v-model="filters.sts" class="capitalize">
                    <option @click.prevent="applyFilters()" :value="null" class="capitalize">All Orders</option>
                    <!-- @vue-ignore -->
                    <option @click.prevent="applyFilters()" :value="item" v-for="(item, index) in statusList" :key="index" >
                        <!-- @vue-ignore -->
                        {{ item }}
                    </option>
                </select>
                <select name="" id="" v-model="filters.sts" class="capitalize">
                    <option :value="null" class="capitalize" disabled>Change Status</option>
                    <!-- @vue-ignore -->
                    <option @click="performActionOnSelectedOrders" :value="item" v-for="(item, index) in statusList" :key="index" >
                        <!-- @vue-ignore -->
                        {{ item }}
                    </option>
                </select>
            <!-- <PrimaryButton>Create Order</PrimaryButton> -->
            <!-- <CreateProduct :categories="categories" :brands="brands" /> -->
        </template>
        <ul class="p-2 bg-white rounded-lg">
            <li class="grid grid-cols-7">
                <input
                type="checkbox"
                name=""
                id=""
                :checked="isAllSelected"
                @change="toggleSelectAll
                ">
                <p class="col-span-2 z-3">Order Number</p>
                <p class="col-span-2 z-3">User</p>
                <p>Total Price</p>
                <p>Status</p>
            </li>
            <li v-for="order in orders.data" :key="order.id" class="grid grid-cols-7">
                <input type="checkbox" name="" id=""
                :checked="isSelected(order.id)"
                @change="toggleOrderSelection(order.id)"
                >
                <p class="col-span-2 z-3 hover:underline cursor-pointer" @click="console.log('hi')">{{ order.order_number }}</p>
                <p class="col-span-2 z-3 hover:underline cursor-pointer" @click="console.log('hi')">{{ order.user ? order.user.name : 'Guest User' }} </p>
                <p>{{ order.total }}</p>
                <p>{{ order.status }}</p>
            </li>
        </ul>
    </AdminLayout>

</template>

<script setup lang="ts">
import Pagination from '@/Components/Pagination.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { router } from '@inertiajs/vue3';
import { computed, onMounted, reactive, ref, watch } from 'vue';
// import CreateProduct from './Partials.vue/CreateProduct.vue';
// import ProductItem from './Partials.vue/ProductItem.vue';
// import PrimaryButton from '@/Components/Admin/PrimaryButton.vue';
const props = defineProps({orders: Object, statusList: Array, filters: Object })
const filters = reactive({ ...props.filters });
const applyFilters = () => {
    // @ts-ignore
  router.get(route('admin.orders.index'), filters, { preserveState: true });
};
const paginate = (url) => {
  router.get(url, filters, { preserveState: true });
};

const selectedOrders = ref([]);

// Check if all orders are selected
const isAllSelected = computed(() => {
    return props.orders.data.length > 0 && selectedOrders.value.length === props.orders.data.length;
});

// Toggle "Select All" functionality
const toggleSelectAll = (event) => {
    if (event.target.checked) {
        selectedOrders.value = props.orders.data.map((order) => order.id); // Select all
    } else {
        selectedOrders.value = []; // Deselect all
    }
};

// Check if a specific order is selected
const isSelected = (orderId) => {
    return selectedOrders.value.includes(orderId);
};

// Toggle selection for a specific order
const toggleOrderSelection = (orderId) => {
    if (isSelected(orderId)) {
        selectedOrders.value = selectedOrders.value.filter((id) => id !== orderId);
    } else {
        selectedOrders.value.push(orderId);
    }
};

const performActionOnSelectedOrders = () => {
    console.log("Selected Orders:", selectedOrders.value);
    // Add your action logic here
};
</script>

<style scoped>

</style>
