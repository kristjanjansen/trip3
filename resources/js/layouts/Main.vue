<script setup lang="ts">
import { useMagicKeys, useStorage, whenever } from "@vueuse/core";

const keys = useMagicKeys();

const showGrid = useStorage("trip_grid", false);

whenever(keys.shift_g, () => {
    showGrid.value = !showGrid.value;
});
</script>

<template>
    <slot />
    <basegrid v-if="showGrid" />
</template>
