<template>
    <Link href="/">
        <figure class="rounded-lg overflow-hidden">
            <img :src="product.image" alt="">
            <figcaption class="p-2 flex flex-col gap-2">
                <h4 class="font-bold capitalize text-sm">{{ product.name }}</h4>
                <p class="text-xl">&#8358;{{ product.price }}</p>
                <Ratings />
                <div class="flex justify-between mt-2 gap-2" >
                    <button class="text-primary bg-primary bg-opacity-10 px-4 py-2 rounded-lg w-full hover:bg-opacity-25" > Add to cart </button>
                    <button class="text-primary bg-primary bg-opacity-10 px-4 py-2 rounded-lg w-full hover:bg-opacity-25" > View </button>
                </div>
            </figcaption>
        </figure>
    </Link>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
defineProps<{
    product: {
        id: number,
        name: string,
        price: number,
        image: string
    }
}>()
</script>

<style scoped>

</style>
