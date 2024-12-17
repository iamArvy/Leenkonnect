<template>
    <ClientLayout title="Services">
        <div class="w-full bg-[#1b2c61] bg-[url('/images/servicesbg.png')]">
            <Section>
                <div class="text-white min-h-[50svh] flex flex-col justify-center items-center">
                    <h1 class="text-2xl text-center font-bold">Our Services</h1>
                    <p class="text-xl text-center">Explore our services</p>
                </div>
            </Section>
        </div>
        <Section>
            <div class="flex flex-col gap-3">
                <details v-for="(item, index) in data" :key="index" class="px-12 py-6 bg-gray-300 grid grid-cols-3 items-center">
                    <summary class="text-primary text-2xl font-bold ">{{ item.title }}</summary>
                    <ul class="col-span-2 flex flex-col gap-2">
                        <li v-for="(service, index) in item.services" :key="index" class="list-disc">
                            <p>{{ service }}</p>
                        </li>
                    </ul>
                </details>
            </div>
        </Section>
    </ClientLayout>
</template>

<script setup lang="ts">
import Section from '@/Components/Client/Section.vue';
import ClientLayout from '@/Layouts/ClientLayout.vue';


const data = [
    {
        title: 'IT Consulting',
        services: [
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos excepturi, sequi quaerat eveniet reiciendis non inventore laudantium eligendi aspernatur praesentium.",
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos excepturi, sequi quaerat eveniet reiciendis non inventore laudantium eligendi aspernatur praesentium.",
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos excepturi, sequi quaerat eveniet reiciendis non inventore laudantium eligendi aspernatur praesentium.",
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos excepturi, sequi quaerat eveniet reiciendis non inventore laudantium eligendi aspernatur praesentium.",
        ]
    },
    {
        title: 'Network Setup',
        services: [
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos excepturi, sequi quaerat eveniet reiciendis non inventore laudantium eligendi aspernatur praesentium.",
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos excepturi, sequi quaerat eveniet reiciendis non inventore laudantium eligendi aspernatur praesentium.",
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos excepturi, sequi quaerat eveniet reiciendis non inventore laudantium eligendi aspernatur praesentium.",
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos excepturi, sequi quaerat eveniet reiciendis non inventore laudantium eligendi aspernatur praesentium.",
        ]
    },
    {
        title: 'Cybersecurity',
        services: [
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos excepturi, sequi quaerat eveniet reiciendis non inventore laudantium eligendi aspernatur praesentium.",
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos excepturi, sequi quaerat eveniet reiciendis non inventore laudantium eligendi aspernatur praesentium.",
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos excepturi, sequi quaerat eveniet reiciendis non inventore laudantium eligendi aspernatur praesentium.",
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos excepturi, sequi quaerat eveniet reiciendis non inventore laudantium eligendi aspernatur praesentium.",
        ]
    }
];
</script>

<style scoped>

</style>
