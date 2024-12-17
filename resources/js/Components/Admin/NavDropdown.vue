<script setup>
// import { computed } from 'vue';
// import { Link } from '@inertiajs/vue3';
import { computed, onMounted, onUnmounted, ref } from 'vue';

const props = defineProps({
    align: {
        type: String,
        default: 'right',
    },
    width: {
        type: String,
        default: '48',
    },
    contentClasses: {
        type: Array,
        default: () => ['py-1', 'bg-white'],
    },
    active: Boolean,
    name: String
});
const classes = computed(() => {
    return props.active
        ? 'block w-full ps-3 pe-4 py-2 rounded-md bg-primary text-start text-base font-medium text-white bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out cursor-pointer'
        : 'block w-full ps-3 pe-4 py-2 rounded-md border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-300 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
});
</script>

<template>
    <details class="cursor-pointer">
        <summary :class="classes">{{ name }}</summary>
        <div class="p-2">
            <slot />
        </div>
    </details>
</template>
