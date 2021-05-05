<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
const { config } = usePage().props.value;
</script>
<template>
    <div class="bg-gray-100 pt-12 pr-6 pb-24 pl-6">
        <div
            class="container lg:mx-auto grid grid-cols-0 md:grid-cols-4 justify-center md:justify-start text-center md:text-left gap-4"
        >
            <inertia-link href="">
                <logo-plain class="h-[25px] text-gray-600" />
                <div class="h-8 hidden" />
            </inertia-link>
            <div class="grid auto-rows-max gap-6">
                <inertia-link
                    v-for="link in config.links.footerFirst"
                    :key="link"
                    href=""
                    class="font-medium text-base text-gray-600"
                >
                    {{ link }}
                </inertia-link>
            </div>
            <div class="grid auto-rows-max gap-6">
                <inertia-link
                    v-for="link in config.links.footerSecond"
                    :key="link"
                    href=""
                    class="font-medium text-base text-gray-600"
                >
                    {{ link }}
                </inertia-link>
            </div>
            <div class="grid auto-rows-max gap-6">
                <inertia-link
                    v-for="link in config.links.footerThird"
                    :key="link"
                    href=""
                    class="font-medium text-base text-gray-600"
                >
                    {{ link }}
                </inertia-link>
            </div>
        </div>
        <div class="h-16" />
        <div
            class="flex flex-col md:flex-row gap-6 justify-center items-center"
        >
            <inertia-link
                v-for="link in config.links.footerSocial"
                :key="link"
                href=""
                class="flex items-center gap-2 text-sm text-gray-600"
            >
                <icon-rss class="hidden md:block w-4 h-4 text-gray-600" />
                <div class="text-base font-medium">{{ link }}</div>
            </inertia-link>
        </div>
        <div class="h-12" />
        <div class="text-base text-gray-400 text-center">
            Autoriõigused © Trip.ee 1998-2021
        </div>
    </div>
</template>
