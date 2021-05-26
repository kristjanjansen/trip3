<script setup lang="ts">
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-vue3";
import type { Content } from "../types";
import { useWindowScroll } from "@vueuse/core";

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
            contents.value = [
                ...contents.value,
                ...page.props.value.contents.data,
            ];
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
            <div
                v-for="content in contents"
                :key="content.id"
                class="space-y-4"
            >
                <Image
                    :filename="content?.images?.[0].filename || ''"
                    width="md"
                    :alt="content.title || ''"
                />
                <figcaption class="px-4 md:px-0 text-base text-gray-600">
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
