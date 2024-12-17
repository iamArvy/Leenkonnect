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


const props = defineProps<{
    roles: {
        name: string
    }[]
}>()
const form = useForm({
    first_name: null,
    last_name: null,
    role: null,
    email: null
})

const submit = () => {
    // @ts-ignore
    form.post(route('admin.access.users.store'), {
        onSuccess: () => form.reset,
    })
}
</script>

<template>
    <DialogModal :show="open" :closeable="true" @close="closeForm">
        <template #title>
            Create new user
        </template>
        <template #content>
            <form class="grid grid-cols-2 gap-2">
                    <div class="p-2 flex flex-col gap-2">
                        <label for="">First Name</label>
                        <TextInput
                            v-model="form.first_name"
                        />
                        <InputError :message="form.errors.first_name" />
                    </div>
                    <div class="p-2 flex flex-col gap-2">
                        <label for="">Last Name</label>
                        <TextInput
                            v-model="form.last_name"
                        />
                        <InputError :message="form.errors.last_name" />
                    </div>
                    <div class="p-2 flex flex-col gap-2">
                        <label for="">Email</label>
                        <TextInput
                            v-model="form.email"
                        />
                        <InputError :message="form.errors.email" />
                    </div>
                    <div class="p-2 flex flex-col gap-2">
                        <label for="">Role</label>
                        <select name="" id="" v-model="form.role">
                            <option v-for="role in roles" :key="role.name" :value="role.name">{{ role.name }}</option>
                        </select>
                        <InputError :message="form.errors.role" />
                    </div>

            </form>
        </template>
        <template #footer>
            <div class="flex flex-row gap-2">
                <PrimaryButton @click="submit()">Create</PrimaryButton>
                <SecondaryButton @click="closeForm()">Cancel</SecondaryButton>
            </div>
        </template>
    </DialogModal>
    <PrimaryButton @click="openForm">Create User</PrimaryButton>
</template>
