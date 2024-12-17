<script setup lang="ts">

import { useEditor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import Underline from '@tiptap/extension-underline';
import BoldIcon from 'vue-material-design-icons/FormatBold.vue'
import ItalicIcon from 'vue-material-design-icons/FormatItalic.vue'
import UnderlineIcon from 'vue-material-design-icons/FormatUnderline.vue'
import H1Icon from 'vue-material-design-icons/FormatHeader1.vue'
import H2Icon from 'vue-material-design-icons/FormatHeader2.vue'
import H3Icon from 'vue-material-design-icons/FormatHeader3.vue'
import H4Icon from 'vue-material-design-icons/FormatHeader4.vue'
import ListIcon from 'vue-material-design-icons/FormatListBulleted.vue'
import OrderedListIcon from 'vue-material-design-icons/FormatListNumbered.vue'
import BlockquoteIcon from 'vue-material-design-icons/FormatQuoteClose.vue'
import CodeIcon from 'vue-material-design-icons/CodeTags.vue'
import HorizontalRuleIcon from 'vue-material-design-icons/Minus.vue'
import UndoIcon from 'vue-material-design-icons/Undo.vue'
import RedoIcon from 'vue-material-design-icons/Redo.vue'
const props = defineProps<{
  modelValue: string
}>()

const emit  = defineEmits(['update:modelValue'])
const editor = useEditor({
    content: props.modelValue,
    onUpdate: ({editor}) => {
        emit('update:modelValue', editor.getHTML())
    },
    extensions: [
        StarterKit,
        Underline
    ],
    editorProps: {
        attributes: {
            class: 'border border-gray-400 p-4 min-h-[12rem] overflow-y-auto max-h-[12rem] outline-none prose'
        }
    }
})
const buttonsData = [
{
        icon: BoldIcon,
        label: "bold",
        action: 'toggleBold',
        isActive: 'bold',
        canDisable: true
    },
    {
        icon: ItalicIcon,
        label: "italic",
        action: 'toggleItalic',
        isActive: 'italic',
        canDisable: true
    },
    {
        icon: UnderlineIcon,
        label: "underline",
        action: 'toggleUnderline',
        isActive: 'underline',
        canDisable: true
    },
    {
        icon: H1Icon,
        label: "H1",
        action: 'toggleHeading',
        actionParams: {level: 1},
        isActive: 'heading',
        canDisable: true
    },
    {
        icon: H2Icon,
        label: "H2",
        action: 'toggleHeading',
        actionParams: {level: 2},
        isActive: 'heading',
        canDisable: true
    },
    {
        icon: H3Icon,
        label: "H#",
        action: 'toggleHeading',
        actionParams: {level: 3},
        isActive: 'heading',
        canDisable: true
    },
    {
        icon: H4Icon,
        label: "H4",
        action: 'toggleHeading',
        actionParams: {level: 4},
        isActive: 'heading',
        canDisable: true
    },
    {
        icon: ListIcon,
        label: "Bullet List",
        action: 'toggleBulletList',
        isActive: 'bulletList'
    },
    {
        icon: OrderedListIcon,
        label: "Ordered List",
        action: 'toggleOrderedList',
        isActive: 'orderedList'
    },
    {
        icon: CodeIcon,
        label: "Code",
        action: 'toggleCodeBlock',
        isActive: 'codeBlock'
    },
    {
        icon: BlockquoteIcon,
        label: "Blockquote",
        action: 'toggleBlockquote',
        isActive: 'blockquote'
    },
    {
        icon: HorizontalRuleIcon,
        label: "Horizontal Rule",
        action: 'setHorizontalRule',
        canDisable: true
    },
    {
        icon: UndoIcon,
        label: "Undo",
        action: 'undo',
        canDisable: true
    },
    {
        icon: RedoIcon,
        label: "Redo",
        action: 'redo',
        canDisable: true
    }
];

</script>
<template>
    <div class="control-group">
      <div class="button-group flex flex-wrap gap-2" v-if="editor">
        <button
            v-for="(button, index) in buttonsData"
            :key = "index"
            @click.prevent="editor.chain().focus()[button.action](button.actionParams ?? null).run()"
            :disabled="button.canDisable ? !editor.can().chain().focus()[button.action](button.actionParams ?? null).run() : false"
            :class="{ 'bg-gray-200 rounded': button.isActive ? editor.isActive(button.isActive,button.actionParams ?? null) : null }"
            class = "p-1 disabled:text-gray-400"
        >
            <component :is="button.icon" :title="button.label" />
        </button>
      </div>
    </div>
    <editor-content :editor="editor"/>
  </template>
