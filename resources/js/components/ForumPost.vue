<script setup lang="ts">
import { defineProps } from "vue";
defineProps<{ content: Content }>();
</script>

<template>
    <ForumLayout>
        <template #left>
            <icon-user class="text-gray-200 w-14 h-14" />
            <div class="h-8" />
        </template>
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
    </ForumLayout>
</template>
