<script setup lang="ts">
import { usePage } from "@inertiajs/inertia-vue3";

const page = usePage<{ site: any }>().props.value;
</script>

<template>
    <div class="relative p-6 pb-0 overflow-hidden bg-gray-100 lg:px-0 lg:pt-10">
        <div class="container inset-0 grid gap-6 lg:mx-auto">
            <Nav />
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
            <div class="flex overflow-x-scroll lg:overscroll-auto">
                <InertiaLink
                    v-for="(link, i) in page.site.links.footerSecond"
                    :key="link"
                    class="
                        px-5
                        py-3
                        font-bold
                        text-gray-500
                        whitespace-nowrap
                        text-md
                    "
                    :class="{
                        'bg-white text-gray-800':
                            route().current() === link.route,
                    }"
                    :href="route(link.route)"
                >
                    {{ __(link.title) }}
                </InertiaLink>
            </div>
        </div>
    </div>
</template>
