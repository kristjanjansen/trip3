<script setup lang="ts">
import { defineProps } from "vue";
defineProps({ href: { type: String, default: "" } });
</script>

<template>
    <InertiaLink :href="href" class="flex items-center gap-2 group">
        <IconRightarrow class="w-4 text-gray-500 group-hover:text-gray-700" />
        <h2
            class="
                text-sm
                font-medium
                tracking-wider
                text-green-600
                uppercase
                group-hover:text-green-600
            "
        >
            <slot />
        </h2>
    </InertiaLink>
</template>
