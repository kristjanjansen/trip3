<script setup lang="ts">
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
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
        <div class="max-w-screen-xl mx-auto">
            <Nav />
            <div class="h-16" />
            <div
                class="
                    max-w-screen-lg
                    mx-auto
                    grid grid-cols-3
                    gap-4
                    auto-rows-max
                "
            >
                <FlightCard
                    v-for="content in page.contents.data"
                    :key="content.id"
                    :content="content"
                />
            </div>
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
        <div class="h-12" />
        <Footer />
    </div>
</template>
