<script setup lang="ts">
import { defineProps } from "vue";

defineProps<{ comments: Comment[] }>();
</script>

<template>
    <ForumLayout>
        <div class="grid gap-4">
            <Comment
                v-for="(comment, i) in comments"
                :key="i"
                :comment="comment"
            />
        </div>
    </ForumLayout>
</template>
