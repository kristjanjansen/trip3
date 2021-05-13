<script setup lang="ts">
import { usePage } from "@inertiajs/inertia-vue3";
import type { Content } from "../types";

const page =
    usePage<{
        contents: {
            data: Content[];
            prev_page_url: string | null;
            next_page_url: string | null;
        };
    }>().props.value;
</script>

<template>
    <div>
        <ForumHeader />
        <div class="p-6 pt-12 lg:container lg:mx-auto bg-gray-50">
            <div class="h-12" />
            <div class="flex flex-col gap-8">
                <ForumRow
                    v-for="(content, i) in page.contents.data"
                    :key="i"
                    :content="content"
                />
            </div>
            <div class="h-12" />
            <div class="flex justify-center gap-4">
                <ButtonLink
                    v-if="page.contents.prev_page_url"
                    :href="page.contents.prev_page_url"
                >
                    Prev
                </ButtonLink>
                <ButtonLink
                    v-if="page.contents.next_page_url"
                    :href="page.contents.next_page_url"
                >
                    Next
                </ButtonLink>
            </div>
        </div>
        <Footer />
    </div>
</template>
