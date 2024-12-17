<template>
    <ModalForm :title="isUpdate ? 'Update Specialization' : 'Create Specialization'" :submit="submit">
        <div class="flex flex-col gap-3">
            <div class="col-span-2">
                <InputLabel for="name" value="Name" />
                <TextInput class="w-full" v-model="form.name"/>
                <InputError :message="form.errors.name" class="mt-2" />
            </div>
            <div>
                <InputLabel for="description" value="Description"  />
                <textarea name="description" cols="4" class="w-full" v-model="form.description"></textarea>
                <InputError :message="form.errors.description" class="mt-2" />
            </div>
        </div>
    </ModalForm>
</template>

<script setup lang="ts">
import InputError from '@/Components/Admin/InputError.vue';
import InputLabel from '@/Components/Admin/InputLabel.vue';
import TextInput from '@/Components/Admin/TextInput.vue';
import ModalForm from '@/Components/ModalForm.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps<{
    isUpdate? : boolean | undefined
    specialisation?: {
        id: number
        name:string
        description:string
    }
}>()

const form = useForm({
    name: props.isUpdate && props.specialisation ? props.specialisation.name : '',
    description: props.isUpdate && props.specialisation ? props.specialisation.description : ''
})

const create = () => {
    // @ts-ignore
    form.post(route('admin.consultation.specialisations.store'))
}

const update = () => {
    // @ts-ignore
    form.put(route('admin.consultation.specialisations.update', props.specialisation.id))
}
const submit = () => {
    // @ts-ignore
    props.update ? update() : create()
}
</script>

<style scoped>

</style>
