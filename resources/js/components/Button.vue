<script setup lang="ts">
import { defineProps } from "vue";
defineProps({ href: { type: String, default: "" } });
</script>

<template>
    <inertia-link
        :href="href"
        class="px-6 py-2 text-white font-medium hover:bg-green-400 bg-green-500 active:bg-green-600 rounded"
    >
        <slot />
    </inertia-link>
</template>
