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
        </div>
        <div class="max-w-screen-lg mx-auto">
            <h1
                class="
                    text-4xl
                    font-bold
                    tracking-tight
                    text-gray-700
                    lg:text-5xl
                    px-6
                    md:px-0
                    py-12
                    text-left
                    md:text-center
                    break-words
                "
            >
                {{ __("Flight offers") }}
            </h1>
            <div
                class="
                    grid
                    lg:grid-cols-3
                    grid-cols-1
                    gap-0
                    md:gap-4
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
