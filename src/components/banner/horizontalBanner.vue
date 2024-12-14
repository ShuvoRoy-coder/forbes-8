<script setup>
import { useHelpers } from '@/composables/useHelpers';

const { url } = useHelpers();

</script>

<template>
    <a href="https://www.max.com/hu/hu/olympics" target="_blank" class="block w-[970px] h-[200px] mx-auto">
        <img :src="url('/landing-banner-lg/landing-banner-lg.png')" alt="landing-banner" class="w-full h-full object-cover">
    </a>

</template>

<style scoped>

</style>