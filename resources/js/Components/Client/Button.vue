<template>
    <button :class="classes">
        <slot />
    </button>
</template>

<script setup lang="ts">
const props = defineProps<{
    primary?: boolean
    secondary?: boolean
}>();
    // const classes = {
    //     'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded': true,
    //     'bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded': props.variant === 'secondary',
    // };

    const classes = {
        'bg-black' : props.primary,
        'bg-gray-500' : props.secondary,
        'text-white font-bold py-2 px-4 rounded' : true
    }
</script>

<style scoped>

</style>
