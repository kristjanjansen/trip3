<script setup lang="ts">
import { defineProps } from "vue";
import type { Content } from "../types";
defineProps<{ content: Content }>();
</script>

<template>
    <div class="flex items-center gap-3">
        <a href="" class="text-gray-200 w-14 hover:text-gray-300">
            <icon-user />
        </a>
        <div class="grid gap-3">
            <a href="" class="text-xl font-medium hover:text-gray-800">
                <h3>{{ content.title }}</h3>
            </a>
            <div class="flex gap-2">
                <Tag v-for="(tag, i) in content.tags" :key="i">{{ tag }}</Tag>
            </div>
        </div>
    </div>
</template>
