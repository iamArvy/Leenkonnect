<template>
    <div class="relative">
        <div class="fixed top-0 left-0 w-full h-full bg-black opacity-50 z-20" @click="closeCart()"></div>
        <div class="fixed top-0 right-0 w-[400px] h-full bg-white z-20 flex flex-col gap-2">
            <header class="flex justify-between bg-primary text-white p-4 ">
                <h1 class="text-2xl font-bold">Cart</h1>
                <button @click="closeCart()" class="md:hidden">Close</button>
            </header>
            <div class="flex-grow flex flex-col items-center justify-center p-4 ">
                <div class="flex flex-col gap-4 overflow-y-auto h-full w-full" v-if="items.length > 0">
                    <div v-for="item in items" :key="item.id" class="flex items-center gap-4">
                        <img :src="item.image" alt="" class="w-16 h-16 object-cover">
                        <div class="flex flex-col gap-1">
                            <h1 class="text-lg font-bold">{{ item.name }}</h1>
                            <p class="text-gray-500">{{ item.price }}</p>
                            <p class="text-gray-500">{{ item.total }}</p>
                            <p class="text-gray-500">Quantity: {{ item.quantity }}</p>
                        </div>
                    </div>
                </div>
                <div v-else class="text-gray-500">No items in cart</div>
            </div>
            <footer class="p-4">
                <div class="flex justify-between mt-4">
                <h1 class="text-lg font-bold">Cart Total:</h1>
                <h1 class="text-lg font-bold">{{ '#' + items.reduce((total, item) => total + item.total, 0) }}</h1>
            </div>
            <div class="flex justify-between mt-4">
                <button class="bg-primary text-white px-4 py-2 rounded-lg" @click="checkout()">Checkout</button>
                <button class="bg-primary text-white px-4 py-2 rounded-lg" @click="clear()">Clear</button>
            </div>
            </footer>
        </div>
    </div>
</template>

<script setup lang="ts">
defineProps<{
    items: any,
    closeCart: Function
}>()

const checkout = () => {
    alert('Checkout')
}

const clear = () => {
    alert('Clear')
}
</script>

<style scoped>
</style>
