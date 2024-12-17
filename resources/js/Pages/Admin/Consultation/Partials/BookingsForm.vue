<template>
    <ModalForm title="Create Bookings" :submit="submit">
        <div class="grid grid-cols-2 gap-3">
            <div class="col-span-2">
                <InputLabel for="name" value="Name" />
                <TextInput class="w-full" />
            </div>
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput
                    type="email"
                    name="email"
                    autocomplete
                    required
                />
            </div>
            <div>
                <InputLabel for="name" value="Specialization" />
                <select>
                    <option value="" disabled>Select Specialization</option>
                    <option :value="item.id" v-for="(item, index) in specialisations">{{ item.name }}</option>
                </select>
            </div>
            <div>
                <InputLabel for="date" value="Date" />
                <input type="date" name="" id="">
            </div>
            <div>
                <InputLabel for="time" value="Time" />
                <input type="time" name="" id="">
            </div>
        </div>
    </ModalForm>
</template>

<script setup lang="ts">
import InputLabel from '@/Components/Admin/InputLabel.vue';
import TextInput from '@/Components/Admin/TextInput.vue';
import ModalForm from '@/Components/ModalForm.vue';

const submit = () => {
    console.log('submit')
}

const props = defineProps<{
    specialisations: {
        id: number
        name:string
    }[]
}>()
</script>

<style scoped>

</style>
