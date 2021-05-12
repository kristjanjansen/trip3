<script setup lang="ts">
import { defineProps } from "vue";
import { useVModel } from "@vueuse/core";

const props = defineProps<{
    label?: string;
    name: string;
    modelValue: string;
    placeholder?: string;
    errors?: Record<string, string>;
}>();
const value = useVModel(props);
</script>

<template>
    <FieldLayout :label="label" :name="name" :errors="errors">
        <textarea
            type="text"
            :name="name"
            v-model="value"
            class="w-full h-48 p-3 text-base border-2 border-gray-400 rounded-sm"
            :class="{ 'border-red-500': errors?.[name] }"
            :placeholder="placeholder"
        />
        <div class="font-medium text-red-500" v-if="errors?.[name]">
            {{ errors[name] }}
        </div>
    </FieldLayout>
</template>
