<script setup lang="ts">
import { ref } from 'vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/Admin/ActionMessage.vue';
import FormSection from '@/Components/Admin/FormSection.vue';
import InputError from '@/Components/Admin/InputError.vue';
import InputLabel from '@/Components/Admin/InputLabel.vue';
import PrimaryButton from '@/Components/Admin/PrimaryButton.vue';
import SecondaryButton from '@/Components/Admin/SecondaryButton.vue';
import TextInput from '@/Components/Admin/TextInput.vue';
import DialogModal from '@/Components/Admin/DialogModal.vue';
// import SecondaryButton from '@/Components/Admin/SecondaryButton.vue';
// import PrimaryButton from '@/Components/Admin/PrimaryButton.vue';


const open = ref(false);
const openForm = () => {
    open.value = true
}

const closeForm = () => {
    open.value = false
}


const props = defineProps({
    categories: Array,
    brands: Array
});
const form = useForm({
    name: null,
    sku: null,
    description: null,
    category_id:null,
    brand_id: null,
    price: null,
    stock: null,
    features: [],
    tags: [],
    gallery: [],
    image: null
})

const photoPreview = ref(null);
const photoInput = ref(null);

const selectNewPhoto = () => {
    photoInput.value.click();
};

const updatePhotoPreview = () => {
    const photo = photoInput.value.files[0];

    if (! photo) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
};

const clearPhotoFileInput = () => {
    if (photoInput.value?.value) {
        photoInput.value.value = null;
    }
};

const submit = () => {
    if (photoInput.value) {
        form.image = photoInput.value.files[0];
    }

    if(galleryInput.value) form.gallery = galleryInput.value.files;
    // @ts-ignore
    form.post(route('admin.products.store'), {
        onSuccess: () => form.reset,
        preserveScroll: true
    })
    console.log(form)
}


const newTag = ref('');
const newFeature = ref<{ name: string; value: string }>({ name: '', value: '' });
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

const galleryInput = ref(null);
const galleryPreview = ref([]);

const selectNewGallery = () => {
    galleryInput.value.click();
};

const updateGalleryPreview = () => {
    const gallery = galleryInput.value?.files;

    if (!gallery) return;

    galleryPreview.value = []; // Clear previous previews

    // Convert FileList to an array
    Array.from(gallery).forEach((image:any) => {
        const reader = new FileReader();

        reader.onload = (e) => {
            galleryPreview.value.push(e.target.result);
        };

        reader.readAsDataURL(image);
    });
};

const clearGalleryFileInput = () => {
    if (galleryInput.value?.value) {
        galleryInput.value.value = null;
    }
};
</script>

