<template>
    <div class="relative">
        <div class="fixed top-0 left-0 w-full h-full bg-black opacity-50 z-20" @click="closeCart()"></div>
        <div class="fixed top-0 right-0 w-full lg:w-[400px] h-full bg-white z-20 flex flex-col gap-2">
            <header class="flex justify-between bg-primary text-white p-4 ">
                <h1 class="text-2xl font-bold">Cart</h1>
                <button @click="closeCart()" class="lg:hidden">Close</button>
            </header>
            <div class="flex-grow flex flex-col items-center justify-center p-4 h-full overflow-y-scroll">
                <div class="flex flex-col gap-4 overflow-y-scroll h-full w-full" v-if="items.length > 0">
                    <div v-for="item in items" :key="item.id" class="" >
                        <div class="grid grid-cols-3 items-center gap-4 cursor-pointer" @click="router.get(route('shop.product'), {'slug':item.slug})">
                            <img :src="item.image" alt="" class="h-full object-cover">
                            <div class="flex flex-col gap-1 col-span-2 text-sm">
                                <h1 class="text-md font-bold capitalize">{{ item.name }}</h1>
                                <p class="text-gray-500">Price: {{ item.price }}</p>
                                <p class="text-gray-500">Quantity: {{ item.quantity }}</p>
                                <p class="text-gray-500">Total: {{ item.total }}</p>
                            </div>
                        </div>
                        <div>
                            <button @click="remove(item.id)">Remove</button>
                        </div>
                    </div>
                </div>
                <div v-else class="text-gray-500">No items in cart</div>
            </div>
            <footer class="p-4">
                <div class="flex justify-between mt-4">
                <h1 class="text-lg font-bold">Cart Total:</h1>
                <h1 class="text-lg font-bold">&#8358;{{ items.reduce((total, item) => total + item.total, 0) }}</h1>
            </div>
            <div class="flex justify-between mt-4">
                <button class="bg-primary text-white px-4 py-2 rounded-lg" @click="router.get(route('checkout.index'))">Checkout</button>
                <button class="bg-primary text-white px-4 py-2 rounded-lg" @click="clear()">Clear</button>
            </div>
            </footer>
        </div>
    </div>
</template>

<script setup lang="ts">
  import { Head, Link, router } from '@inertiajs/vue3';
// import { route } from 'vendor/tightenco/ziggy/src/js';

defineProps<{
    items: any,
    closeCart: Function
}>()

document.body.style.overflow = 'hidden';

const checkout = () => {
    alert('Checkout')
}

const clear = () => {
    // @ts-ignore
    router.post(route('cart.clear'), { preserveScroll: true });
}

const remove = (id: number) => {
    // @ts-ignore
    router.post(route('cart.remove'), { id:id }, { preserveScroll: true });
}

const view = (slug: string) => {
    // @ts-ignore
    router.get(route('product.show', slug), { preserveScroll: true });
}
// const closeCart = () => {
//     document.body.style.overflow = 'auto';
//     // @ts-ignore
//     router.get(route('cart.index'), { preserveScroll: true });
// }
</script>

<style scoped>
</style>
