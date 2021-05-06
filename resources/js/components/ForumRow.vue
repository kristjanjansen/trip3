<script setup lang="ts">
import { defineProps } from "vue";
import type { Content } from "../types";
defineProps<{ content: Content }>();
</script>

<template>
    <div class="flex items-center gap-3">
        <div class="text-gray-200 h-14 w-14">
            <icon-user />
        </div>
        <div class="grid gap-3">
            <inertia-link
                :href="route('forum.show', content.id)"
                class="text-xl font-medium hover:text-gray-800"
            >
                <h3>{{ content.title }}</h3>
            </inertia-link>
            <div class="flex h-6 gap-2">
                <Tag v-for="(tag, i) in content.tags" :key="i">{{ tag }}</Tag>
            </div>
        </div>
    </div>
</template>
