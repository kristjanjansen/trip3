<script setup lang="ts">
import { defineProps, ref } from "vue";
import type { Comment } from "../types";
import { useFormatAgo } from "../utils";

const props = defineProps<{ comment: Comment }>();

const editing = ref(false);
const ago = useFormatAgo(props.comment.created_at);
</script>

<template>
    <div>
        <div
            v-if="!editing"
            class="grid gap-4 p-6 border-2 border-gray-200 rounded-sm"
        >
            <div
                class="
                    flex flex-col
                    items-start
                    gap-3
                    md:items-center
                    md:flex-row
                "
            >
                <IconUser class="w-8 h-8 text-gray-200" />
                <InertiaLink href="" class="text-sm font-medium text-cyan-500">
                    {{ comment.user?.name }}
                </InertiaLink>
                <div class="text-sm font-medium text-gray-300">
                    {{ ago }}
                </div>
                <div class="text-sm font-medium text-gray-300">
                    {{ formatDate(comment?.created_at) }}
                </div>
                <button
                    class="text-sm font-medium text-green-500"
                    @click="editing = true"
                >
                    {{ __("Edit") }}
                </button>
            </div>
            <div
                class="prose prose-blue max-w-none"
                v-html="formatContent(comment.body)"
            ></div>
        </div>
        <CommentEditForm
            v-if="editing"
            :comment="comment"
            @updated="editing = !editing"
        />
    </div>
</template>
