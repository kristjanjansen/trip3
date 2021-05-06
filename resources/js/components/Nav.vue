<script setup lang="ts">
import { ref } from "vue";
const showMenu = ref(false);
const links = [
    "Lennupakkumised",
    "Reisikaaslased",
    "Foorum",
    "Uudised",
    "Registreeru",
    "Logi sisse",
];
</script>

<template>
    <div class="relative flex justify-between">
        <inertia-link
            href="/"
            class="absolute w-[200px] h-[100px] transform translate-x-[-56px] translate-y-[-34px]"
        >
            <logo />
            <h1 class="sr-only">Trip.ee</h1>
        </inertia-link>
        <div />
        <div class="flex-wrap items-center hidden gap-4 lg:flex">
            <icon-search class="w-5 h-5 text-gray-500" />
            <inertia-link
                v-for="link in links"
                :key="link"
                href="/"
                class="font-medium text-gray-500 text-md"
            >
                {{ link }}
            </inertia-link>
        </div>
        <icon-menu
            @click="showMenu = true"
            class="block w-6 h-6 text-gray-500 lg:hidden"
        />
        <teleport to="body">
            <div
                v-if="showMenu"
                class="fixed inset-0 p-6 text-white bg-green-500"
            >
                <div class="flex items-center justify-between">
                    <icon-search class="w-6 h-6" />
                    <icon-close @click="showMenu = false" class="w-6 h-6" />
                </div>
                <div class="h-16" />
                <div class="grid justify-center gap-8 text-center">
                    <inertia-link
                        v-for="link in ['Trip.ee', ...links]"
                        :key="link"
                        href="/"
                        class="text-xl font-medium"
                    >
                        {{ link }}
                    </inertia-link>
                </div>
            </div>
        </teleport>
    </div>
</template>
