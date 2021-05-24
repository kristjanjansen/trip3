<script setup lang="ts">
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
        <Image
            v-for="content in page.contents.data"
            :filename="content?.images?.[0].filename"
        />
    </div>
</template>
