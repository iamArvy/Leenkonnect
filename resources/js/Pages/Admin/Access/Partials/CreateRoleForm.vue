<script setup lang="ts">
import { computed, ref } from 'vue';
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
    permissions: {
        name: string
    }[]
}>();
const form = useForm({
    name: null,
    permissions: []
})

const submit = () => {
    // @ts-ignore
    form.post(route('admin.access.roles.store'), {
        onSuccess: () => {form.reset, closeForm()},
    })
}



// const selectedItems = ref([]);

const isAllSelected = computed(() => {
    return props.permissions.length > 0 && form.permissions.length === props.permissions.length;
});

const toggleSelectAll = (event) => {
    if (event.target.checked) {
    form.permissions = props.permissions.map((item) => item.name); // Select all
    } else {
        form.permissions = [];
    }
};

// Check if a specific order is selected
const isSelected = (itemName) => {
    return form.permissions.includes(itemName);
};

// Toggle selection for a specific order
const toggleItemSelection = (itemName) => {
    if (isSelected(itemName)) {
        form.permissions = form.permissions.filter((name) => name !== itemName);
    } else {
        form.permissions.push(itemName);
    }
};
</script>

<template>
    <DialogModal :show="open" :closeable="true" @close="closeForm">
        <template #title>
            Create new role
        </template>
        <template #content>
            <form class="flex flex-col gap-2">
                    <div class="p-2 flex flex-col gap-2">
                        <label for="">Role Name</label>
                        <TextInput
                            v-model="form.name"
                        />
                        <InputError :message="form.errors.name" />
                    </div>
                    <div class="p-2 flex flex-col gap-2">
                        <label for="">Permissions</label>
                        <ul class="p-2 bg-white rounded-lg">
                            <li class="grid grid-cols-7">
                                <input
                                type="checkbox"
                                name=""
                                id=""
                                :checked="isAllSelected"
                                @change="toggleSelectAll
                                ">
                                <p class="col-span-2 z-3">All</p>
                            </li>
                            <li v-for="item in permissions" :key="item.name" class="grid grid-cols-7">
                                <input type="checkbox" name="" id=""
                                :checked="isSelected(item.name)"
                                @change="toggleItemSelection(item.name)"
                                >
                                <p class="col-span-2 z-3 hover:underline cursor-pointer" @click="console.log('hi')">{{ item.name }}</p>
                            </li>
                        </ul>
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
    <PrimaryButton @click="openForm">Create Role</PrimaryButton>
</template>
