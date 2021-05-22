<script setup lang="ts">
import { usePage } from "@inertiajs/inertia-vue3";
import type { Shared } from "../types";

const { shared } = usePage<{ shared: Shared }>().props.value;
</script>
<template>
    <div class="pt-12 pb-24 pl-6 pr-6 bg-gray-100">
        <div
            class="
                container
                grid
                justify-center
                gap-4
                text-center
                lg:mx-auto
                grid-cols-0
                md:grid-cols-4
                md:justify-start
                md:text-left
            "
        >
            <InertiaLink
                :href="route(shared.links.index.route)"
                class="flex justify-center md:justify-start"
            >
                <logo-plain class="h-6 text-gray-600" />
            </InertiaLink>
            <div class="grid gap-6 auto-rows-max">
                <InertiaLink
                    v-for="link in shared.links.footerFirst"
                    :key="link"
                    :href="route(link.route)"
                    class="text-base font-medium text-gray-600"
                >
                    {{ __(link.title) }}
                </InertiaLink>
            </div>
            <div class="grid gap-6 auto-rows-max">
                <InertiaLink
                    v-for="link in shared.links.footerSecond"
                    :key="link"
                    :href="route(link.route)"
                    class="text-base font-medium text-gray-600"
                >
                    {{ __(link.title) }}
                </InertiaLink>
            </div>
            <div class="grid gap-6 auto-rows-max">
                <InertiaLink
                    v-for="link in shared.links.footerThird"
                    :key="link"
                    :href="route(link.route)"
                    class="text-base font-medium text-gray-600"
                >
                    {{ __(link.title) }}
                </InertiaLink>
            </div>
        </div>
        <div class="h-16" />
        <div
            class="flex flex-col items-center justify-center gap-6 md:flex-row"
        >
            <InertiaLink
                v-for="link in shared.links.footerSocial"
                :link="link"
                :href="route(link.route)"
                class="flex items-center gap-2 text-sm text-gray-600"
            >
                <IconRss class="hidden w-4 h-4 text-gray-600 md:block" />
                <div class="text-base font-medium">{{ __(link.title) }}</div>
            </InertiaLink>
        </div>
        <div class="h-12" />
        <div class="text-base text-center text-gray-400">
            {{ __("Copyright") }} © {{ shared.links.index.title }} 1998-{{
                new Date().getFullYear()
            }}
        </div>
    </div>
</template>
