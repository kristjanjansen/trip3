<script setup lang="ts">
import { defineProps } from "vue";
const props = defineProps<{ disabled?: boolean }>();
</script>
<template>
    <button
        class="px-6 py-2 font-medium text-white bg-green-500 rounded hover:bg-green-400 active:bg-green-600"
        :class="{ 'opacity-50': disabled }"
    >
        <slot />
    </button>
</template>
