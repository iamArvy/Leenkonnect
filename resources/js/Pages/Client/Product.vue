<script setup lang="ts">
import AppLayout from '@/Layouts/ClientLayout.vue'
import ProductGallery from '@/Components/Client/ProductGallery.vue';
// import ProductInfo from './partials/ProductInfo.vue';
import { onMounted, ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import Ratings from '@/Components/Client/Ratings.vue';
import Price from '@/Components/Client/Price.vue';
import Button from '@/Components/Client/Button.vue';
// import FormItem from '@/Components/Client/FormItem.vue';
import Section from '@/Components/Client/Section.vue';
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
    }
}>()

onMounted(() => {
  console.log(props.product)
})
const quantity = ref(1)

// const form = useForm({
//   'product_id': props.product.id,
//   'quantity' : 1,
//   'variant_id' : ''
// })

// const addtocart = () => {
//   form.quantity = quantity.value
//   form.post(route('product.add.cart'))
//   console.log(form.errors)
// }
</script>

<template>
  <AppLayout title="Product">
    <Section class="grid grid-cols-3 gap-4">
        <ProductGallery :images="product.gallery" id="gallery" class="w-full" />
        <div class="flex flex-col gap-2 w-full col-span-2 p-2">
            <h1 class="text-3xl">{{ product.name }}</h1>
            <Ratings :rating="3.5" />
            <Price :price="product.price" />
            <p>{{ product.description }}</p>
            <hr>
            <form @submit.prevent="" class="w-ful">
                <div class="flex flex-row justify-between gap-2">
                    <FormItem>
                    <div class="flex flex-row items-center gap-6 h-full p-2">
                    <button @click="quantity--" class="px-2"><i class='bx bx-minus'></i></button>
                    <span>{{ quantity }}</span>
                    <button @click="quantity++" class="px-2"><i class='bx bx-plus'></i></button>
                </div>
                </FormItem>

                <Button primary class="flex-grow">Add to Cart <i class='bx bx-cart-add'></i></Button>
                </div>

            </form>
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
  </AppLayout>
</template>

