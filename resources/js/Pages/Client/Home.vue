<template>
    <ClientLayout title="Home">
        <section class="w-full px-0 sm:px-3 py-0">
            <div
                class="flex flex-col-reverse sm:flex-row md:justify-end md:relative"
            >
                <div
                    class="lg:rounded-tr-[50px] lg:self-center lg:h-[70%] bg-white p-3 lg:p-10 lg:absolute sm:w-[50%] lg:z-2 left-0 flex flex-col gap-4"
                >
                    <h1
                        class="font-bold text-4xl sm:3xl lg:text-5xl text-primary"
                    >
                        Lorem ipsum dolor sit amet consectetur.
                    </h1>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing
                        elit. Iusto delectus, enim officia minima nam ea omnis
                        quam sunt veniam nostrum.
                    </p>
                    <button
                        class="py-2 px-4 bg-primary text-white rounded-lg w-fit"
                    >
                        Get Started
                    </button>
                </div>
                <figure
                    class="w-svw sm:w-[50%] lg:w-[70%] md:max-h-[480px] overflow-hidden rounded-bl-[50px]"
                >
                    <img src="/images/homehero.png" alt="hero" />
                </figure>
            </div>
        </section>
        <FullSection
            class="bg-[#1b2c61] bg-[url('/images/servicesbg.png')] text-white"
        >
            <div class="flex flex-col gap-4">
                <div>
                    <h2 class="text-md md:text-lg">Our Services</h2>
                    <p class="text-2xl md:text-4xl font-bold">
                        What We Offer for You
                    </p>
                </div>
                <ServicesCarousel :services="services" />
            </div>
        </FullSection>
        <Section>
            <div class="flex flex-col gap-4">
                <div>
                    <h2 class="font-semibold text-center mb-2">Shop with Us</h2>
                    <p class="text-2xl md:text-4xl font-bold text-center">
                        Featured Products
                    </p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <ProductCard
                        v-for="(item, index) in featuredProducts"
                        :key="index"
                        :product="item"
                    />
                </div>
            </div>
        </Section>
        <FullSection
            class="bg-[#1b2c61] bg-[url('/images/servicesbg.png')] text-white"
        >
            <div
                class="flex justify-center flex-col text-center gap-8 max-w-[80%] mx-auto"
            >
                <div class="flex flex-col gap-2 place-items-center">
                    <h2 class="text-center text:md md:text-lg font-normal mx-0">
                        Client's Feedback
                    </h2>
                    <p class="font-bold text-lg md:text-2xl mx-0">
                        What People Say
                    </p>
                    <span class="border-white border-t-2 bg-white w-20"></span>
                </div>
                <div>
                    <TestimonialSwiper :testimonials="testimonials" />
                </div>
            </div>
        </FullSection>
        <Section>
            <div class="grid grid-cols-3">
                <div>
                    <img src="" alt="" />
                    <div>
                        <h3></h3>
                        <hr />
                    </div>
                </div>
            </div>
        </Section>
        <FullSection class="bg-[#1b2c61] bg-[url('/images/servicesbg.png')]">
            <div class="flex flex-col gap-4">
                <h2 class="text-center font-bold text-xl text-white">
                    Contact Us
                </h2>
                <form
                    @submit.prevent="contact()"
                    class="mx-auto md:w-[50%] flex flex-col gap-4"
                >
                    <div class="col-span-6 sm:col-span-4">
                        <TextInput
                            id="contact_name"
                            v-model="contactform.name"
                            type="text"
                            class="mt-1 block w-full"
                            autocomplete="name"
                            required
                            placeholder="Full Name"
                        />
                        <InputError
                            :message="contactform.errors.name"
                            class="mt-2"
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <TextInput
                            id="contact_name"
                            v-model="contactform.email"
                            type="email"
                            class="mt-1 block w-full"
                            autocomplete="name"
                            placeholder="Email Address"
                        />
                        <InputError
                            :message="contactform.errors.email"
                            class="mt-2"
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <TextInput
                            id="contact_name"
                            v-model="contactform.subject"
                            type="text"
                            class="mt-1 block w-full"
                            autocomplete="name"
                            required
                            placeholder="Subject"
                        />
                        <InputError
                            :message="contactform.errors.subject"
                            class="mt-2"
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <textarea
                            name=""
                            id=""
                            rows="5"
                            placeholder="Have anything to say?"
                            v-model="contactform.message"
                            class="w-full"
                        ></textarea>
                        <InputError
                            :message="contactform.errors.message"
                            class="mt-2"
                        />
                    </div>
                    <button>Submit</button>
                </form>
            </div>
        </FullSection>
    </ClientLayout>
</template>

<script setup lang="ts">
import ClientLayout from "@/Layouts/ClientLayout.vue";
import Section from "@/Components/Client/Section.vue";
import ServicesCarousel from "@/Components/Client/ServicesCarousel.vue";
import ProductCard from "@/Components/Client/ProductCard.vue";
import { router, useForm } from "@inertiajs/vue3";
import { onMounted } from "vue";
import TestimonialSwiper from "./partials/TestimonialSwiper.vue";
import FullSection from "@/Components/Client/FullSection.vue";
import TextInput from "@/Components/Admin/TextInput.vue";
import InputError from "@/Components/Admin/InputError.vue";
// import { route } from 'vendor/tightenco/ziggy/src/js';

const props = defineProps<{
    featuredProducts: Array<any>;
    testimonials: Array<any>;
}>();

onMounted(() => {
    console.log(props.featuredProducts);
});
const services = [
    {
        name: "IT Consulting",
        description:
            "Transform your business with expert IT consultation services. We analyze your technology needs, provide tailored solutions, and implement strategies to optimize efficiency, enhance security, and drive innovation.",
        image: "/images/service1.png",
    },
    {
        name: "Network Setup",
        description:
            "Protect your business with advanced cybersecurity services. We safeguard your data, prevent breaches, and ensure compliance with robust security measures tailored to your needs.",
        image: "/images/service2.png",
    },
    {
        name: "Cybersecurity",
        description:
            "Streamline your operations with professional network setup services. We design, install, and configure reliable networks to keep your business connected and running efficiently.",
        image: "/images/service3.png",
    },
];

const contactform = useForm({
    name: "",
    email: "",
    subject: "",
    message: "",
});
const contact = () => {
    // @ts-ignore
    contactform.post(route("contact.store"), {
        preserveScroll: true,
        onSuccess: () => contactform.reset(),
    });
};
</script>

<style scoped></style>
