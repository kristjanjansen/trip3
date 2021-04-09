<template>
    <div>
        <img
            class="hover:lighter active:darker w-full max-h-96 object-cover object-center transition-all"
            src="https://trip.ee/photos/header3.jpg"
        />

        <div class="grid gap-12 p-6">
            <div class="h-24" />

            <IndexNews />

            <div class="grid gap-4">
                <BlockTitle>Tripikad räägivad</BlockTitle>
                <ForumRow />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <FlightCard v-for="i in 6" :key="i" />
            </div>
        </div>
    </div>
</template>
