<script setup lang="ts">
import ClientLayout from '@/Layouts/ClientLayout.vue';
import { useForm } from '@inertiajs/vue3';
// @ts-ignore
import statesData from '../../../assets/nigeria.json';
import { ref } from 'vue';
import Section from '@/Components/Client/Section.vue';
import TextInput from '@/Components/Admin/TextInput.vue';
import InputLabel from '@/Components/Admin/InputLabel.vue';
import Button from '@/Components/Client/Button.vue';

defineProps<{
  cart: any
}>()

const form = useForm({
    name: '', // User's name (required by Paystack)
    phone: '', // User's phone number (optional by Paystack)
    address: '', // User's address (optional by Paystack)
    state: '', // User's state (optional by Paystack)
    city: '', // User's city (optional by Paystack)
    email: '', // User's email (required by Paystack)
});

const cities = ref([]);

// Function to update cities dynamically when state changes
const updateCities = () => {
  const selectedState = statesData.find((s) => s.name === form.state);
  cities.value = selectedState ? selectedState.cities : [];
}
// Handle form submission
const submitForm = () => {
    // @ts-ignore
  form.post(route('checkout.order'), {
    onSuccess: () => {
      console.log('Redirecting to Paystack...');
    },
    onError: (errors) => {
      console.error('Payment initiation failed:', errors);
    },
  });
};
</script>

<template>
    <ClientLayout title="Checkout">
        <Section>
            <form @submit.prevent="submitForm" class="grid grid-cols-3 gap-3">
                <div class="col-span-2">
                    <div class="grid grid-cols-2 gap-2 ">
                        <div class="col-span-2 w-full" >
                            <InputLabel for="name">Name</InputLabel>
                            <TextInput
                            id="name"
                            v-model="form.name"
                            type="text"
                            required
                            placeholder="Enter Receipient Name"
                            class="w-full"
                            />
                        </div>
                        <div>
                            <InputLabel for="email">Email</InputLabel>
                            <TextInput
                            id="email"
                            v-model="form.email"
                            type="email"
                            required
                            placeholder="Enter your email"
                            class="w-full"
                            />
                        </div>
                        <div>
                            <InputLabel for="phone">Phone</InputLabel>
                            <TextInput
                            id="phone"
                            v-model="form.phone"
                            type="text"
                            required
                            placeholder="Enter Receipient Phone"
                            />
                        </div>
                        <div>
                            <InputLabel for="state">State</InputLabel>
                            <select id="state" v-model="form.state" @change="updateCities" class="w-full text-gray-500 rounded-lg border-2 border-gray-300">
                                <option value="" disabled>Select State</option>
                                <option v-for="state in statesData" :key="state.name" :value="state.name">
                                    {{ state.name }}
                                </option>
                            </select>
                        </div>

                        <div>
                            <InputLabel for="city">City</InputLabel>
                            <select id="city" v-model="form.city" :disabled="!form.state" class="w-full text-gray-500 rounded-lg border-2 border-gray-300">
                                <option value="" disabled>{{form.state ? 'Select City' : 'Select State first'}}</option>
                            <option v-for="city in cities" :key="city" :value="city">
                                {{ city }}
                            </option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <InputLabel for="address">Address</InputLabel>
                            <TextInput
                            id="address"
                            v-model="form.address"
                            type="text"
                            required
                            placeholder="Enter Address"
                            class="w-full"
                            />
                        </div>
                    </div>

                </div>
                <div class="border rounded-2xl p-4">
                    <h1 class="font-bold text-2xl">Cart Information</h1>
                    <div class="flex flex-col gap-1">
                        <h2 class="font-semibold text-lg">Items:</h2>
                        <div v-for="item in cart" :key="item">
                            <h3 class="capitalize">Name: {{ item.name }}</h3>
                            <p>Quantity: {{ item.quantity }}</p>
                            <p>Price: {{ item.price }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <h2 class="font-semibold text-lg">Total Quantity:</h2>
                        <p>{{ cart.reduce((sum, item) => sum + item.quantity, 0) }}</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <h2 class="font-semibold text-lg">Total Price:</h2>
                        <p>{{ cart.reduce((sum, item) => sum + item.total, 0) }}</p>
                    </div>
                    <Button
                        primary
                        type="submit"
                        :disabled="form.processing"
                        class="w-full"
                    >
                        Continue to payment
                    </Button>
                </div>


            </form>
        </Section>

    </ClientLayout>
</template>

<style>
/* Add your styles here */
</style>
