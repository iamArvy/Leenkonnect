<template>
    <!-- <nav>
      <ul class="pagination">
        <li
          v-for="link in links"
          :key="link.url"
          :class="{ active: link.active, disabled: !link.url }"
        >
          <button
            v-if="link.url"
            @click.prevent="emitPageChange(link.url)"
          >
            {{ link.label }}
      </button>
          <span v-else>{{ link.label }}</span>
        </li>
      </ul>
    </nav> -->
    <div class="pagination p-4 flex flex-row justify-between">
        <button :disabled="!prev"
            @click.prevent="emitPageChange(prev)"
            class="border-black border p-2 rounded-md">Previous
        </button>
        <button :disabled="!next"
            @click="emitPageChange(next)"
            class="border-black border p-2 rounded-md">
            Next
        </button>
    </div>
  </template>

  <script setup>
  import { defineProps, defineEmits } from 'vue';

// Define the properties and the emit function
const emit = defineEmits();  // Use this to define the emit function in the setup script

const props = defineProps({
//   links: Array,  // Expecting the pagination links from the parent
  prev: String,
  next: String,
//   products: Object
});

const emitPageChange = (url) => {
//   console.log('Emitting URL:', url); // Log to verify the URL is correct
  emit('paginate', url);  // Emit the event with the URL to the parent component
};
  </script>

  <style>
  .pagination {
    list-style: none;
    display: flex;
    gap: 5px;
  }
  .pagination li {
    padding: 5px 10px;
    cursor: pointer;
  }
  .pagination li.active {
    font-weight: bold;
  }
  .pagination li.disabled {
    opacity: 0.5;
    pointer-events: none;
  }
  </style>
