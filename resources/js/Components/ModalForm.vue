<script setup lang="ts">
import { ref } from 'vue';
import PrimaryButton from '@/Components/Admin/PrimaryButton.vue';
import SecondaryButton from '@/Components/Admin/SecondaryButton.vue';
import DialogModal from '@/Components/Admin/DialogModal.vue';
const open = ref(false);
const openForm = () => {
    open.value = true
}

const closeForm = () => {
    open.value = false
}


const props = defineProps<{
    submit: () => void,
    title: string
}>();



</script>

<template>
    <DialogModal :show="open" :closeable="true" @close="closeForm">
        <template #title>
            Create new post
        </template>
        <template #content>
            <form enctype="multipart/form-data" class="flex flex-col gap-2">
                <slot />
            </form>
        </template>
        <template #footer>
            <div class="flex flex-row gap-2">
                <PrimaryButton @click="submit()">Submit</PrimaryButton>
                <SecondaryButton @click.prevent="closeForm()">Cancel</SecondaryButton>
            </div>
        </template>
    </DialogModal>
    <PrimaryButton @click="openForm">{{ title }}</PrimaryButton>
</template>
