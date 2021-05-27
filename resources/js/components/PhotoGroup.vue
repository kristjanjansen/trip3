<script setup lang="ts">
import { defineEmit, defineProps, ref } from "vue";
import type { Content } from "../types";
import { useElementVisibility, debouncedWatch } from "@vueuse/core";

const props = defineProps<{ contents: Content[]; index: number }>();

const topRef = ref(null);
const bottomRef = ref(null);

const topVisible = useElementVisibility(topRef);
const bottomVisible = useElementVisibility(bottomRef);

const emit =
    defineEmit<(e: "newIndex", index: number | null) => number | null>();

debouncedWatch(
    [topVisible, bottomVisible],
    () => {
        if (topVisible.value) {
            emit("newIndex", props.index);
        }
        if (bottomVisible.value) {
            emit("newIndex", props.index + 1);
        }
    },
    { debounce: 100, immediate: true }
);
</script>

<template>
    <div v-for="(content, i) in contents" :key="content.id" class="space-y-4">
        <div v-if="i === 2" ref="topRef"></div>
        <Image
            :filename="content?.images?.[0].filename || ''"
            width="md"
            :alt="content.title || ''"
        />
        <figcaption class="px-4 md:px-0 text-base text-gray-600 mb-5">
            {{ content.title }}
        </figcaption>
        <div class="px-4 md:px-0 flex space-x-3 items-center">
            <IconUser class="w-8 h-8 text-gray-200" />
            <InertiaLink
                ref="indexRef"
                href=""
                class="text-sm font-medium text-cyan-500"
            >
                {{ content.user?.name }}
            </InertiaLink>
        </div>
        <div v-if="i === contents.length - 3" ref="bottomRef"></div>
    </div>
</template>
