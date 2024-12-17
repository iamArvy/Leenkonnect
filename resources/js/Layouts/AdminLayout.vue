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
        href: 'admin.dashboard',
    },
    {
        name: 'Store',
        children: [
            {
                name: 'Products',
                href: 'admin.store.products.index',
            },
            {
                name: 'Orders',
                href: 'admin.store.orders.index',
            }
        ],
        active: () => {
            return this.children.some((child) => child.active);
        }
    },
    {
        name: 'Blog',
        children: [
            {
                name: 'Posts',
                href: 'admin.blog.posts.index',
            },
            // {
            //     name: 'Categories',
            //     href: 'admin.blog.categories.index',
            // }
        ],
        active: () => {
            return this.children.some((child) => child.active);
        }
    },
    {
        name: 'Consultation',
        children: [
            {
                name: 'Bookings',
                href: 'admin.consultation.bookings.index',
            },
            {
                name: 'Consultants',
                href: 'admin.consultation.consultants.index',
            },
            {
                name: 'Specialisations',
                href: 'admin.consultation.specialisations.index',
            }
        ],
        active: () => {
            return this.children.some((child) => child.active);
        }
    },
    {
        name: 'Customers',
        href: 'admin.customers.index',
    },
    {
        name: 'Access Management',
        active: function () {
            return this.children.some((child) => child.active);
        },
        children: [
            {
                name: 'Users',
                href: 'admin.access.users.index',
            },
            {
                name: 'Roles',
                href: 'admin.access.roles.index',
            }
        ]
    }
]
</script>

<template>
    <div>
        <Head :title="$page.props.title" />

        <Banner />

        <div class="min-h-screen bg-gray-100 flex flex-row gap-2">
            <nav class="w-60 p-2 min-h-screen max-h-screen overflow-y-auto bg-white flex flex-col gap-4">
                <header>
                    <h1 class="text-center p-1 font-bold">Leenkonnect</h1>
                </header>
                <ul class="flex-grow overflow-y-auto">
                    <li v-for="link in navs" :key="link.name">
                        <ResponsiveNavLink :href="route(link.href)" :active="route().current(link.href)" v-if="!link.children" ><i :class="link.icon"></i>{{ link.name }}</ResponsiveNavLink>
                        <NavDropdown :name="link.name" v-if="link.children">
                            <ResponsiveNavLink :href="route(child.href)" :active="route().current(child.href)" v-for="child in link.children" :key="child.name"><i :class="child.icon"></i>{{ child.name }}</ResponsiveNavLink>
                        </NavDropdown>
                    </li>
                </ul>
            </nav>

            <!-- Page Heading -->


            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto max-h-screen">
                <header class="bg-white shadow sticky top-0 flex justify-between items-center px-4">
                    <div class="max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ $page.props.title }}
                        </h2>
                    </div>
                    <Dropdown width="48" v-if="$page.props.auth.user">
                        <template #trigger>
                            <span class="inline-flex rounded-md">
                                <button type="button" class="text-primary inline-flex items-center px-3 py-2 border border-primary text-sm leading-4 font-medium rounded-md bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                    <!-- @vue-ignore -->
                                    {{ $page.props.auth.user ? $page.props.auth?.user.name : 'Account' }}

                                    <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </span>
                        </template>

                        <template #content>
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                Manage Account
                            </div>
                            <DropdownLink :href="route('profile.show')">
                                Profile
                            </DropdownLink>
                            <DropdownLink :href="route('admin.dashboard')">
                                Dashboard
                            </DropdownLink>

                            <div class="border-t border-gray-200" />

                            <!-- Authentication -->
                            <form @submit.prevent="logout">
                                <DropdownLink as="button">
                                    Log Out
                                </DropdownLink>
                            </form>
                        </template>
                    </Dropdown>
                </header>
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 ">
                    <div class="flex flex-row gap-3">
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

