<template>
    <AdminLayout>
        <template #actions>
                <!-- <input @keydown.enter.prevent="applyFilters()" type="text" v-model="filters.orn" placeholder="Search" class="border border-black rounded-md p-2"> -->
            <!-- <PrimaryButton class="self-end place-self-end">Create Role</PrimaryButton> -->
            <CreateRoleForm :permissions="permissions" />
        </template>
        <div class="mx-auto">
            <h1 class="text-2xl font-bold mb-4">Roles</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div v-for="role in roles" :key="role.id" class="bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-lg font-bold mb-2">{{ role.name }}</h2>
                    <div class="grid grid-cols-2 gap-2">
                        <ManagePermissions :permissions="permissions" :rolepermissions="role.permissions" />
                        <!-- @vue-ignore -->
                        <DangerButton @click="router.delete(route('admin.access.roles.destroy', role.id))" >Delete Role</DangerButton>
                    </div>

                    <!-- <p class="text-gray-600 mb-2">{{ role.description }}</p> -->
                    <!-- <div class="flex flex-wrap gap-2">
                        <span v-for="permission in role.permissions" :key="permission.id" class="bg-gray-200 text-gray-700 rounded-full px-3 py-1 text-sm">{{ permission.name }}</span>
                    </div> -->
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup lang="ts">
import PrimaryButton from '@/Components/Admin/PrimaryButton.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import CreateRoleForm from './Partials/CreateRoleForm.vue';
import DangerButton from '@/Components/Admin/DangerButton.vue';
import { router } from '@inertiajs/vue3';
import ManagePermissions from './Partials/ManagePermissions.vue';
defineProps<{
    roles: any,
    permissions: any
}>()
</script>

<style scoped>
</style>
