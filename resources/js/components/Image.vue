<script setup lang="ts">
import { computed, defineProps } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { breakpointsAntDesign } from "@vueuse/core";
import { sliceByKey } from "../utils";

const props =
    defineProps<{
        filename: string;
        alt?: string;
        /** Image width in pixels or as a maximum breakpoint name */
        width?: number | "sm" | "md" | "lg" | "xl" | "2xl";
        /** Image height. Between 0 and 1 it means percentage, over 1 it's pixels */
        height?: number;
    }>();
const page =
    usePage<{
        site: any;
    }>().props.value;

const breakpoints = { sm: 640, md: 768, lg: 1204, xl: 1280, "2xl": 1536 };

const sizes =
    typeof props.width === "string"
        ? sliceByKey(breakpoints, props.width)
        : breakpoints;

const widths = Object.values(sizes);

const image = computed(() => {
    const width =
        props.width && typeof props.width === "number"
            ? props.width
            : widths.slice(-1)[0];
    const heightTransform = props.height ? `,h-${props.height}` : "";
    const height = props.height
        ? props.height <= 1
            ? width * props.height
            : props.height
        : "";
    return {
        src: `${page.site.image_cdn}/${props.filename}?tr=w-${width}${heightTransform}`,
        sizes: `(max-width: ${width}px) 100vw, ${width}px`,
        srcset: widths
            .map(
                (s) =>
                    `${page.site.image_cdn}/${props.filename}?tr=w-${s}${heightTransform} ${s}w`
            )
            .join(","),
        width,
        height,
    };
});
</script>

<template>
    <img
        :src="image.src"
        :sizes="image.sizes"
        :srcset="image.srcset"
        :alt="alt || ''"
        :width="image.width"
        :height="image.height"
        loading="lazy"
        decoding="async"
    />
</template>
