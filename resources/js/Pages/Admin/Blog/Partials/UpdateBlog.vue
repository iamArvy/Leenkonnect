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
import TipTap from '@/Components/TipTap.vue';
// import SecondaryButton from '@/Components/Admin/SecondaryButton.vue';
// import PrimaryButton from '@/Components/Admin/PrimaryButton.vue';


const open = ref(false);
const openForm = () => {
    open.value = true
}

const closeForm = () => {
    open.value = false
}


const props = defineProps<{
    categories: any,
    post: {
        title: string,
        category: {
            id: number,
            name: string
        },
        content: string,
        image: string
    }
}>();

const form = useForm({
    title: props.post.title,
    category_id: props.post.category.id,
    content: props.post.content,
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

const submit = () => {
    if (photoInput.value) {
        form.image = photoInput.value.files[0];
    }
    // @ts-ignore
    form.put(route('admin.blog.posts.update', {post: props.post.id}), {
        onSuccess: () => form.reset,
        preserveScroll: true
    })
}

</script>

<template>
    <DialogModal :show="open" :closeable="true" @close="closeForm">
        <template #title>
            Create new post
        </template>
        <template #content>
            <form enctype="multipart/form-data" class="flex flex-col gap-2">
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
                <div class="p-2 flex flex-col gap-2">
                    <InputLabel for="">Product Name</InputLabel>
                    <TextInput
                        v-model="form.title"
                    />
                    <InputError :message="form.errors.title" />
                </div>
                <div class="p-2 flex flex-col gap-2">
                    <InputLabel for="">Product Category</InputLabel>
                    <select v-model="form.category_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                    </select>
                    <InputError :message="form.errors.category_id" />
                </div>
                <div class="p-2 flex flex-col gap-2">
                    <InputLabel for="content">Content</InputLabel>
                    <TipTap v-model="form.content" />
                    <InputError :message="form.errors.content" />
                </div>
            </form>
        </template>
        <template #footer>
            <div class="flex flex-row gap-2">
                <PrimaryButton @click="submit()">Update</PrimaryButton>
                <SecondaryButton @click.prevent="closeForm()">Cancel</SecondaryButton>
            </div>
        </template>
    </DialogModal>
    <PrimaryButton @click="openForm">Update Post</PrimaryButton>
</template>
