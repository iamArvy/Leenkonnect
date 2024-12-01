<template>
    <Head :title="title" />
    <div class="flex flex-col min-h-screen">
        <header class="bg-white text-black p-4 sticky w-full top-0 z-50">
            <section class="max-w-screen-xl mx-auto flex justify-between items-center">
                <h1 class="text-xl text-uppercase">Leenkonnect</h1>
                <nav class="flex gap-5 text-lg items-center">
                    <div id="shop-list" class="group relative cursor-pointer">
                        <div class="flex items-center"><span>Shop</span><i class="bx bx-chevron-down"></i></div>
                    <ul class="hidden group-hover:block absolute w-auto p-2 bg-blue-500">
                        <li>Men</li>
                        <li>Women</li>
                        <li>Shoes</li>
                        <li>Clothes</li>
                        <li>Bags</li>
                        <li>Testing</li>
                        <li>Testing</li>
                    </ul>
                    </div>
                    <Link :href="route('home')" >On Sale</Link>
                    <Link :href="route('home')">New Arrivals</Link>
                    <Link :href="route('home')">Brand</Link>
                </nav>
                <SearchBar />
                <div class="user-options flex flex-row gap-3" >
                    <Link :href="route('cart.index')"><i class="bx bx-cart-alt"></i></Link>
                    <Link :href="route('home')"><i class="bx bx-user-circle "></i></Link>
                </div>
            </section>
        </header>
        <main class="flex-grow mb-[110px]">
            <slot />
        </main>

        <footer class="bg-primary text-gray-500 font-satoshi p-4 w-full relative">
            <section class="grid grid-cols-2 max-w-screen-xl mx-auto bg-black px-8 rounded-xl absolute top-[-80px] h-[190px] items-center">
                 <h1 class="text-4xl text-white self-center">Stay up to date about our latest offers</h1>
                <div class="grid grid-rows-2 gap-2">
                    <div class="rounded-3xl bg-white flex flex-row align-center p-4"><i class="bx bx-user-circle "></i><input class="flex-grow outline-none border-none" placeholder="Enter Email Address" type="text"></div>
                    <Button secondary class="w-full">Subscribe to Newsletter</Button>
                </div>
            </section>
            <section class="max-w-screen-xl mt-[120px] grid grid-cols-6">
                <div class="col-span-2">
                    <h1 class="text-2xl h-10 text-black">Emporium</h1>
                    <div>
                        <p class="text-sm font-satoshi">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, accusantium.</p>
                        <div></div>
                    </div>
                </div>
                <nav class="" v-for="(item, index) in footerNavs" :key="index">
                    <h3 class="text-base font-satoshi font-medium h-10 text-black" >{{ item.title }}</h3>
                    <ul class="flex flex-col gap-3">
                        <li v-for="(link, index) in item.links" :key="index" class="text-sm font-satoshi font-light" >
                            <Link :href="link.href">{{ link.title }}</Link>
                        </li>
                    </ul>
                </nav>
            </section>
            <br>
            <hr>
            <br>
        <div class="max-w-screen-xl mx-auto text-center">
            <p class="text-gray-500">&copy; 2024 My Website. All rights reserved.</p>
        </div>
        </footer>
    </div>
  </template>
  <script setup lang="ts">
  import { Head, Link, router } from '@inertiajs/vue3';
import { route } from '../../../vendor/tightenco/ziggy/src/js';
// @ts-ignore
import Button from '@/Components/Client/Button.vue';
// import Button from '@/Components/Client/Button.vue';

// import { title } from 'process';
defineProps<{
    title: string
}>()

const footerNavs = [
    {
        title: 'About',
        links: [
            {title: 'About Us', href: route('home')},
            {title: 'Contact Us', href: route('home')},
            {title: 'FAQ', href: route('home')},
            {title: 'FAQ', href: route('home')}
        ]
    },
    {
        title: 'About',
        links: [
            {title: 'About Us', href: route('home')},
            {title: 'Contact Us', href: route('home')},
            {title: 'FAQ', href: route('home')},
            {title: 'FAQ', href: route('home')}
        ]
    },
    {
        title: 'About',
        links: [
            {title: 'About Us', href: route('home')},
            {title: 'Contact Us', href: route('home')},
            {title: 'FAQ', href: route('home')},
            {title: 'FAQ', href: route('home')}
        ]
    },
    {
        title: 'About',
        links: [
            {title: 'About Us', href: route('home')},
            {title: 'Contact Us', href: route('home')},
            {title: 'FAQ', href: route('home')},
            {title: 'FAQ', href: route('home')}
        ]
    }
]
  </script>

<style scoped>
.user-options i {
  font-size: 24px;
}

i{
    font-size: 44px
}
</style>
