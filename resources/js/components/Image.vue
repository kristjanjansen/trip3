<script setup lang="ts">
import { computed, defineProps } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

const props =
    defineProps<{ filename: string; title?: string; narrow?: boolean }>();
const page =
    usePage<{
        site: any;
    }>().props.value;

const breakpoints = [480, 640, 768, 1204, 1280, 1536];
const sizes = props.narrow ? breakpoints.slice(0, 4) : breakpoints;
const image = computed(() => {
    return {
        src: `${page.site.image_path_original}${
            props.filename
        }?tr=w-${sizes.slice(-1)}`,
        sizes: `(max-width: ${sizes.slice(-1)}px) 100vw, ${sizes.slice(-1)}px`,
        srcset: sizes
            .map(
                (s) =>
                    `${page.site.image_path_original}${props.filename}?tr=w-${s} ${s}w`
            )
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
        decoding="async"
    />
</template>
