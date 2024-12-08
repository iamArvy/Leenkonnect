<template>
    <ul>
        <li class="grid grid-cols-8">
            <input type="checkbox" name="" id="">
            <p>Image</p>
            <p>Name</p>
            <p>SKU</p>
            <p>Price</p>
            <p>Stock</p>
        </li>
        <li v-for="product in products.data" :key="product.id" class="grid grid-cols-8">
            <input type="checkbox" name="" id="">
            <div class="flex justify-between">
                <div>
                    <p>{{ product.name }}</p>
                    <p>{{ product.price }}</p>
                </div>
                <div>
                    <button @click="router.get(route('admin.products.edit', product.id))">Edit</button>
                    <button @click="router.delete(route('admin.products.destroy', product.id))">Delete</button>
                </div>
            </div>
            <!-- <h3>{{ product.name }}</h3> -->
        </li>
    </ul>
</template>

<script setup lang="ts">

</script>

<style scoped>

</style>
