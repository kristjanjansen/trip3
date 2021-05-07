<template>
    <editor-content :editor="editor" />
</template>

<script setup>
import { useEditor, EditorContent } from "@tiptap/vue-3";
import StarterKit from "@tiptap/starter-kit";
const editor = useEditor({
    content: "<p>I’m running tiptap with Vue.js. 🎉</p>",
    extensions: [StarterKit],
    editorProps: {
        attributes: {
            class:
                "prose prose-blue max-w-none p-6 border-2 border-gray-400 rounded-sm",
        },
    },
});
</script>
