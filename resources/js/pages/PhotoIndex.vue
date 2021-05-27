<script setup lang="ts">
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-vue3";
import type { Content } from "../types";

const page =
    usePage<{
        contents: {
            data: Content[];
            current_page: number;
            first_page_url: string | null;
            prev_page_url: string | null;
            next_page_url: string | null;
        };
    }>();

// Getting intial content: we chunk the Content[] into pages, indexed with a page number:

// contentPages.value = {
//    1: Content[],
//    ...
// }

const contentPages = ref({
    [page.props.value.contents.current_page]: page.props.value.contents.data,
});

// Watch when Inertia fetches data for a new content page and insert it to
// the contentPages

watch(
    () => page.props.value.contents,
    () => {
        if (page.props.value.contents) {
            contentPages.value[page.props.value.contents.current_page] =
                page.props.value.contents.data;
        }
    },
    { immediate: true }
);

// Ref to track the next / prev page index to load

const newIndex = ref(page.props.value.contents.current_page);

// Emit handler invoked by the PhotoGroup component,
// indicating the new page index to load

const onNewIndex = (i: number) => {
    newIndex.value = i;
};

// When new page index changes, fetch the new data

watch(
    () => newIndex.value,
    (newNewIndex, prevNewIndex) => {
        const url = pageUrl(newNewIndex, prevNewIndex);
        if (url) {
            Inertia.get(
                url,
                {},
                {
                    preserveScroll: true,
                    preserveState: true,
                    only: ["contents"],
                }
            );
        }
    }
);

// Handle edge case: we reload the page with the ?page= parameter
// is greater than 1

if (
    page.props.value.contents.current_page > 1 &&
    page.props.value.contents.first_page_url
) {
    Inertia.get(page.props.value.contents.first_page_url);
}

// Helper function to get the Inertia page url

const pageUrl = (newIndex: number, prevIndex: number | undefined) => {
    const isNext = newIndex > (prevIndex || 0);
    if (isNext && page.props.value.contents.next_page_url) {
        return page.props.value.contents.next_page_url;
    }
    if (!isNext && page.props.value.contents.prev_page_url) {
        return page.props.value.contents.prev_page_url;
    }
    return null;
};
</script>

<template>
    <div class="max-w-screen-xl mx-auto">
        <Nav />
        <div class="h-12" />
        <div class="max-w-screen-md mx-auto">
            <h1
                class="
                    text-4xl
                    font-bold
                    tracking-tight
                    text-gray-700
                    lg:text-5xl
                    text-left
                    md:text-center
                    px-4
                    md:px-0
                "
            >
                {{ __("Photos") }}
            </h1>
            <div class="h-12" />
            <div
                v-for="(contents, index) in contentPages"
                :key="index"
                class="space-y-12"
            >
                <PhotoGroup
                    :contents="contents"
                    :index="parseInt(String(index))"
                    @newIndex="onNewIndex"
                />
            </div>
        </div>
    </div>
</template>
