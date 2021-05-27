<script setup lang="ts">
import { defineProps } from "vue";
import { useVModel } from "@vueuse/core";

const props =
    defineProps<{
        label?: string;
        name: string;
        modelValue: string;
        placeholder?: string;
        errors?: Record<string, string>;
        autofocus?: boolean;
    }>();
const value = useVModel(props);
</script>

<template>
    <FieldLayout :label="label" :name="name" :errors="errors">
        <input
            type="text"
            v-model="value"
            class="w-full p-3 text-base border-2 border-gray-400 rounded-sm"
            :placeholder="placeholder"
            autocapitalize="none"
            autocorrect="off"
            spellcheck="false"
            :autofocus="autofocus"
        />
    </FieldLayout>
</template>
