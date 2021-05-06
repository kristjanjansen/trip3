<script setup lang="ts">
import { defineProps } from "vue";
import type { Content } from "../types";
defineProps<{ content: Content }>();
</script>

<template>
    <div class="grid grid-cols-1 md:grid-cols-[auto,1fr] gap-5">
        <div class="w-12 h-12 text-gray-200"><icon-user /></div>
        <div class="grid gap-6">
            <h1 class="text-3xl font-bold tracking-tight text-color-600">
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
