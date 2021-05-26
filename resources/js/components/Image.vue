<script setup lang="ts">
import { computed, defineProps } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

const props =
    defineProps<{
        filename: string;
        title?: string;
        narrow?: boolean;
        /** Image height. Between 0 and 1 it means percentage, over 1 it's pixels */
        height?: number;
    }>();
const page =
    usePage<{
        site: any;
    }>().props.value;

const breakpoints = [640, 768, 1204, 1280, 1536];
const sizes = props.narrow ? breakpoints.slice(0, 2) : breakpoints;
const image = computed(() => {
    const maxSize = sizes.slice(-1);
    const height = props.height ? `,h-${props.height}` : "";

    return {
        src: `${page.site.image_cdn}/${props.filename}?tr=w-${maxSize}${height}`,
        sizes: `(max-width: ${maxSize}px) 100vw, ${maxSize}px`,
        srcset: sizes
            .map(
                (s) =>
                    `${page.site.image_cdn}/${props.filename}?tr=w-${s}${height} ${s}w`
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
