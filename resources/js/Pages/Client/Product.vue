<script setup lang="ts">
import ProductGallery from '@/Components/Client/ProductGallery.vue';
// import ProductInfo from './partials/ProductInfo.vue';
import { computed, onMounted, reactive, ref } from 'vue';
// import { useForm } from '@inertiajs/vue3';
import Ratings from '@/Components/Client/Ratings.vue';
import Price from '@/Components/Client/Price.vue';
import Button from '@/Components/Client/Button.vue';
// import FormItem from '@/Components/Client/FormItem.vue';
import Section from '@/Components/Client/Section.vue';
import ClientLayout from '@/Layouts/ClientLayout.vue';
import { router, useForm } from '@inertiajs/vue3';
const props = defineProps<{
    product: {
      id: string
        name: string
        description:string
        image:string
        gallery:string[]
        price: number
        discount? : number
        rating: number
        features: {
            name: string
            value: string
        }[]
        reviews: {
            id: string
            name: string
            rating: number
            comment: string
            created_at: string
        }[]
        tags: string[]
    },
    cart: any
}>()
const cartItem = computed(() =>
  props.cart.find((item: { id: string }) => item.id === props.product.id)
);

const cartquantity = computed(() => (cartItem.value ? cartItem.value.quantity : 1));

const quantity = reactive({
  value: cartquantity.value, // Initialize with the cart quantity
});

const form = useForm({
  id: props.product.id,
  quantity: quantity.value, // Use the reactive quantity
});

</script>

<template>
  <ClientLayout title="Product">
    <Section class="lg:grid grid-cols-3 gap-6 sm:gap-4">
        <ProductGallery :images="product.gallery" id="gallery" class="w-full" />
        <div class="flex flex-col gap-1 sm:gap-2 w-full col-span-2 p-2">
            <h1 class="text-xl sm:text-3xl capitalize font-bold">{{ product.name }}</h1>
            <Ratings :rating="3" />
            <Price :price="product.price" />
            <p class="text-gray">{{ product.description }}</p>
            <hr>
            <div v-if="!cartItem" >
                <!-- @vue-ignore -->
                <Button primary class="flex-grow rounded-3xl flex items-center justify-center text-center" @click="router.post(route('cart.add'), { id: props.product.id, quantity: 1 }, { preserveScroll: true })">
                    Add to Cart <box-icon name='cart-add'></box-icon>
                </Button>
            </div>
            <!-- @vue-ignore -->
            <form v-else @submit.prevent="form.post(route('cart.update'), { preserveScroll: true })" class="w-full grid grid-cols-2">
                <input type="number" name="" id="" min="1" v-model="form.quantity" class="border border-gray-300 rounded-3xl w-full text-center">
                <Button primary class="flex-grow rounded-3xl items-center flex justify-center" >
                    Update <box-icon name='cart-add'></box-icon>
                </Button>
            </form>
        </div>
        <div>
            <h2 class="font-bold text-xl">Features</h2>
            <div>
                <div v-for="(item,index) in product.features" :key="index" class="flex flex-row gap-2">
                    <h3 class="font-semibold text-base capitalize">{{item.name}}:</h3>
                    <p>{{ item.value }}</p>
                </div>
            </div>
        </div>
        <div>
            <h2 class="font-bold text-xl">Tags</h2>
            <div class="flex flex-wrap gap-2">
                <div v-for="(item,index) in product.tags" :key="index" class="py-1 px-3 rounded-xl border bg-gray-300">
                    <p>{{ item }}</p>
                </div>
            </div>
        </div>
         <!-- <ProductGallery -->
        <!-- <ProductInfo :product="product" class="col-span-2" /> -->
    </Section>


    <!-- <HeroSection />
    <BrandMarquee class="full-width" />
    <ProductListSection title="New Arrivals" />
    <ProductListSection title="Top Selling" />
    <Categories /> -->
    <!-- <Testimonial /> -->
  </ClientLayout>
</template>

