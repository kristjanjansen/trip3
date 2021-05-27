<script setup lang="ts">
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-vue3";
import { debouncedWatch } from "@vueuse/core";
import route from "ziggy-js";
import type { Content } from "../types";

const page =
    usePage<{
        contents: {
            data: Content[];
            prev_page_url: string | null;
            next_page_url: string | null;
        };
    }>();

// Search

const q = ref("");

debouncedWatch(
    q,
    () =>
        Inertia.get(
            "",
            { q: q.value },
            {
                only: ["contents"],
                preserveScroll: true,
                preserveState: true,
            }
        ),
    {
        debounce: 500,
    }
);
</script>

<template>
    <div>
        <ForumHeader />
        <div class="p-6 pt-12 lg:container lg:mx-auto bg-gray-50">
            <div class="max-w-screen-lg mx-auto space-y-8">
                <FormTextfield
                    name="q"
                    v-model="q"
                    :placeholder="__('Search the forums')"
                    autofocus
                />
                <div class="h-2" />
                <TransitionGroupFade>
                    <ForumRow
                        v-for="(content, i) in page.props.value.contents.data"
                        :key="content.id"
                        :content="content"
                    />
                </TransitionGroupFade>
            </div>
            <div class="h-12" />
            <div class="flex justify-center gap-4">
                <ButtonLink
                    v-if="page.props.value.contents.prev_page_url"
                    :href="page.props.value.contents.prev_page_url"
                    preserve-state
                >
                    Prev
                </ButtonLink>
                <ButtonLink
                    v-if="page.props.value.contents.next_page_url"
                    :href="page.props.value.contents.next_page_url"
                    preserve-state
                >
                    Next
                </ButtonLink>
            </div>
        </div>
        <Footer />
    </div>
</template>
