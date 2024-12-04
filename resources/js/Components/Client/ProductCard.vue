<template>
    <figure class="rounded-lg overflow-hidden">
        <div @click="router.get(route('shop.product', { slug: props.product.slug }))" class="cursor-pointer">
            <img :src="product.image" alt="">
            <figcaption class="p-2 flex flex-col gap-2">
                <h4 class="font-bold capitalize text-sm">{{ product.name }}</h4>
                <Price :price="product.price" />
                <Ratings :rating="3" />
            </figcaption>
        </div>

        <button @click="router.post(route('cart.add'), { id: props.product.id, quantity: 1 }, { preserveScroll: true })" class="text-primary bg-primary bg-opacity-10 px-4 py-2 rounded-lg w-full hover:bg-opacity-25" > Add to cart </button>
    </figure>
</template>

<script setup lang="ts">
import { Link, router, useForm } from '@inertiajs/vue3'
import Ratings from './Ratings.vue';
import Price from './Price.vue';
const props = defineProps<{
    product: {
        id: number,
        name: string,
        price: number,
        image: string,
        slug: string,
        rating: number
    },
    // addtocart: Function
}>()
</script>

<style scoped>

</style>
