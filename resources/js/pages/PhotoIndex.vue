<script setup lang="ts">
import { computed, ref, watch } from "vue";
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

import { useWindowScroll } from "@vueuse/core";
const { y } = useWindowScroll();
const isSticky = computed(() => y.value >= 120);
</script>

<template>
    <div>
        <div class="max-w-screen-xl mx-auto">
            <Nav />
            <div class="h-12" />
        </div>
        <div>
            <div
                class="sticky top-0 bg-white flex justify-between items-center"
                :class="[isSticky ? 'shadow' : '']"
            >
                <Logo
                    class="w-[200px] h-[100px] opacity-0 transition"
                    :class="[isSticky ? 'opacity-100' : '']"
                />
                <InertiaLink :href="route('photo.index')">
                    <h1
                        class="
                            text-4xl
                            font-bold
                            tracking-tight
                            text-gray-700
                            lg:text-5xl
                            transition
                            transform
                            scale-100
                            text-center
                        "
                        :class="[isSticky ? 'scale-75' : '']"
                    >
                        {{ __("Photos") }}
                    </h1>
                </InertiaLink>
                <div
                    class="
                        w-[200px]
                        flex
                        justify-end
                        pr-6
                        opacity-0
                        transition
                        duration-100
                    "
                    :class="[isSticky ? 'opacity-100' : '']"
                >
                    <Button class="hidden md:block">{{
                        __("Add image")
                    }}</Button>
                    <Button class="block md:hidden">{{ __("Add") }}</Button>
                </div>
            </div>
            <div class="max-w-screen-md mx-auto">
                <div class="p-12 pt-0 flex justify-center">
                    <Button>{{ __("Add image") }}</Button>
                </div>
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
    </div>
</template>
