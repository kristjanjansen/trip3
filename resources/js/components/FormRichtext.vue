<script setup lang="ts">
import { defineProps, watch, useContext } from "vue";
import { useEditor, EditorContent } from "@tiptap/vue-3";
import StarterKit from "@tiptap/starter-kit";

// @TODO bold, italic, link, placeholder

const props = defineProps<{ modelValue: string; placeholder?: string }>();
const { emit } = useContext();

const editor = useEditor({
    content: props.modelValue,
    extensions: [StarterKit],
    editorProps: {
        attributes: {
            class: "p-3 border-2 border-gray-400 rounded-sm",
        },
    },
    onUpdate: () => {
        emit("update:modelValue", editor.value?.getHTML());
    },
});

watch(
    () => props.modelValue,
    (modelValue) => {
        if (editor.value?.getHTML() === modelValue) {
            return;
        }
        editor.value?.commands.setContent(modelValue, false);
    }
);
</script>

<template>
    <editor-content :editor="editor" />
</template>
