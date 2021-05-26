<template>
    <transition-group
        appear
        enter-active-class="transition-opacity duration-200 transform-gpu"
        enter-from-class="opacity-0 translate-x-8"
        enter-to-class="opacity-100 translate-x-0"
        leave-active-class="transition-opacity duration-200"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
        move-class="transform-gpu"
    >
        <slot />
    </transition-group>
</template>
