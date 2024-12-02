<template>
    <!-- <Link href="/"> -->
        <figure class="rounded-lg overflow-hidden">
            <img :src="product.image" alt="">
            <figcaption class="p-2 flex flex-col gap-2">
                <h4 class="font-bold capitalize text-sm">{{ product.name }}</h4>
                <p class="text-xl">&#8358;{{ product.price }}</p>
                <Ratings />
                <div class="flex justify-between mt-2 gap-2" >
                    <button @click="addtocart(product.id)" class="text-primary bg-primary bg-opacity-10 px-4 py-2 rounded-lg w-full hover:bg-opacity-25" > Add to cart </button>
                    <button class="text-primary bg-primary bg-opacity-10 px-4 py-2 rounded-lg w-full hover:bg-opacity-25" @click="logout()" > View </button>
                </div>
            </figcaption>
        </figure>
    <!-- </Link> -->
</template>

<script setup lang="ts">
import { Link, router, useForm } from '@inertiajs/vue3'
// import { route } from 'vendor/tightenco/ziggy/src/js';
const props = defineProps<{
    product: {
        id: number,
        name: string,
        price: number,
        image: string
    },
    // addtocart: Function
}>()

const form = useForm({
    id: props.product.id,
    quantity: 1
})
const addtocart = (id: number) => {
    // @ts-ignore
    // form.post(route('home'));
    router.post(route('cart.add'), {id:id, quantity:1})
}

</script>

<style scoped>

</style>
