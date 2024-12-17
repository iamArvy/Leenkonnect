<template>
    <ModalForm title="Create Consultant" :submit="submit">
        <div class="grid grid-cols-2 gap-3">
            <div class="">
                <InputLabel for="name" value="Name" />
                <TextInput class="w-full" v-model="form.name" type="text" name="name" autocomplete required/>
                <InputError :message="form.errors.name" class="mt-2" />
            </div>
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput
                    type="email"
                    name="email"
                    autocomplete
                    required
                    v-model="form.email"
                />
                <InputError :message="form.errors.email" class="mt-2" />
            </div>
            <div>
                <InputLabel for="phone" value="Phone" />
                <TextInput
                    type="text"
                    name="phone"
                    autocomplete
                    required
                    v-model="form.phone"
                />
                <InputError :message="form.errors.phone" class="mt-2" />
            </div>
            <div>
                <InputLabel for="name" value="Specialization" />
                <select v-model="form.specialisation_id">
                    <option value="" disabled>Select Specialization</option>
                    <option :value="item.id" v-for="(item, index) in specialisations">{{ item.name }}</option>
                </select>
                <InputError :message="form.errors.specialisation_id" class="mt-2" />
            </div>
            <div>
                <InputLabel for="accno" value="Account Number" />
                <input type="text" name="" id="" v-model="form.payment_information.account_number">
                <InputError :message="form.errors['payment_information.account_number']" class="mt-2" />
            </div>
            <div>
                <InputLabel for="bank" value="Bank" />
                <input type="text" name="" id="" v-model="form.payment_information.bank">
                <InputError :message="form.errors['payment_information.bank']" class="mt-2" />
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
    specialisations: {
        id: number
        name:string
    }[],
    consultant?: {
        id: number
        name: string
        email: string
        phone: string
        payment_information: {
            account_number: string
            bank: string
        }
        specialisation_id: number
    },
    update?: boolean
}>()

const form = useForm({
    name: props.update ? props.consultant?.name : '',
    email: props.update ? props.consultant?.email : '',
    phone: props.update ? props.consultant?.phone : '',
    payment_information: props.update ? props.consultant?.payment_information : {account_number: '', bank: ''},
    specialisation_id: props.update ? props.consultant?.specialisation_id : ''
})
const create = () => {
    // @ts-ignore
    form.post(route('admin.consultation.consultants.store'))
}

const update = () => {
    // @ts-ignore
    form.put(route('admin.consultation.consultants.update', props.consultant.id))
}
const submit = () => {
    props.update ? update() : create()
}
</script>

<style scoped>

</style>
