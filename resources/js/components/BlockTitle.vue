<script setup lang="ts">
import { defineProps } from "vue";
defineProps({ href: { type: String, default: "" } });
</script>

<template>
    <inertia-link :href="href" class="group flex gap-2 items-center">
        <icon-rightarrow class="w-4 text-gray-500 group-hover:text-gray-700" />
        <h2
            class="text-sm text-green-600 group-hover:text-green-600 font-medium tracking-wider uppercase"
        >
            <slot />
        </h2>
    </inertia-link>
</template>
