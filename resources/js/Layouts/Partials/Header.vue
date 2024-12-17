<template>
    <Cart v-if="isCartOpen" :items="$page.props.cart" :closeCart="closeCart"/>
    <Navbar v-if="showingNavigationDropdown" :closeNav="closeNav" :navs=navs />
    <header class="bg-white text-black p-4 sticky w-full top-0 z-10">
            <section class="max-w-screen-xl mx-auto flex justify-between lg:justify-normal items-center">
                <div class="flex flex-row items-center  gap-2">
                   <box-icon name="menu" @click="openNav()" class="lg:hidden cursor-pointer"></box-icon>
                    <Link :href="route('home')" class="text-xl text-uppercase cursor-pointer"><ApplicationLogo /> </Link>
                </div>
                <nav class="hidden lg:flex gap-10 text-lg items-center justify-center flex-grow">
                    <Link v-for="(nav, index) in navs" :key="index" :href="nav.href" :class="nav.active ? 'text-primary font-bold' : null">{{ nav.name }}</Link>
                </nav>
                <SearchBar />
                <div class="flex gap-3 items-center">
                    <!-- @vue-ignore -->
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
                            <DropdownLink as="button" @click="openCart()">
                                Orders
                            </DropdownLink>
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
                    <Link v-else :href="route('login')" class="text-primary px-3 py-2 border border-primary text-sm leading-4 font-medium rounded-md bg-white hover:text-white hover:bg-primary transition ease-in-out duration-150">
                        Sign in
                    </Link>
                    <button  @click="openCart()">
                        <box-icon name="cart" size="4xl"></box-icon>
                    </button>
                </div>
            </section>

        </header>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';
import { Link, router } from '@inertiajs/vue3';
import Cart from '@/Components/Client/Cart.vue';
import Navbar from './Navbar.vue';
import Dropdown from '@/Components/Admin/Dropdown.vue';
import DropdownLink from '@/Components/Admin/DropdownLink.vue';
import ApplicationLogo from '@/Components/Admin/ApplicationLogo.vue';
const showingNavigationDropdown = ref(false);
const isCartOpen = ref(false);
const openCart = () => {
    isCartOpen.value = true;
}
const openNav = () => {
    showingNavigationDropdown.value = true;
}
const closeCart = () => {
    isCartOpen.value = false;
    document.body.style.overflow = null;
}
const closeNav = () => {
    showingNavigationDropdown.value = false;
    document.body.style.overflow = null;
}

const logout = () => {
    router.post(route('logout'));
};

const navs = [
    {name: 'Home', href: route('home'), active: route().current('home')},
    { name: 'Shop', href: route('shop.index'), active: route().current('shop.index') },
    { name: 'Services', href: route('services'), active: route().current('services') },
    { name: 'About', href: route('about'), active: route().current('about') },
    { name: 'Contact', href: route('contact.index'), active: route().current('contact.index') },
    { name: 'Blog', href: route('blog.index'), active: route().current('blog.index') },
];
</script>

<style scoped>

</style>
