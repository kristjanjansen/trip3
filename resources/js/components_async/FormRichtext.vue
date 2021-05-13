<script setup lang="ts">
import { defineProps, watch, useContext } from "vue";
import { useEditor, EditorContent } from "@tiptap/vue-3";
import StarterKit from "@tiptap/starter-kit";
import { isEmpty } from "lodash-es";

/* @TODO 
    bold, italic, link, placeholder
    autocapitalize="none"
    autocorrect="off"
    spellcheck="false"
*/

const props =
    defineProps<{
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
    onUpdate: () => {
        emit("update:modelValue", editor.value?.getHTML());
    },
    editorProps: {
        attributes: {
            class: "p-3 border-2 rounded-sm h-48 border-gray-400",
        },
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

// @TODO: Fix the border update
watch(
    [() => props.errors, editor],
    (errors) => {
        if (editor.value) {
            editor.value.setOptions({
                editorProps: {
                    attributes: {
                        class: isEmpty(errors)
                            ? "border-gray-400"
                            : "border-red-500",
                    },
                },
            });
        }
    },
    { immediate: true }
);
</script>

<template>
    <FieldLayout :label="label" :name="name" :errors="errors">
        <EditorContent :editor="editor" />
    </FieldLayout>
</template>
