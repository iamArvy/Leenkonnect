<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/Admin/ApplicationMark.vue';
import Banner from '@/Components/Admin/Banner.vue';
import Dropdown from '@/Components/Admin/Dropdown.vue';
import DropdownLink from '@/Components/Admin/DropdownLink.vue';
import NavLink from '@/Components/Admin/NavLink.vue';
import ResponsiveNavLink from '@/Components/Admin/ResponsiveNavLink.vue';
import NavDropdown from '@/Components/Admin/NavDropdown.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);


const logout = () => {
    router.post(route('logout'));
};

const navs = [
    {
        name: 'Dashboard',
        href: route('admin.dashboard'),
        active: route().current('admin.dashboard'),
    },
    {
        name: 'Store',
        children: [
            {
                name: 'Categories',
                href: route('admin.categories.index'),
                active: route().current('admin.categories.index'),
            },
            {
                name: 'Products',
                href: route('admin.products.index'),
                active: route().current('admin.products.index'),
            }
        ],
        get active() {
            return this.children.some(child => child.active);
        }
    },
    {
        name: 'Consultation',
        children: [
            {
                name: 'Bookings',
                href: route('admin.bookings.index'),
                active: route().current('admin.bookings.index'),
            },
            {
                name: 'Consultants',
                href: route('admin.consultants.index'),
                active: route().current('admin.consultants.index'),
            },
            {
                name: 'Services',
                href: route('admin.services.index'),
                active: route().current('admin.services.index'),
            }
        ],
        get active() {
            return this.children.some(child => child.active);
        }
    },
    {
        name: 'Customers',
        href: route('admin.customers.index'),
        active: route().current('admin.customers.index'),
    },
    {
        name: 'Access Management',
        children: [
            {
                name: 'Roles',
                href: route('admin.roles.index'),
                active: route().current('admin.roles.index'),
            },
            {
                name: 'Permissions',
                href: route('admin.permissions.index'),
                active: route().current('admin.permissions.index'),
            },
            {
                name: 'Users',
                href: route('admin.users.index'),
                active: route().current('admin.users.index'),
            }
        ],
        get active() {
            return this.children.some(child => child.active);
        }
    }
]
</script>

<template>
    <div>
        <Head :title="$page.props.title" />

        <Banner />

        <div class="min-h-screen bg-gray-100 flex flex-row gap-2">
            <nav class="w-60 p-2 min-h-screen max-h-screen overflow-y-auto bg-white flex flex-col gap-2">
                <header>
                    <h1>Emporium</h1>
                </header>
                <ul class="flex-grow">
                    <li v-for="link in navs" :key="link.name">
                        <ResponsiveNavLink :href="link.route" :active="$page.url === link.route"><i :class="link.icon"></i>{{ link.name }}</ResponsiveNavLink>
                    </li>
                </ul>
                <footer>
                    <ResponsiveNavLink as="button" @click="opensettings"><i class='bx bx-cog'></i> Settings</ResponsiveNavLink>
                    <ResponsiveNavLink as="button" @click="logout"><i class='bx bx-log-out-circle'></i>Logout</ResponsiveNavLink>
                </footer>
            </nav>

            <!-- Page Heading -->


            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto max-h-screen">
                <header class="bg-white shadow sticky top-0">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ $page.props.title }}
                        </h2>
                        <nav>
                            <NavLink :href="route('admin.dashboard')" v-for="">Dashboard</NavLink>
                            <NavLink :href="route('admin.dashboard')">Users</NavLink>
                        </nav>
                    </div>
                </header>
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 ">
                    <div class="flex flex-row justify-between gap-3">
                        <slot name="actions" />
                    </div>
                </div>
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 overflow-y-auto">
                    <slot />
                </div>
            </main>
        </div>
    </div>
</template>

