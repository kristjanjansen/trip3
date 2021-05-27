<script setup lang="ts">
import { defineEmit, defineProps, ref } from "vue";
import type { Content } from "../types";
import { useElementVisibility, debouncedWatch } from "@vueuse/core";

const props = defineProps<{ contents: Content[]; index: any }>();

const indexRef = ref(null);
const indexVisible = useElementVisibility(indexRef);

const emit =
    defineEmit<(e: "indexVisible", index: number | null) => number | null>();

debouncedWatch(
    indexVisible,
    () => {
        emit("indexVisible", indexVisible.value ? parseInt(props.index) : null);
    },
    { debounce: 500 }
);
</script>

<template>
    <div v-for="content in contents" :key="content.id" class="space-y-4">
        <!-- <Image
                    :filename="content?.images?.[0].filename || ''"
                    width="md"
                    :alt="content.title || ''"
                /> -->
        <div class="text-5xl">{{ content.id }}</div>
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
    </div>
    <div ref="indexRef" class="bg-orange-500 p-6">{{ index }}</div>
</template>
