<script setup lang="ts">
import { defineProps } from "vue";
import type { Comment } from "../types";
defineProps<{ comment: Comment }>();
</script>

<template>
    <div class="grid gap-4 p-6 border-2 border-gray-200 rounded-sm">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <icon-user class="w-8 h-8 text-gray-200" />
                <InertiaLink href="" class="text-sm font-medium text-cyan-500">
                    {{ comment.user.name }}
                </InertiaLink>
                <div class="text-sm font-medium text-gray-300">
                    {{ comment.date }}
                </div>
            </div>
            <div class="flex items-center gap-3">
                <icon-thumbsup class="w-5 h-5 text-green-500" />
                <icon-thumbsdown class="w-5 h-5 text-red-500" />
            </div>
        </div>
        <div class="prose prose-blue max-w-none" v-html="comment.body"></div>
    </div>
</template>
