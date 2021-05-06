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
            <inertia-link href="">
                <logo-plain class="h-[25px] text-gray-600" />
                <div class="hidden h-8" />
            </inertia-link>
            <div class="grid gap-6 auto-rows-max">
                <inertia-link
                    v-for="link in shared.links.footerFirst"
                    :key="link"
                    href=""
                    class="text-base font-medium text-gray-600"
                >
                    {{ link }}
                </inertia-link>
            </div>
            <div class="grid gap-6 auto-rows-max">
                <inertia-link
                    v-for="link in shared.links.footerSecond"
                    :key="link"
                    href=""
                    class="text-base font-medium text-gray-600"
                >
                    {{ link }}
                </inertia-link>
            </div>
            <div class="grid gap-6 auto-rows-max">
                <inertia-link
                    v-for="link in shared.links.footerThird"
                    :key="link"
                    href=""
                    class="text-base font-medium text-gray-600"
                >
                    {{ link }}
                </inertia-link>
            </div>
        </div>
        <div class="h-16" />
        <div
            class="flex flex-col items-center justify-center gap-6 md:flex-row"
        >
            <inertia-link
                v-for="link in shared.links.footerSocial"
                :key="link"
                href=""
                class="flex items-center gap-2 text-sm text-gray-600"
            >
                <icon-rss class="hidden w-4 h-4 text-gray-600 md:block" />
                <div class="text-base font-medium">{{ link }}</div>
            </inertia-link>
        </div>
        <div class="h-12" />
        <div class="text-base text-center text-gray-400">
            Autoriõigused © Trip.ee 1998-2021
        </div>
    </div>
</template>
