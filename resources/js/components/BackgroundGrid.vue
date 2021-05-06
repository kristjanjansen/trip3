<script setup>
const smallStep = 8;
const largeStep = 32;
const backgroundImage = `url("data:image/svg+xml,${encodeURIComponent(
    `<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
    <pattern id="smallgrid" x="0" y="0" width="${smallStep}" height="${smallStep}" patternUnits="userSpaceOnUse">
      <line x1="0" y1="0" x2="${smallStep}" y2="0" stroke="#00000022" />
      <line x1="0" y1="0" x2="0" y2="${smallStep}" stroke="#00000022"/>
      </pattern>
    <pattern id="largegrid" x="0" y="0" width="${largeStep}" height="${largeStep}" patternUnits="userSpaceOnUse">
      <line x1="0" y1="0" x2="${largeStep}" y2="0" stroke="#00000033" />
      <line x1="0" y1="0" x2="0" y2="${largeStep}" stroke="#00000033" />
    </pattern>
    <rect x="0" y="0" width="100%" height="100%" fill="url(#smallgrid)"/>
    <rect x="0" y="0" width="100%" height="100%" fill="url(#largegrid)"/>
    </svg>`
)}")`;
</script>

<template>
    <div
        :style="{
            position: 'absolute',
            top: 0,
            right: 0,
            left: 0,
            pointerEvents: 'none',
            height: '10000px',
            mixBlendMode: 'multiply',
            opacity: 1,
            backgroundImage,
        }"
    ></div>
</template>
