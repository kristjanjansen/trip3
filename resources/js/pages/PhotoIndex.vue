<script setup lang="ts">
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-vue3";
import { useWindowScroll } from "@vueuse/core";
import { uniqueCollection } from "../utils";
import type { Content } from "../types";

const page =
    usePage<{
        contents: {
            data: Content[];
            current_page: number;
            prev_page_url: string | null;
            next_page_url: string | null;
        };
    }>();

const { y } = useWindowScroll();
const contents = ref(page.props.value.contents.data);
const contentPages = ref({
    [page.props.value.contents.current_page]: page.props.value.contents.data,
});

// watch(
//     contentPages,
//     () => {
//         console.log(contentPages.value);
//     },
//     { immediate: true }
// );

watch(y, () => {
    let url = "";
    if (window.innerHeight + y.value >= document.body.scrollHeight) {
        if (page.props.value.contents.next_page_url) {
            Inertia.get(
                page.props.value.contents.next_page_url,
                {},
                {
                    preserveScroll: true,
                    preserveState: true,
                    only: ["contents"],
                }
            );
            contentPages.value[page.props.value.contents.current_page] =
                page.props.value.contents.data;
            // contents.value = uniqueCollection(
            //     [...contents.value, ...page.props.value.contents.data],
            //     "id"
            // ) as Content[];
        }
    }
});

const index = ref(0);

const onVisible = (i: number | null) => (index.value = i ?? index.value);
</script>

<template>
    <div class="max-w-screen-xl mx-auto">
        <Nav />
        <div class="h-12" />
        <div class="space-y-16 max-w-screen-md mx-auto">
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
            <div class="fixed top-0 left-0">{{ index }}</div>
            <div
                v-for="(contents, index) in contentPages"
                :key="index"
                class="border border-red-500"
            >
                <PhotoGroup
                    :contents="contents"
                    :index="index"
                    @indexVisible="onVisible"
                />
            </div>
        </div>
    </div>
</template>
