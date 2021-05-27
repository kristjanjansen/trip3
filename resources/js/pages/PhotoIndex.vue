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
            prev_page_url: string | null;
            next_page_url: string | null;
        };
    }>();

const { y } = useWindowScroll();
const contents = ref(page.props.value.contents.data);

watch(y, () => {
    let url = "";
    if (window.innerHeight + y.value >= document.body.scrollHeight) {
        console.log(page.props.value.contents.next_page_url);
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
            contents.value = uniqueCollection(
                [...contents.value, ...page.props.value.contents.data],
                "id"
            ) as Content[];
        }
    }
});
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
            <div class="fixed top-0">{{ y }}</div>
            <div
                v-for="content in contents"
                :key="content.id"
                class="space-y-4"
            >
                <!-- <Image
                    :filename="content?.images?.[0].filename || ''"
                    width="md"
                    :alt="content.title || ''"
                /> -->
                <div class="text-5xl">{{ content.id }}</div>
                <figcaption class="px-4 md:px-0 text-base text-gray-600 mb-5">
                    {{ content.title }}
                </figcaption>
                <div class="px-4 md:px-0 flex space-x-3 items-center">
                    <IconUser class="w-8 h-8 text-gray-200" />
                    <InertiaLink
                        href=""
                        class="text-sm font-medium text-cyan-500"
                    >
                        {{ content.user?.name }}
                    </InertiaLink>
                </div>
            </div>
        </div>
    </div>
</template>
