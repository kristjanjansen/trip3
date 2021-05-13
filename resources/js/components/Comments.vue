<script setup lang="ts">
import { defineProps } from "vue";
import type { Comment } from "../types";

defineProps<{ comments: Comment[] }>();
</script>

<template>
    <ForumLayout>
        <div />
        <Comment
            v-for="(comment, i) in comments"
            :key="comment.id || i"
            :comment="comment"
        />
    </ForumLayout>
</template>
