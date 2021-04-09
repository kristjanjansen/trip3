<script setup lang="ts">
import { defineProps } from "vue";
defineProps({ content: { type: Object }, user: { type: Object } });
</script>

<template>
    <inertia-link :href="user.link" class="flex gap-2 items-center">
        <icon-user
            class="w-5 text-cyan-500 hover:text-gray-300 rounded-full ring-cyan-500 ring-2"
        />
        <div class="text-cyan-500 font-medium">{{ user.name }}</div>
        <div class="font-sans text-gray-300">{{ content.ago }}</div>
    </inertia-link>
</template>
