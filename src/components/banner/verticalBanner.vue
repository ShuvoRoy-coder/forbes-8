<script setup>
import { useHelpers } from '@/composables/useHelpers';

const { url } = useHelpers();
</script>

<template>
    <a href="https://www.max.com/hu/hu/olympics" target="_blank" class="block w-[300px] h-[460px]">
        <img :src="url('/subpage-banner-lg/subpage-banner-lg.png')" alt="subpage-banner" class="w-full h-full object-cover">
    </a>
</template>