<template>
    <DialogModal :show="open" :closeable="true" @close="closeForm">
        <template #title>
            Create new product
        </template>
        <template #content>
            <form enctype="multipart/form-data" class="grid grid-cols-2 gap-2">
                <div class="col-span-2">
                    <!-- Profile Photo File Input -->
                    <input
                        id="photo"
                        ref="photoInput"
                        type="file"
                        class="hidden"
                        @change="updatePhotoPreview"
                    >

                    <InputLabel for="photo" value="Photo" />

                    <!-- Current Profile Photo -->
                    <!-- <div v-show="! photoPreview" class="mt-2">
                        <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full size-20 object-cover">
                    </div> -->

                    <!-- New Profile Photo Preview -->
                    <div v-show="photoPreview" class="mt-2">
                        <span
                            class="block rounded-full size-20 bg-cover bg-no-repeat bg-center"
                            :style="'background-image: url(\'' + photoPreview + '\');'"></span>
                    </div>

                    <SecondaryButton class="mt-2 me-2" type="button" @click.prevent="selectNewPhoto">
                        Select A New Photo
                    </SecondaryButton>

                    <InputError :message="form.errors.image" class="mt-2" />
                </div>
                <!-- <div class="p-2 grid grid-cols-2 gap-2"> -->
                    <div class="p-2 flex flex-col gap-2">
                        <label for="">Product Name</label>
                        <TextInput
                            v-model="form.name"
                        />
                        <InputError :message="form.errors.name" />
                    </div>
                    <div class="p-2 flex flex-col gap-2">
                        <label for="">SKU</label>
                        <TextInput
                            v-model="form.sku"
                        />
                        <InputError :message="form.errors.sku" />
                    </div>
                <!-- </div> -->
                <div class="p-2 flex flex-col gap-2">
                    <label for="">Description</label>
                    <textarea name="" id="" v-model="form.description"></textarea>
                    <InputError :message="form.errors.description" />

                </div>
                <div class="p-2 flex flex-col gap-2">
                    <label for="">Category</label>
                    <select name="" id="" v-model="form.category_id" class="capitalize" placeholder="Category">
                        <!-- @vue-ignore -->
                        <option :value="item.id" v-for="(item, index) in categories" :key="index" class="capitalize" >
                            <!-- @vue-ignore -->
                            {{ item.name }}
                        </option>
                    </select>
                    <InputError :message="form.errors.category_id" />
                </div>
                <div class="p-2 grid grid-cols-2 gap-2">
                    <div  class="p-2 flex flex-col gap-2">
                        <label for="">Price</label>
                        <TextInput  v-model="form.price" type="number" />
                        <InputError :message="form.errors.price" />
                    </div>
                    <div  class="p-2 flex flex-col gap-2">
                        <label for="">Stock Quantity</label>
                        <TextInput v-model="form.stock" type="number" />
                        <InputError :message="form.errors.stock" />

                    </div>
                </div>
                <div class="p-2 flex flex-col gap-2">
                    <label for="">Features</label>
                    <div>
                        <div class="grid grid-cols-3 gap-2" v-for="(item, index) in form.features" :key="index">
                            <TextInput type="text" placeholder="Name" v-model="item.name" />
                            <TextInput type="text" placeholder="Value" v-model="item.value" />
                            <button @click.prevent="removeFeature(index)">Remove</button>
                        </div>
                        <div class="grid grid-cols-3 gap-2">
                            <TextInput type="text" placeholder="Name" v-model="newFeature.name" />
                            <TextInput type="text" placeholder="Value" v-model="newFeature.value" />
                            <button @click.prevent="addFeature">Add</button>
                        </div>
                    </div>
                </div>
                <div class="p-2 flex flex-col gap-2">
                    <label for="">Tags</label>
                    <div class="tag-input-container">
                        <TextInput
                            v-model="newTag"
                            @keydown.enter.prevent="addTag"
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
                </div>
                <div class="col-span-2">
                    <!-- Profile Photo File Input -->
                    <input
                        id="photo"
                        ref="galleryInput"
                        type="file"
                        class="hidden"
                        multiple
                        @change="updateGalleryPreview"
                    >

                    <InputLabel for="gallery" value="gallery" />

                    <SecondaryButton class="mt-2 me-2" type="button" @click.prevent="selectNewGallery">
                        Select A New Photo
                    </SecondaryButton>

                    <div class="flex flex-wrap gap-4 mt-4">
                        <div v-for="(preview, index) in galleryPreview" :key="index" class="relative">
                            <img :src="preview" alt="Gallery Preview" class="w-32 h-32 object-cover rounded border" />
                        </div>
                    </div>
                    <InputError :message="form.errors.gallery" class="mt-2" />
                </div>
            </form>
        </template>
        <template #footer>
            <div class="flex flex-row gap-2">
                <PrimaryButton @click="submit()">Create</PrimaryButton>
                <SecondaryButton @click="closeForm()">Cancel</SecondaryButton>
            </div>
        </template>
        <!-- <CreateProductForm :show="createFormIsOpen" :closeForm="closeCreateForm" :categories="categories" :brands="brands" /> -->
    </DialogModal>
    <PrimaryButton @click="openForm">Create Product</PrimaryButton>
</template>
