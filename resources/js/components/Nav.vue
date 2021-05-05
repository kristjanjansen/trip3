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
            <icon-search class="w-4 h-4 text-gray-500" />
            <inertia-link
                v-for="link in [
                    'Lennupakkumised',
                    'Reisikaaslased',
                    'Foorum',
                    'Uudised',
                    'Minu Trip.ee',
                ]"
                :key="link"
                href="/"
                class="font-medium text-gray-500 text-md"
            >
                {{ link }}
            </inertia-link>
        </div>
        <icon-menu class="h-5 block lg:hidden text-gray-500" />
    </div>
</template>
