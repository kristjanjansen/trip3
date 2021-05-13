<script setup lang="ts">
import { defineProps } from "vue";
defineProps<{ href: string }>();
</script>

<template>
    <InertiaLink
        :href="href"
        class="px-6 py-2 font-medium text-white bg-green-500 rounded hover:bg-green-400 active:bg-green-600"
    >
        <slot />
    </InertiaLink>
</template>
