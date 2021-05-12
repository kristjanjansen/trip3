<template>
    <transition-group
        appear
        enter-active-class="transition-opacity duration-1000"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="transition-opacity duration-1000"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
        move-class="transform-gpu"
    >
        <slot />
    </transition-group>
</template>
