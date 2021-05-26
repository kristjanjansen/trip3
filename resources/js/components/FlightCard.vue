<script setup lang="ts">
import { defineProps } from "vue";
import type { Content } from "../types";

const props = defineProps<{ content: Content }>();
</script>

<template>
    <InertiaLink
        class="relative group"
        :href="route('flight.show', content.id)"
    >
        <Image
            :filename="content?.images?.[0].filename || ''"
            :width="328"
            :height="250"
            :alt="content.title || ''"
        />
        <div
            class="absolute inset-0 bg-black opacity-40 group-hover:opacity-30"
        />
        <div
            class="
                absolute
                inset-0
                px-8
                py-4
                font-medium
                text-xl text-white
                flex
                items-center
                justify-center
                text-center
            "
        >
            {{ content.title }}
        </div>
    </InertiaLink>
</template>
