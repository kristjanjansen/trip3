<script setup lang="ts">
import { computed, defineProps } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

const props = defineProps<{ filename: string; title?: string }>();
const page =
    usePage<{
        site: any;
    }>().props.value;

const sizes = [420, 640, 768, 1204 /*1280, 1536*/];
const url = "https://ik.imagekit.io/6b5jx0ktwr/s3/";
const image = computed(() => {
    return {
        src: `${page.site.image_cdn}${props.filename}?tr=w-${sizes[3]}`,
        sizes: `(max-width: ${sizes[3]}px) 100vw, ${sizes[3]}px`,
        srcset: sizes
            .map((s) => `${url}${props.filename}?tr=w-${s} ${s}w`)
            .join(","),
    };
});
</script>

<template>
    <img
        :src="image.src"
        :sizes="image.sizes"
        :srcset="image.srcset"
        :alt="title || ''"
        loading="lazy"
    />
</template>
