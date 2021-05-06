<script setup lang="ts">
import { usePage } from "@inertiajs/inertia-vue3";
import type { Shared } from "../types";

const { shared } = usePage<{ shared: Shared }>().props.value;
</script>
<template>
    <div class="pt-12 pb-24 pl-6 pr-6 bg-gray-100">
        <div
            class="container grid justify-center gap-4 text-center lg:mx-auto grid-cols-0 md:grid-cols-4 md:justify-start md:text-left"
        >
            <inertia-link :href="route(shared.links.index.route)">
                <div class="h-6 text-gray-600"><logo-plain class="h-6" /></div>
                <div class="hidden h-8" />
            </inertia-link>
            <div class="grid gap-6 auto-rows-max">
                <inertia-link
                    v-for="(link, i) in shared.links.footerFirst"
                    :key="i"
                    :href="route(link.route)"
                    class="text-base font-medium text-gray-600"
                >
                    {{ __(link.title) }}
                </inertia-link>
            </div>
            <div class="grid gap-6 auto-rows-max">
                <inertia-link
                    v-for="(link, i) in shared.links.footerSecond"
                    :key="i"
                    :href="route(link.route)"
                    class="text-base font-medium text-gray-600"
                >
                    {{ __(link.title) }}
                </inertia-link>
            </div>
            <div class="grid gap-6 auto-rows-max">
                <inertia-link
                    v-for="(link, i) in shared.links.footerThird"
                    :key="i"
                    :href="route(link.route)"
                    class="text-base font-medium text-gray-600"
                >
                    {{ __(link.title) }}
                </inertia-link>
            </div>
        </div>
        <div class="h-16" />
        <div
            class="flex flex-col items-center justify-center gap-6 md:flex-row"
        >
            <inertia-link
                v-for="(link, i) in shared.links.footerSocial"
                :key="i"
                :href="route(link.route)"
                class="flex items-center gap-2 text-sm text-gray-600"
            >
                <icon-rss class="hidden w-4 h-4 text-gray-600 md:block" />
                <div class="text-base font-medium">{{ __(link.title) }}</div>
            </inertia-link>
        </div>
        <div class="h-12" />
        <div class="text-base text-center text-gray-400">
            {{ __("Copyright") }} © {{ shared.links.index.title }} 1998-{{
                new Date().getFullYear()
            }}
        </div>
    </div>
</template>
