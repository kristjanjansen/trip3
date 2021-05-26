<script setup lang="ts">
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-vue3";
import type { Content } from "../types";

const page =
    usePage<{
        content: Content;
    }>().props.value;
</script>

<template>
    <div>
        <div class="max-w-screen-xl mx-auto">
            <Nav />
        </div>
        <div class="relative bg-orange-500 max-h-[500px] overflow-hidden">
            <Image
                :filename="page.content?.images?.[0].filename || ''"
                class="inset-0 object-fit"
            />
            <div class="absolute inset-0 bg-black opacity-30" />
            <div class="absolute inset-0">
                <div
                    class="
                        max-w-screen-md
                        mx-auto
                        flex
                        items-end
                        h-full
                        p-6
                        pb-12
                        lg:p-0
                        lg:pb-12
                    "
                >
                    <div class="space-y-12">
                        <h2
                            class="
                                text-white
                                font-medium
                                text-4xl
                                tracking-tight
                                max-w-[720px]
                            "
                        >
                            {{ page.content.title }}
                        </h2>
                        <div class="text-base text-white font-medium">
                            {{ formatDate(page.content.created_at) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-12" />
        <div class="max-w-screen-md mx-auto p-6 lg:p-0 lg:pb-6">
            <div
                class="prose lg:prose-lg max-w-none prose-blue"
                v-html="formatContent(page.content.body)"
            />
        </div>
        <div class="h-12" />
        <Footer />
    </div>
</template>
