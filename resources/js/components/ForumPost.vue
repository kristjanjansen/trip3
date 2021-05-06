<script setup lang="ts">
import { defineProps } from "vue";
import type { Content } from "../types";
defineProps<{ content: Content }>();
</script>

<template>
    <div class="grid grid-cols-1 md:grid-cols-[auto,1fr] gap-8">
        <div class="text-gray-200 transform -translate-y-2 w-14 h-14">
            <icon-user />
        </div>
        <div class="grid gap-4">
            <h1 class="text-3xl font-bold tracking-tight text-color-500">
                {{ content.title }}
            </h1>
            <div v-if="content.tags" class="flex h-6 gap-2">
                <Tag v-for="(tag, i) in content.tags" :key="i">{{ tag }}</Tag>
            </div>
            <div
                class="prose lg:prose-lg max-w-none prose-blue"
                v-html="content.body"
            ></div>
        </div>
    </div>
</template>
