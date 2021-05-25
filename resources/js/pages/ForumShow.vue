<script setup lang="ts">
import { usePage } from "@inertiajs/inertia-vue3";
import type { Content } from "../types";

const page = usePage<{ content: Content }>().props.value;
</script>

<template>
    <div>
        <ForumHeader />
        <div class="p-6 max-w-screen-lg mx-auto">
            <div class="h-12" />
            <ForumPost :content="page.content" />
            <div v-if="page.content.comments" class="h-12" />
            <ForumLayout>
                <div class="grid gap-4">
                    <Comment
                        v-for="(comment, i) in page.content.comments"
                        :key="comment.id || i"
                        :comment="comment"
                    />
                </div>
            </ForumLayout>
            <div class="h-12" />
            <ForumLayout>
                <CommentCreateForm :content="page.content" />
            </ForumLayout>
        </div>
        <Footer />
    </div>
</template>
