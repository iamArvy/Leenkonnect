<template>
     <Section>
        <article class="sm:px-12 py-6 items-center flex flex-col text-center">
            <div class="sm:max-w-[80%] flex flex-col gap-3 ">
                <h1 class="text-primary text-base font-bold text-center"><slot name="title" /></h1>
                <h2 class="text-2xl md:text-4xl font-bold"><slot name="sub" /></h2>
                <slot />
            </div>
        </article>
    </Section>
</template>

<script setup lang="ts">
import Section from '@/Components/Client/Section.vue';


</script>

<style scoped>

</style>
