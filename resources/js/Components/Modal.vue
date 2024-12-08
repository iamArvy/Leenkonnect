<template>
    <div class="relative">
        <div class="fixed top-0 left-0 w-full h-full bg-black opacity-50 z-20" @click="closeForm()"></div>
        <div class="fixed top-0 left-32 w-full lg:w-[80%] h-full bg-white z-30 flex flex-col gap-2">
            <header class="flex justify-between bg-primary text-white p-4">
                <h1 class="text-2xl font-bold">{{ product ? 'Update Product' : 'Create Product' }}</h1>
                <button @click="closeForm()" class="md:hidden">Close</button>
            </header>
            <main>
                <slot />
            </main>
            <!-- <div class="grid grid-cols-2 p-4 h-full overflow-y-scroll" @submit.prevent="">
                <div>
                    <div class="p-2 flex flex-col gap-2">
                        <label for="">Product Name</label>
                        <TextInput v-model="form.name" />
                        <InputError :message="form.errors.name" />
                    </div>
                    <div class="p-2 flex flex-col gap-2">
                        <label for="">Description</label>
                        <textarea v-model="form.description"></textarea>
                        <InputError :message="form.errors.description" />
                    </div>
                    <div class="p-2 flex flex-col gap-2">
                        <label for="">Category</label>
                        <select v-model="form.category_id" class="capitalize">
                            <option v-for="(item, index) in categories" :key="index" :value="item.id" class="capitalize">
                                {{ item.name }}
                            </option>
                        </select>
                        <InputError :message="form.errors.category_id"/>
                    </div>
                    <div class="p-2 flex flex-col gap-2">
                        <label for="">Brand Name</label>
                        <select v-model="form.brand_id" class="capitalize">
                            <option v-for="(item, index) in brands" :key="index" :value="item.id" class="capitalize">
                                {{ item.name }}
                            </option>
                        </select>
                        <InputError :message="form.errors.brand_id"/>
                    </div>
                    <div class="p-2 grid grid-cols-2 gap-2">
                        <div class="p-2 flex flex-col gap-2">
                            <label for="">Price</label>
                            <TextInput v-model="form.price" />
                            <InputError :message="form.errors.price"/>
                        </div>
                        <div class="p-2 flex flex-col gap-2">
                            <label for="">Stock Quantity</label>
                            <TextInput v-model="form.stock" />
                            <InputError :message="form.errors.stock"/>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="p-2 flex flex-col gap-2">
                        <label for="">Features</label>
                        <div>
                            <div class="grid grid-cols-3 gap-2" v-for="(item, index) in form.features" :key="index">
                                <input type="text" placeholder="Name" v-model="item.name" />
                                <input type="text" placeholder="Value" v-model="item.value" />
                                <button @click="removeFeature(index)">Remove</button>
                            </div>
                            <div class="grid grid-cols-3 gap-2">
                                <input type="text" placeholder="Name" v-model="newFeature.name" />
                                <input type="text" placeholder="Value" v-model="newFeature.value" />
                                <button @click="addFeature">Add</button>
                            </div>
                        </div>
                        <InputError :message="form.errors.features" />
                    </div>
                    <div class="p-2 flex flex-col gap-2">
                        <label for="">Tags</label>
                        <div class="tag-input-container">
                            <input
                                v-model="newTag"
                                @keydown.enter="addTag"
                                type="text"
                                placeholder="Type a tag and press enter"
                            />
                            <div class="flex flex-row flex-wrap gap-2 p-2">
                                <span
                                    v-for="(tag, index) in form.tags"
                                    :key="index"
                                    class="p-2 bg-green-400 rounded-2xl text-sm"
                                >
                                    {{ tag }}
                                    <button @click="removeTag(index)" class="remove-tag">x</button>
                                </span>
                            </div>
                        </div>
                        <InputError :message="form.errors.tags"/>

                    </div>
                    <div class="p-2 flex flex-col gap-2">
                        <label for="">Image</label>
                        <input type="file" id="image" @change="handleFileUpload" />
                        <InputError v-if="form.errors.image">{{ form.errors.image }}</InputError>
                    </div>
                    <div class="p-2 flex flex-col gap-2">
                        <label for="">Gallery</label>
                        <div class="flex flex-wrap gap-4">
                            <div v-for="(image, index) in form.gallery" :key="index" class="relative">
                                <img :src="image" class="w-32 h-32 object-cover" />
                                <button @click="removeGalleryImage(index)" class="absolute top-1 right-1 bg-red-500 text-white px-2 py-1 rounded">x</button>
                            </div>
                        </div>
                        <input type="file" multiple @change="addGalleryImages" />
                        <InputError :message ="form.errors.gallery"/>
                    </div>
                    <div class="p-2 grid grid-cols-2 gap-2">
                        <button
                            class="bg-red-500 text-white px-4 py-2 rounded-lg"
                            @click.prevent="destroy(product.id)"
                            v-if="product"
                        >
                            Delete
                        </button>
                        <button
                            class="bg-primary text-white px-4 py-2 rounded-lg"
                            @click.prevent="product ? update() : create()"
                        >
                            {{ product ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</template>

<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import TextInput from './Admin/TextInput.vue';
import { ref, onMounted } from 'vue';
import InputError from './Admin/InputError.vue';

const props = defineProps<{
    product: any;
    closeForm: Function;
    categories: any;
    brands: any;
}>();

const newTag = ref('');
const newFeature = ref<{ name: string; value: string }>({ name: '', value: '' });

const form = useForm({
    name: props.product?.name || '',
    description: props.product?.description || '',
    category_id: props.product?.category_id || null,
    brand_id: props.product?.brand_id || '',
    price: props.product?.price || '',
    stock: props.product?.stock || '',
    features: props.product?.features || [],
    tags: props.product?.tags || [],
    image: '',
    gallery: props.product?.gallery || [],
});

const addFeature = () => {
    if (newFeature.value.name.trim() && newFeature.value.value.trim()) {
        form.features.push({ ...newFeature.value });
        newFeature.value = { name: '', value: '' };
    }
};

const removeFeature = (index: number) => {
    form.features.splice(index, 1);
};

const addTag = () => {
    if (newTag.value.trim() && !form.tags.includes(newTag.value.trim())) {
        form.tags.push(newTag.value.trim());
        newTag.value = '';
    }
};

const removeTag = (index: number) => {
    form.tags.splice(index, 1);
};

const handleFileUpload = (event: Event) => {
    const file = (event.target as HTMLInputElement).files?.[0];
    if (file) form.image = file;
};

const addGalleryImages = (event: Event) => {
    const files = (event.target as HTMLInputElement).files;
    if (files) {
        for (const file of files) {
            form.gallery.push({ file, preview: URL.createObjectURL(file) });
        }
    }
};

const removeGalleryImage = (index: number) => {
    form.gallery.splice(index, 1);
};

const create = () => {
    // @ts-ignore
    form.post(route('admin.products.store'), { preserveScroll: true });
};

const update = () => {
    // @ts-ignore
    form.put(route('admin.products.update', props.product.id), { preserveScroll: true });
    console.log(form.errors);
};

const destroy = (id: number) => {
    // @ts-ignore
    form.delete(route('admin.products.destroy', props.product.id), { preserveScroll: true });
};

onMounted(() => {
    console.log(props.categories);
    console.log(props.product)
});

document.body.style.overflow = 'hidden';
</script>

<style scoped>
label {
    font-weight: bold;
}
</style>
