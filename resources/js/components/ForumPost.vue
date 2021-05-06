<script setup lang="ts">
import { defineProps } from "vue";
import type { Content } from "../types";
defineProps<{ content: Content }>();
</script>

<template>
    <div class="grid grid-cols-1 md:grid-cols-[auto,1fr] gap-5">
        <icon-user
            class="w-12 text-gray-200 border-4 rounded-full md:w-16 border-cyan-500"
        />
        <div class="grid gap-6">
            <h1 class="text-3xl font-bold tracking-tight text-color-600">
                {{ content.title }}
            </h1>
            <div class="flex gap-2">
                <Tag v-for="(tag, i) in content.tags" :key="i">{{ tag }}</Tag>
            </div>
            <div
                class="prose lg:prose-lg max-w-none prose-blue"
                v-html="content.body"
            ></div>
        </div>
    </div>
</template>
