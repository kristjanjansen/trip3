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
    <div class="grid gap-2">
        <label v-if="label" :for="name" class="font-medium text-gray-500">
            {{ label }}
        </label>
        <textarea
            type="text"
            :name="name"
            v-model="value"
            class="w-full p-3 text-base border-2 border-gray-400 rounded-sm"
            :class="{ 'border-red-500': errors?.[name] }"
            :rows="6"
            :placeholder="placeholder"
        />
        <div class="font-medium text-red-500" v-if="errors?.[name]">
            {{ errors[name] }}
        </div>
    </div>
</template>
