<script setup lang="ts">
import { defineProps } from "vue";
import type { Comment } from "../types";
defineProps<{ comments: Comment[] }>();
</script>

<template>
    <div class="grid grid-cols-1 md:grid-cols-[auto,1fr] gap-5">
        <div class="w-0 md:w-16" />
        <div class="grid gap-4">
            <Comment
                v-for="(comment, i) in comments"
                :key="i"
                :comment="comment"
            />
        </div>
    </div>
</template>
