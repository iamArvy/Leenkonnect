<template>
    <ClientLayout title="About Us">
    <div class="w-full bg-[#1b2c61] bg-[url('/images/servicesbg.png')]">
        <Section>
            <div class="text-white min-h-[50svh] flex flex-col justify-center items-center">
                <h1 class="text-2xl text-center font-bold">About Us</h1>
                <p class="text-xl text-center">Know more about us</p>
            </div>
        </Section>
    </div>
    <AboutArticle>
        <template #title>
            Our Vision
        </template>
        <template #sub>
            We run all kinds of IT services that helps businesses succeed
        </template>
        <p>
            We are your full-service business technology solutions provider, we specialize in a wide array of IT services including business automation solution, modern managed cloud infrastructure, software intelligence, security – providing a one stop IT solution source for our clients across the world.
            Leenkonnect was established in 2023 and has been providing true end-to-end cutting-edge solutions to organizations in various sectors of the economy from small and medium-sized enterprises to large-scale corporations leveraging our partnership with technological leaders.
        </p>
    </AboutArticle>
    <AboutArticle>
        <template #title>
            Our Vision
        </template>
        <template #sub>
            We run all kinds of IT services that helps businesses succeed
        </template>
        <p>
            We are your full-service business technology solutions provider, we specialize in a wide array of IT services including business automation solution, modern managed cloud infrastructure, software intelligence, security – providing a one stop IT solution source for our clients across the world.
            Leenkonnect was established in 2023 and has been providing true end-to-end cutting-edge solutions to organizations in various sectors of the economy from small and medium-sized enterprises to large-scale corporations leveraging our partnership with technological leaders.
        </p>
    </AboutArticle>
    <AboutArticle>
        <template #title>
            Our Vision
        </template>
        <template #sub>
            We run all kinds of IT services that helps businesses succeed
        </template>
        <p>
            We are your full-service business technology solutions provider, we specialize in a wide array of IT services including business automation solution, modern managed cloud infrastructure, software intelligence, security – providing a one stop IT solution source for our clients across the world.
            Leenkonnect was established in 2023 and has been providing true end-to-end cutting-edge solutions to organizations in various sectors of the economy from small and medium-sized enterprises to large-scale corporations leveraging our partnership with technological leaders.
        </p>
    </AboutArticle>
</ClientLayout>
</template>

<script setup lang="ts">
import Section from '@/Components/Client/Section.vue';
import ClientLayout from '@/Layouts/ClientLayout.vue';
import AboutArticle from './partials/AboutArticle.vue';


</script>

<style scoped>

</style>
