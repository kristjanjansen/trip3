<script setup lang="ts">
import { usePage } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
// import type { Content } from "../types";

const { content } = usePage<{ content: Content }>().props.value;
const text = ref("bla");
</script>

<template>
    <div>
        <ForumHeader />
        <div class="p-6 pt-12 lg:container lg:mx-auto bg-gray-50">
            <div class="h-12" />
            <ForumPost :content="content" />
            <div class="h-12" />
            <Comments v-if="content.comments" :comments="content.comments" />
            <div class="h-12" />
            <CommentCreateForm />
        </div>
        <Footer />
    </div>
</template>
