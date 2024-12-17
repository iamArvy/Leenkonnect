<template>
     <footer class="bg-[#2d2d2d] text-white font-satoshi w-full">
        <!-- <section class="grid grid-cols-2 max-w-screen-xl mx-auto bg-black px-8 rounded-xl absolute top-[-80px] h-[190px] items-center">
                <h1 class="text-4xl text-white self-center">Stay up to date about our latest offers</h1>
            <div class="grid grid-rows-2 gap-2">
                <div class="rounded-3xl bg-white flex flex-row align-center p-4"><i class="bx bx-user-circle "></i><input class="flex-grow outline-none border-none" placeholder="Enter Email Address" type="text"></div>
                <Button secondary class="w-full">Subscribe to Newsletter</Button>
            </div>
        </section> -->
        <section class="max-w-screen-xl px-4 my-[80px] flex flex-col lg:grid grid-cols-5 gap-4 mx-auto">
            <div class="col-span-2">
                <h1 class="text-2xl h-10 text-white font-semibold">Leenkonnect</h1>
                <div>
                    <p class="text-sm font-satoshi">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, accusantium.</p>
                    <div></div>
                </div>
            </div>
            <!-- <nav class="" v-for="(item, index) in navs" :key="index">
                <h3 class="text-base font-satoshi font-medium h-10 text-white" >{{ item.title }}</h3>
                <ul class="flex flex-col gap-3">
                    <li v-for="(link, index) in item.links" :key="index" class="text-sm font-satoshi font-light" >
                        <Link :href="link.href">{{ link.title }}</Link>
                    </li>
                </ul>
            </nav> -->
            <div class="col-span-3 flex flex-col md:grid grid-cols-2 gap-4 text-base">
                <nav class="">
                    <h3 class="text-lg font-satoshi font-medium h-10 text-white" >Contacts</h3>
                    <ul class="flex flex-col gap-3">
                        <li class="text-base font-satoshi font-light" v-for="(item, index) in contactnavs" :key="index">
                            <p><strong class="font-bold">{{item.name}}: </strong> {{item.value}}</p>
                        </li>
                    </ul>
                </nav>
                <nav class="">
                    <h3 class="text-lg font-satoshi font-medium h-10 text-white" >Services</h3>
                    <ul class="flex flex-col gap-3">
                        <li v-for="(link, index) in services" :key="index" class="font-satoshi font-light" >
                            <Link :href="link.href">{{ link.title }}</Link>
                        </li>
                    </ul>
                </nav>
            </div>

        </section>
    <div class="w-full mx-auto text-center bg-black p-4">
        <p class="text-gray-500 text-sm">Copyright &copy; 2024 Leenkonnect. All rights reserved.</p>
    </div>
    </footer>
</template>

<script setup lang="ts">
import { route } from '../../../../vendor/tightenco/ziggy/src/js';
import { Link } from '@inertiajs/vue3';
const navs = [
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

const services = [
    {title: 'About Us', href: route('home')},
    {title: 'Contact Us', href: route('home')},
    {title: 'FAQ', href: route('home')},
    {title: 'FAQ', href: route('home')}
]
const contactnavs = [

    {
        name: 'Address',
        value: '1 awe street ogba ifako ijaye, Lagos, Nigeria'
    },
    {
        name: 'Email',
        value: "info@leenkonnect.com"
    },
    {
        name: 'Phone',
        value: '+2347069973395'
    },
    {
        name: 'Phone',
        value: '+2348073467445'
    },
]
</script>

<style scoped>

</style>
