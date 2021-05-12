<script setup lang="ts">
import { defineProps } from "vue";
import type { Comment } from "../models/comment";
defineProps<{ comment: Comment }>();
</script>

<template>
    <div class="grid gap-4 p-6 border-2 border-gray-200 rounded-sm">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <IconUser class="w-8 h-8 text-gray-200" />
                <InertiaLink href="" class="text-sm font-medium text-cyan-500">
                    {{ comment.user?.name }}
                </InertiaLink>
                <div class="text-sm font-medium text-gray-300">
                    {{ comment.created_at }}
                </div>
                <div class="text-sm font-medium text-green-500">
                    {{ __("Edit") }}
                </div>
            </div>
        </div>
        <div class="prose prose-blue max-w-none" v-html="comment.body"></div>
        <CommentEditForm :comment="comment" />
    </div>
</template>
