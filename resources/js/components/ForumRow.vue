<script setup lang="ts">
import { defineProps } from "vue";
import type { Content } from "../types";
defineProps<{ content: Content }>();
</script>

<template>
    <div class="flex items-center gap-6">
        <div class="text-gray-200 transform -translate-y-0.5 w-14 h-14">
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
                    <span class="font-medium text-cyan-500">{{
                        content.user.name
                    }}</span>
                    1. mai 2021
                </div>
                <div class="text-base text-gray-500">23 kommentaari</div>
                <div class="text-base text-gray-500">23 lugemist</div>
            </div>
        </div>
    </div>
</template>
