<script setup lang="ts">
import { usePage } from "@inertiajs/inertia-vue3";

const page = usePage<{ site: any }>().props.value;
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
                :href="route('homepage.index')"
                class="flex justify-center md:justify-start"
            >
                <logo-plain class="h-6 text-gray-600" />
            </InertiaLink>
            <div class="grid gap-6 auto-rows-max">
                <InertiaLink
                    v-for="link in page.site.links.footerFirst"
                    :key="link"
                    :href="link.route ? route(link.route) : ''"
                    class="text-base font-medium text-gray-200"
                    :class="{
                        'text-gray-600 hover:text-gray-700': link.route,
                    }"
                >
                    {{ __(link.title) }}
                </InertiaLink>
            </div>
            <div class="grid gap-6 auto-rows-max">
                <InertiaLink
                    v-for="link in page.site.links.footerSecond"
                    :key="link"
                    :href="link.route ? route(link.route) : ''"
                    class="text-base font-medium text-gray-200"
                    :class="{
                        'text-gray-600 hover:text-gray-700': link.route,
                    }"
                >
                    {{ __(link.title) }}
                </InertiaLink>
            </div>
            <div class="grid gap-6 auto-rows-max">
                <InertiaLink
                    v-for="link in page.site.links.footerThird"
                    :key="link"
                    :href="link.route ? route(link.route) : ''"
                    class="text-base font-medium text-gray-200"
                    :class="{
                        'text-gray-600 hover:text-gray-700': link.route,
                    }"
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
                v-for="link in page.site.links.footerSocial"
                :key="link"
                :href="link.route ? route(link.route) : ''"
                class="flex items-center gap-2 text-gray-200"
                :class="{
                    'text-gray-600 hover:text-gray-700': link.route,
                }"
            >
                <IconRss class="hidden w-4 h-4 md:block" />
                <div class="text-base font-medium">{{ __(link.title) }}</div>
            </InertiaLink>
        </div>
        <div class="h-12" />
        <div class="text-base text-center text-gray-400">
            {{ __("Copyright") }} © {{ page.site.name }} 1998-{{
                new Date().getFullYear()
            }}
        </div>
    </div>
</template>
