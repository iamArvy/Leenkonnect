<template>
    <ClientLayout title="About Us">
    <div class="w-full bg-[#1b2c61] bg-[url('/images/servicesbg.png')]">
        <Section>
            <div class="text-white min-h-[50svh] flex flex-col justify-center items-center">
                <h1 class="text-2xl text-center font-bold">About Us</h1>
                <p class="text-xl text-center">Explore our services</p>
            </div>
        </Section>
    </div>
    <Section>
        <article class="px-12 py-6 flex flex-col gap-3  items-center">
            <h1 class="text-primary text-3xl font-bold text-center">Our Mission</h1>
            <p class="col-span-2 text-lg text-center">To provide innovative and high-quality software solutions that meet the needs of our clients and help them achieve their business objectives.</p>
        </article>
    </Section>
    <Section>
        <article class="px-12 py-6 flex flex-col gap-3 items-center">
            <h1 class="text-primary text-2xl font-bold text-center">Our Vision</h1>
            <p class="col-span-2 text-center">To be the leading software development company in the industry, known for our commitment to excellence, innovation, and customer satisfaction.</p>
        </article>
    </Section>
    <Section>
        <div class="flex flex-col gap-3">
            <article class="px-12 py-6 bg-gray-300 grid grid-cols-3 items-center">
                <h1 class="text-primary text-2xl font-bold text-center">Our History</h1>
                <p class="col-span-2">Founded in 2010, our company has been at the forefront of software development since then. Over the years, we have grown into a trusted name in the industry, serving clients across various industries.</p>
            </article>
        </div>
    </Section>
    <Section>
        <div class="flex flex-col gap-3">
            <article class="px-12 py-6 bg-gray-300 grid grid-cols-3 items-center">
                <h1 class="text-primary text-2xl font-bold text-center">Our Team</h1>
                <p class="col-span-2">Our team consists of highly skilled and experienced professionals who are passionate about software development. We are dedicated to delivering high-quality solutions that exceed our clients' expectations.</p>
            </article>
        </div>
    </Section>
    <Section>
        <div class="flex flex-col gap-3">
            <article class="px-12 py-6 bg-gray-300 grid grid-cols-3 items-center">
                <h1 class="text-primary text-2xl font-bold text-center">Our Partners</h1>
                <p class="col-span-2">We have strong partnerships with industry leaders, enabling us to offer our clients the latest and most innovative solutions.</p>
            </article>
        </div>
    </Section>
    <Section>
        <div class="flex flex-col gap-3">
            <article class="px-12 py-6 bg-gray-300 grid grid-cols-3 items-center">
                <h1 class="text-primary text-2xl font-bold text-center">Our Values</h1>
                <ul class="col-span-2 flex flex-col gap-2">
                    <li class="list-disc">
                        <p>Excellence</p>
                    </li>
                    <li class="list-disc">
                        <p>Innovation</p>
                    </li>
                    <li class="list-disc">
                        <p>Customer Satisfaction</p>
                    </li>
                    <li class="list-disc">
                        <p>Integrity</p>
                    </li>
                    <li class="list-disc">
                        <p>Teamwork</p>
                    </li>
                </ul>
            </article>
        </div>
    </Section>
    <Section>
        <div class="flex flex-col gap-3">
            <article class="px-12 py-6 bg-gray-300 grid grid-cols-3 items-center">
                <h1 class="text-primary text-2xl font-bold text-center">Our Services</h1>
                <ul class="col-span-2 flex flex-col gap-2">
                    <li class="list-disc">
                        <p>Web Development</p>
                    </li>
                    <li class="list-disc">
                        <p>Mobile Development</p>
                    </li>
                    <li class="list-disc">
                        <p>Desktop Development</p>
                    </li>
                    <li class="list-disc">
                        <p>Software Development</p>
                    </li>
                    <li class="list-disc">
                        <p>Software Maintenance</p>
                    </li>
                    <li class="list-disc">
                        <p>Software Support</p>
                    </li>
                </ul>
            </article>
        </div>
    </Section>
    <!-- <Section>
        <div class="flex flex-col gap-3">
            <article v-for="(item, index) in data" :key="index" class="px-12 py-6 bg-gray-300 grid grid-cols-3 items-center">
                <h1 class="text-primary text-2xl font-bold text-center">{{ item.title }}</h1>
                <ul class="col-span-2 flex flex-col gap-2">
                    <li v-for="(service, index) in item.services" :key="index" class="list-disc">
                        <p>{{ service }}</p>
                    </li>
                </ul>
            </article>
        </div>
    </Section> -->
</ClientLayout>
</template>

<script setup lang="ts">
import Section from '@/Components/Client/Section.vue';
import ClientLayout from '@/Layouts/ClientLayout.vue';


</script>

<style scoped>

</style>
