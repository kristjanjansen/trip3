<script setup lang="ts">
import { defineProps } from "vue";
import { useTimeAgo } from "@vueuse/core";
import type { Content } from "../types";
const props = defineProps<{ content: Content }>();
const ago = useTimeAgo(props.content.created_at || new Date());
</script>

<template>
    <div class="grid grid-cols-[auto,1fr] gap-4">
        <!-- {{ content }} -->
        <div
            class="overflow-hidden text-gray-200 transform -translate-y-1 rounded-full  w-14 h-14"
        >
            <icon-user />
        </div>
        <InertiaLink
            :href="route('forum.show', content.id)"
            class="grid gap-4 auto-rows-min"
        >
            <h3 class="text-xl font-bold text-gray-700">{{ content.title }}</h3>
            <div
                class="flex flex-col space-y-3  md:space-x-3 md:space-y-0 md:items-center md:flex-row"
            >
                <div class="text-base text-gray-500">{{ __("Postitas") }}</div>
                <div class="text-base font-medium text-cyan-500">
                    {{ content.user?.first_name }}
                </div>
                <div class="text-base text-gray-500">
                    {{ ago }}
                </div>
                <div class="text-base text-gray-500">
                    {{ content.comments?.length || 0 }} kommentaari
                </div>
            </div>
        </InertiaLink>
    </div>
</template>
