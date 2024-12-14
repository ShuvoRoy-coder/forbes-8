<script setup>
import { useHelpers } from '@/composables/useHelpers';

const { url } = useHelpers();
</script>

<template>

<a href="https://www.max.com/hu/hu/olympics" target="_blank" class="block w-[320px] h-[120px]">
    <img :src="url('/subpage-banner-sm/subpage-banner-sm.png')" alt="subpage-banner" class="w-full h-full object-cover">
</a>

</template>