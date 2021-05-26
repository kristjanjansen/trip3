<script setup lang="ts">
import { usePage } from "@inertiajs/inertia-vue3";

const page = usePage<{ site: any }>().props.value;
</script>

<template>
    <header class="bg-gray-100 relative overflow-hidden">
        <Image
            filename="map.png"
            width="md"
            class="
                -my-[200px]
                max-w-none
                absolute
                inset-0
                opacity-5
                pointer-events-none
                mix-blend-multiply
            "
        />
        <div class="max-w-screen-xl mx-auto">
            <Nav />
        </div>
        <div class="max-w-screen-lg mx-auto p-6 pb-0">
            <div class="h-6" />
            <h1
                class="
                    text-4xl
                    font-bold
                    tracking-tight
                    text-gray-500
                    lg:text-5xl
                "
            >
                {{ __("Forum") }}
            </h1>
            <div class="h-6" />
            <div class="flex overflow-x-scroll lg:overscroll-auto">
                <InertiaLink
                    v-for="(link, i) in page.site.links.footerSecond"
                    :key="link"
                    class="
                        px-5
                        py-3
                        font-bold
                        text-gray-500
                        hover:text-gray-600
                        whitespace-nowrap
                        text-md
                    "
                    :class="{
                        'bg-white text-gray-800 hover:text-gray-900':
                            route().current() === link.route,
                    }"
                    :href="route(link.route)"
                >
                    {{ __(link.title) }}
                </InertiaLink>
            </div>
        </div>
    </header>
</template>
