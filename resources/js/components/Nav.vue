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
    <div class="flex justify-between relative">
        <inertia-link
            href="/"
            class="absolute w-[200px] h-[100px] transform translate-x-[-56px] translate-y-[-34px]"
        >
            <logo />
            <h1 class="sr-only">Trip.ee</h1>
        </inertia-link>
        <div />
        <div class="hidden lg:flex flex-wrap gap-4 items-center">
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
            class="w-6 h-6 block lg:hidden text-gray-500"
        />
        <teleport to="body">
            <div
                v-if="showMenu"
                class="bg-green-500 text-white p-6 fixed inset-0"
            >
                <div class="flex justify-between items-center">
                    <icon-search class="w-6 h-6" />
                    <icon-close @click="showMenu = false" class="w-6 h-6" />
                </div>
                <div class="h-16" />
                <div class="grid gap-8 justify-center text-center">
                    <inertia-link
                        v-for="link in ['Trip.ee', ...links]"
                        :key="link"
                        href="/"
                        class="font-medium text-xl"
                    >
                        {{ link }}
                    </inertia-link>
                </div>
            </div>
        </teleport>
    </div>
</template>
