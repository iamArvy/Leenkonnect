<template>
    <Cart v-if="isCartOpen" :items="$page.props.cart" :closeCart="closeCart"/>
    <Navbar v-if="showingNavigationDropdown" :closeNav="closeNav" :navs=[] />
    <header class="bg-white text-black p-4 sticky w-full top-0 z-10">
            <section class="max-w-screen-xl mx-auto flex justify-between lg:justify-normal items-center">
                <div class="flex flex-row items-center  gap-2">
                   <box-icon name="menu" @click="openNav()" class="lg:hidden cursor-pointer"></box-icon>
                    <Link :href="route('home')" class="text-xl text-uppercase cursor-pointer">Leenkonnect</Link>
                </div>
                <nav class="hidden lg:flex gap-10 text-lg items-center justify-center flex-grow">
                    <Link :href="route('shop.index')">Shop</Link>
                    <Link :href="route('services')">Services</Link>
                    <Link :href="route('about')">About</Link>
                    <Link :href="route('contact.index')">Contact</Link>
                    <Link :href="route('blog.index')">Blog</Link>
                </nav>
                <SearchBar />
                <div class="user-options flex flex-row gap-3" >
                    <button @click="openCart()">
                        <box-icon name='cart'></box-icon>
                    </button>
                    <Link :href="route('home')"><i class="bx bx-user-circle "></i></Link>
                </div>

                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('admin.dashboard')" :active="route().current('admin.dashboard')">
                            Dashboard
                        </ResponsiveNavLink>
                    </div>


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
</script>

<style scoped>

</style>
