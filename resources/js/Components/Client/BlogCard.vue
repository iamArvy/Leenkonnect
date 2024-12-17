<template>
    <div class="rounded-lg overflow-hidden p-2 border-black border shadow-lg">
        <!-- @vue-ignore -->
        <div @click="router.get(route('blog.show', { blog: blog.id }))" class="cursor-pointer p-2 flex flex-col gap-2">
            <h4 class="font-bold capitalize text-sm h-[50px]">{{ blog.title }}</h4>
            <p class="text-xs text-primary capitalize font-bold">{{ blog.category.name }}</p>
            <p class="text-xs text-gray-700" >{{ blog.date }}</p>
        </div>
    </div>
</template>

<script setup lang="ts">
import { router } from '@inertiajs/vue3'
const props = defineProps<{
    blog: {
        id: number,
        title: string,
        image: string,
        slug: string,
        category: {
            id: number,
            name: string,
        },
        date: string
    },
}>()
</script>

<style scoped>

</style>
