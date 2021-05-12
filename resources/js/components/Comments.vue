<script setup lang="ts">
import { defineProps } from "vue";
import type { Comment } from "../models/comment";

defineProps<{ comments: Comment[] }>();
</script>

<template>
    <div>
        <div />
        <TransitionGroupFade>
            <Comment
                v-for="(comment, i) in comments"
                :key="comment.id || i"
                :comment="comment"
            />
        </TransitionGroupFade>
    </div>
</template>
