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
    <div class="max-w-screen-xl p-0 mx-auto md:p-6">
        <Nav />
        <div class="h-16" />
        <div class="space-y-12">
            <div
                v-for="content in contents"
                :key="content.id"
                class="space-y-2"
            >
                <Image
                    :filename="content?.images?.[0].filename || ''"
                    :narrow="true"
                />
                <figcaption class="px-4 md:px-0">
                    {{ content.title }}
                </figcaption>
            </div>
        </div>
    </div>
</template>
