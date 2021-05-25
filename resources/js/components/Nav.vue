<script setup lang="ts">
import { ref } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

const page = usePage<{ site: any }>().props.value;
const showMenu = ref(false);
</script>

<template>
    <div class="relative flex justify-between p-4" dusk="nav">
        <InertiaLink
            :href="route('homepage.index')"
            class="
                absolute
                w-[200px]
                h-[100px]
                transform
                translate-x-[-56px] translate-y-[-34px]
            "
        >
            <logo />
            <h1 class="sr-only">{{ page.site.name }}</h1>
        </InertiaLink>
        <div />
        <div class="items-center hidden space-x-4 lg:flex">
            <IconSearch class="w-5 h-5 text-gray-200" />
            <InertiaLink
                v-for="link in page.site.links.header"
                :key="link"
                :href="link.route ? route(link.route) : ''"
                class="font-medium text-gray-200 text-md"
                :class="{ 'text-gray-600 hover:text-gray-600': link.route }"
            >
                {{ link.title }}
            </InertiaLink>
        </div>
        <IconMenu
            @click="showMenu = true"
            class="block w-6 h-6 text-gray-500 lg:hidden"
        />
        <teleport to="body">
            <div
                v-if="showMenu"
                class="fixed inset-0 p-6 text-white bg-green-500"
            >
                <div class="flex items-center justify-between">
                    <IconSearch class="w-6 h-6" />
                    <icon-close @click="showMenu = false" class="w-6 h-6" />
                </div>
                <div class="h-16" />
                <div class="grid justify-center gap-8 text-center">
                    <InertiaLink
                        :href="route('homepage.index')"
                        class="text-xl font-medium"
                    >
                        {{ page.site.name }}
                    </InertiaLink>
                    <InertiaLink
                        v-for="link in page.site.links.header"
                        :key="link"
                        :href="link.route ? route(link.route) : ''"
                        class="text-xl font-medium text-green-400"
                        :class="{
                            'text-white hover:text-green-100': link.route,
                        }"
                    >
                        {{ __(link.title) }}
                    </InertiaLink>
                </div>
            </div>
        </teleport>
    </div>
</template>
