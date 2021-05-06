<script setup lang="ts">
import { usePage } from "@inertiajs/inertia-vue3";
import type { Content } from "../types";

const { contents } = usePage<{ contents: Content[] }>().props.value;
</script>

<template>
    <div>
        <ForumHeader />
        <div class="p-6 pt-12 lg:container lg:mx-auto bg-gray-50">
            <div class="h-12" />
            <div class="flex flex-col gap-8">
                <ForumRow
                    v-for="(content, i) in contents"
                    :key="i"
                    :content="content"
                />
            </div>
            <div class="h-12" />
        </div>
        <Footer />
    </div>
</template>
