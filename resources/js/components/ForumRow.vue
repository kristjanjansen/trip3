<script setup lang="ts">
import { defineProps } from "vue";
import { useTimeAgo } from "@vueuse/core";
const props = defineProps<{ content: Content }>();
const ago = useTimeAgo(props.content.created_at);
</script>

<template>
    <div class="flex items-center gap-6">
        <!-- {{ content }} -->
        <div
            class="text-gray-200 transform -translate-y-0.5 w-14 h-14 rounded-full overflow-hidden"
        >
            <icon-user />
        </div>
        <div class="grid gap-3">
            <inertia-link
                :href="route('forum.show', content.id)"
                class="text-xl font-bold text-gray-700"
            >
                <h3>{{ content.title }}</h3>
            </inertia-link>
            <div class="flex items-center h-6 gap-3">
                <Tag v-for="(tag, i) in content.tags" :key="i">{{ tag }}</Tag>
                <div class="text-base text-gray-500">
                    {{ __("Postitas") }}
                    <span class="font-medium text-cyan-500">
                        {{ content.user?.name }}
                    </span>
                    {{ ago }}
                </div>
                <div class="text-base text-gray-500">
                    {{ content.comments?.length || 0 }} kommentaari
                </div>
            </div>
        </div>
    </div>
</template>
