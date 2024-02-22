<template>
    <editor-content :editor="editor" />
</template>

<script setup>
import { useEditor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'



const props = defineProps({
    modelValue : String
})

const editor = useEditor({
    content: props.modelValue,
    extensions: [
        StarterKit,

    ],
    editorProps: {
        attributes: {
            class: 'border border-gray-400 py-2 px-3 min-h-[200px]'
        }
    }
})



const emit = defineEmits(['update:modelValue'])
</script>
