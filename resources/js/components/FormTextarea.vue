<script setup lang="ts">
import { defineProps } from "vue";
import { useVModel } from "@vueuse/core";

const props = defineProps<{
    name: string;
    modelValue: string;
    placeholder?: string;
}>();
const value = useVModel(props);
</script>

<template>
    <textarea
        type="text"
        :name="name"
        v-model="value"
        class="w-full p-3 text-base border-2 border-gray-400 rounded-sm"
        :rows="6"
        :placeholder="placeholder"
    />
</template>
