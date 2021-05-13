<template>
    <div class="grid grid-cols-1 md:grid-cols-[auto,1fr] gap-x-8">
        <div class="w-14">
            <slot name="left" />
        </div>
        <slot />
    </div>
</template>
