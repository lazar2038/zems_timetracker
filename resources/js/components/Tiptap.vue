<template>
    <editor-content :editor="editor" />
</template>

<script setup>
import { useEditor, EditorContent } from '@tiptap/vue-3'
import { watch } from "vue";

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
    },

    onUpdate: ({ editor }) => {
        emit('update:modelValue', editor.getHTML())
    },
})

const emit = defineEmits(['update:modelValue'])

watch(
    () => props.modelValue,
    value => {
        const isSame = editor.value.getHTML() === value;
        if(isSame) {
            return;
        }
        editor.value.commands.setContent(value, false);
    }
)


</script>
