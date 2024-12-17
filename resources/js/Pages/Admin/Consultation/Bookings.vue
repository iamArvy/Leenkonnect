<template>
    <AdminLayout>
        <template #actions>
                <input @keydown.enter.prevent="applyFilters()" type="text" v-model="filters.bkn" placeholder="Search" class="border border-black rounded-md p-2">
                <select name="" id="" v-model="filters.s" class="capitalize" placeholder="Categories">
                    <option :value="null" class="capitalize">All</option>
                    <!-- @vue-ignore -->
                    <option @click="applyFilters()" :value="item.id" v-for="(item, index) in specialisations" :key="index" >
                        <!-- @vue-ignore -->
                        {{ item.name }}
                    </option>
                </select>
                <input @change="applyFilters" type="date" v-model="filters.d" placeholder="Search" class="border border-black rounded-md p-2">
            <BookingsForm :specialisations="specialisations" :booked_datetimes="booked_datetime" />
        </template>
        <ul class="flex flex-col gap-2 bg-white rounded-2xl overflow-hidden py-2 text-center">
            <li class="p-3 bg-primary text-white font-bold">
                <ul class="grid grid-cols-5 gap-2 ">
                    <li>Booking Number</li>
                    <li>Date</li>
                    <li>Time</li>
                    <li>Status</li>
                    <li>Delete</li>
                </ul>
            </li>
            <li v-for="(item, index) in bookings.data" :key="index">
                <ul class="grid grid-cols-5 gap-2 h-[50px]">
                    <li>{{ item.booking_number }}</li>
                    <li>
                        {{ item.date }}
                        <!-- <BookingsForm update :booking="item" :specialisations="specialisations" /> -->
                    </li>
                    <li>
                        {{ item.time }}
                    </li>
                    <li>
                        {{ item.status }}
                    </li>
                    <li>
                        <!-- @vue-ignore -->
                        <DangerButton @click="router.delete(route('admin.consultation.bookings.destroy', item.id))">Delete</DangerButton>
                    </li>
                </ul>
            </li>
        </ul>
        <Pagination v-if="bookings.links.length <= 0" :prev="bookings.prev_page_url" :next="bookings.next_page_url" @paginate="paginate" />
    </AdminLayout>
</template>

<script setup lang="ts">
import Pagination from '@/Components/Pagination.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { router } from '@inertiajs/vue3';
import { reactive} from 'vue';
import DangerButton from '@/Components/Admin/DangerButton.vue';
import BookingsForm from './Partials/BookingsForm.vue';
const props = defineProps<{bookings: any, specialisations: any, filters: any, booked_datetime: any}>()
const filters = reactive({ ...props.filters });
const applyFilters = () => {
    // @ts-ignore
  router.get(route('admin.consultation.bookings.index'), filters, { preserveState: true });
};
const paginate = (url) => {
  router.get(url, filters, { preserveState: true });
};
</script>

<style scoped>
</style>
