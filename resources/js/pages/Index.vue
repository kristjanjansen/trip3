<template>
    <div>
        <!-- <img
            class="w-full max-h-96 object-cover object-center"
            src="https://trip.ee/photos/header3.jpg"
        /> -->
        <div class="lg:container lg:mx-auto space-y-4 p-4">
            <Logo class="w-[200px]" />

            <div class="grid gap-4">
                <BlockTitle>Tripikad räägivad</BlockTitle>
                <ForumRow />
            </div>

            <div class="h-16" />

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <FlightCard v-for="i in 4" :key="i" />
            </div>
        </div>
    </div>
</template>
