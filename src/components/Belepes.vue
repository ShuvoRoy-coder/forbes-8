<script setup>
    import { defineProps } from 'vue';


    const props = defineProps({
        buttonText: String,
        name: String,
        url: String,
    });
    
</script>

<template>
    <router-link :to="{name: props.name, params: {url: props.url }}"
            class="relative inline-block
            text-black text-[14px] lg:text-[18px] font-bold leading-normal text-center rounded-[7px] px-[30px] w-full py-[14px] group
            bg-[#5BE15F] transition-colors duration-[.4s] hover:bg-black hover:text-[#5BE15F]"
        >
            <span class="relative z-10">{{ buttonText }}</span>
    </router-link>
</template>