<script setup lang="ts">
import { defineProps } from "vue";

const props =
    defineProps<{
        label?: string;
        name: string;
        errors?: Record<string, string>;
    }>();
</script>

<template>
    <div class="grid gap-2">
        <label v-if="label" :for="name" class="font-medium text-gray-500">
            {{ label }}
        </label>
        <slot />
        <div class="font-medium text-red-500" v-if="errors?.[name]">
            {{ errors[name] }}
        </div>
    </div>
</template>
