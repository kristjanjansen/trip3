<script setup lang="ts">
import { computed, defineProps } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { breakpointsAntDesign } from "@vueuse/core";
import { sliceByKey } from "../utils";

const props =
    defineProps<{
        filename: string;
        title?: string;
        narrow?: boolean;
        width?: number; // "sm" | "md" | "lg" | "xl" | "2xl"
        /** Image height. Between 0 and 1 it means percentage, over 1 it's pixels */
        height?: number;
    }>();
const page =
    usePage<{
        site: any;
    }>().props.value;

const breakpoints = [640, 768, 1204, 1280, 1536];
const breakpoints2 = { sm: 640, md: 768, lg: 1204, xl: 1280, "2xl": 1536 };

const a = sliceByKey(breakpoints2, "a");
console.log(a);

const sizes = props.narrow ? breakpoints.slice(0, 2) : breakpoints;
const image = computed(() => {
    const width = props.width ? props.width : sizes.slice(-1)[0];
    const heightTransform = props.height ? `,h-${props.height}` : "";
    const height = props.height ? width * props.height : ""; // @todo support pixels
    return {
        src: `${page.site.image_cdn}/${props.filename}?tr=w-${width}${heightTransform}`,
        sizes: `(max-width: ${width}px) 100vw, ${width}px`,
        srcset: sizes
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
        :alt="title || ''"
        :width="image.width"
        :height="image.height"
        loading="lazy"
        decoding="async"
    />
</template>
