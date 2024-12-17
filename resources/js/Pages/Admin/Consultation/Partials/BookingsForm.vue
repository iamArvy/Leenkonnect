<template>
    <ModalForm title="Create Bookings" :submit="submit">
        <div class="grid grid-cols-2 gap-3">
            <div class="col-span-2">
                <InputLabel for="name" value="Name" />
                <TextInput class="w-full" v-model="form.name" />
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
                <InputLabel for="name" value="Specialization" />
                <select v-model="form.specialisation_id">
                    <option value="" disabled>Select Specialization</option>
                    <option :value="item.id" v-for="(item, index) in specialisations" :key="index">{{ item.name }}</option>
                </select>
                <InputError :message="form.errors.specialisation_id" class="mt-2" />
            </div>
            <div>
                <InputLabel for="date" value="Date" />
                <input type="date" name="date" v-model="form.date">
                <InputError :message="form.errors.date" class="mt-2" />
            </div>
            <div>
                <InputLabel for="time" value="Time" />
                <select id="timeSelect" v-model="form.time" :disabled="!form.date">
                    <option value="" disabled>{{form.date ? 'Select Time' : 'Select Date first'}}</option>
                    <option
                        v-for="(time, index) in timeOptions"
                        :key="index"
                        :value="time.value"
                        :disabled="time.disabled"
                    >
                        {{ time.label }}
                    </option>
                </select>
                <InputError :message="form.errors.time" class="mt-2" />
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
import { computed, watch } from 'vue';



const props = defineProps<{
    specialisations: {
        id: number
        name:string
    }[]
    booked_datetimes: {
        spcialisation_id: number
        date: string
        time: string
    }[]
}>()

const form = useForm({
    name: '',
    email: '',
    specialisation_id: null,
    date: null,
    time: '',
})

const submit = () => {
    // @ts-ignore
    form.post(route('admin.consultation.bookings.store'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset()
        }
    })
}
// Function to check if a specific time should be disabled
const isTimeDisabled = (time) => {
  if (!props.booked_datetimes || props.booked_datetimes.length === 0) return false;
  console.log("booked_datetimes:", props.booked_datetimes);
  console.log("form.date:", form.date);
  console.log("form.specialisation_id:", form.specialisation_id);
  return props.booked_datetimes.some(
    (booking) =>
      booking.spcialisation_id === form.specialisation_id &&
      booking.date === form.date &&
      booking.time === time
  );
};

// Computed property to dynamically generate time options
const timeOptions = computed(() =>
  Array.from({ length: 8 }, (_, i) => {
    const hour = 10 + i;
    const value = `${hour.toString().padStart(2, "0")}:00`;
    const displayHour = hour > 12 ? hour - 12 : hour;
    const period = hour >= 12 ? "PM" : "AM";
    const disabled = isTimeDisabled(value);
    return {
      value,
      label: `${displayHour}:00 ${period}`,
      disabled,
    };
  })
);

// Watch for form changes (for debugging or additional logic)
watch(
  () => [form.date, form.specialisation_id],
  () => {
    console.log("Time options updated:", timeOptions.value);
    console.log("date:", form.date);
    console.log("specialisation_id:", form.specialisation_id);
  }
);


</script>

<style scoped>

</style>
