<template>
    <ClientLayout title="Blog">
        <div class="w-full bg-[#1b2c61] bg-[url('/images/servicesbg.png')]">
            <Section>
                <div class="text-white min-h-[50svh] flex flex-col justify-center items-center">
                    <h1 class="text-3xl text-center font-bold">{{ post.title }}</h1>
                    <div><span>{{ post.date }}</span></div>
                    <!-- <p class="text-xl text-center">Explore our services</p> -->
                </div>
            </Section>
        </div>
        <Section>
            <div>
                <editor-content :editor="editor" />
            </div>
        </Section>
    </ClientLayout>
</template>

<script setup lang="ts">
import Section from '@/Components/Client/Section.vue';
import ClientLayout from '@/Layouts/ClientLayout.vue';
import { ref, onMounted, watch } from 'vue';
import axios from 'axios';
import { EditorContent, useEditor } from '@tiptap/vue-3';
import StarterKit from '@tiptap/starter-kit';

const props = defineProps<{
    post: {
        title: string
        image:string
        content: string,
        date: string,
        category: {
            name:string
        }
    }
}>()


const editor = useEditor({
  extensions: [StarterKit],
  content: props.post.content,
  editable: false,
  editorProps: {
        attributes: {
            // class: 'border border-gray-400 p-4 min-h-[12rem] overflow-y-auto max-h-[12rem] outline-none prose'
            class: 'prose min-w-full'
        }
    }
});
</script>

<style scoped>

</style>
