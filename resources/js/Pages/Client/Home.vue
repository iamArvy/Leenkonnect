<template>
    <ClientLayout title="Home">
        <Section class="w-svw px-0 sm:px-3">
            <div class="flex flex-col-reverse sm:flex-row md:justify-end md:relative">
                <div class="lg:rounded-tr-[50px] lg:self-center lg:h-[70%] bg-white p-3 lg:p-10 lg:absolute sm:w-[50%] lg:z-2 left-0 flex flex-col gap-4">
                    <h1 class="font-bold text-4xl sm:3xl lg:text-5xl text-primary">Lorem ipsum dolor sit amet consectetur.</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto delectus, enim officia minima nam ea omnis quam sunt veniam nostrum.</p>
                    <button class="py-2 px-4 bg-primary text-white rounded-lg w-fit">Get Started</button>
                </div>
                <figure class="w-svw sm:w-[50%] lg:w-[70%] md:max-h-[480px] overflow-hidden rounded-bl-[50px]">
                    <img src="/images/homehero.png" alt="hero">
                </figure>
            </div>
        </Section>
        <div class="my-8 bg-[#1b2c61] bg-[url('/images/servicesbg.png')] text-white w-full">
            <Section >
            <div class="flex flex-col gap-4 py-12 ">
                <div>
                    <h2 class="text-md md:text-lg">Our Services</h2>
                    <p class=" text-2xl md:text-4xl font-bold">What We Offer for You</p>
                </div>
                <ServicesCarousel :services="services" />
            </div>
        </Section>
        </div>
        <Section>
            <div class="flex flex-col gap-4 py-12">
                <div>
                    <h2 class="font-semibold text-center mb-2" >Shop with Us</h2>
                    <p class="text-2xl md:text-4xl font-bold text-center">Featured Products</p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <ProductCard v-for="(item, index) in featuredProducts" :key=index :product="item" />
                </div>
            </div>
        </Section>
        <div class="my-8 bg-[#1b2c61] bg-[url('/images/servicesbg.png')] text-white w-full">
            <Section >
                <h2>Client's Feedback</h2>
                <p>What People Say</p>
                <span></span>
                <div>
                    <!-- <TestimonialSwiper :testimonies="testimonies" /> -->
                </div>
            </Section>
        </div>
        <Section>
            <div class="grid grid-cols-3">
                <div>
                    <img src="" alt="">
                    <div>
                        <h3></h3>
                        <hr>
                    </div>
                </div>
            </div>
        </Section>
    </ClientLayout>
</template>

<script setup lang="ts">
import ClientLayout from '@/Layouts/ClientLayout.vue';
import Section from '@/Components/Client/Section.vue';
import ServicesCarousel from '@/Components/Client/ServicesCarousel.vue';
import ProductCard from '@/Components/Client/ProductCard.vue';
import { router } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import TestimonialSwiper from './partials/TestimonialSwiper.vue';

const props = defineProps <{
    featuredProducts: Array<any>,
    testimonies: Array<any>
}>()

onMounted(() => {
    console.log(props.featuredProducts)
})
const services = [
    {
        name: 'IT Consulting',
        description: 'Transform your business with expert IT consultation services. We analyze your technology needs, provide tailored solutions, and implement strategies to optimize efficiency, enhance security, and drive innovation.',
        image: '/images/service1.png'
    },
    {
        name: 'Network Setup',
        description: 'Protect your business with advanced cybersecurity services. We safeguard your data, prevent breaches, and ensure compliance with robust security measures tailored to your needs.',
        image: '/images/service2.png'
    },
    {
        name: 'Cybersecurity',
        description: 'Streamline your operations with professional network setup services. We design, install, and configure reliable networks to keep your business connected and running efficiently.',
        image: '/images/service3.png'
    }
]
</script>

<style scoped>

</style>
