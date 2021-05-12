<script setup lang="ts">
import { defineProps, watch, useContext } from "vue";
import { useEditor, EditorContent } from "@tiptap/vue-3";
import StarterKit from "@tiptap/starter-kit";
import { isEmpty } from "lodash-es";

// @TODO bold, italic, link, placeholder

const props = defineProps<{
    label?: string;
    name: string;
    modelValue: string;
    placeholder?: string;
    errors?: Record<string, string>;
}>();

const { emit } = useContext();

const editor = useEditor({
    content: props.modelValue,
    extensions: [StarterKit],
    editorProps: {
        attributes: {
            class: [
                ...["p-3 border-2 rounded-sm h-48"],
                isEmpty(props.errors) ? "border-gray-400" : "border-red-500",
            ].join(" "),
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
    <FieldLayout :label="label" :name="name" :errors="errors">
        <EditorContent :editor="editor" />
    </FieldLayout>
</template>
