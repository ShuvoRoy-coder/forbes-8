<script setup>

import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/bundle';
import 'swiper/css/free-mode';
import {Navigation } from 'swiper/modules';
import { useFilteredItemsStore } from './stores/filteredItemsStore';
import { useHelpers } from '../composables/useHelpers';
import { RouterLink, useRoute } from 'vue-router';
import { onMounted, watch, ref } from 'vue';

const props = defineProps({
    initialSlide: {
        default: 0,
        type: [String, Number]
    },
    slideTo: {
        default: null,
        type: [Number]
    }
})

const route = useRoute();

let slider = null;
const tagChanging = ref(false);
let tagChangingTimeOut = null

const { url } = useHelpers();
const filteredItemsStore = useFilteredItemsStore();

const emits = defineEmits([
    'slideChange'
]);


const onSlideChange = () => {
    if(!tagChanging.value) {
        emits('slideChange');
    }
}

onMounted(() => {
    watch(() => props.slideTo, () => {
        if(props.slideTo !== null && slider) {

            clearTimeout(tagChangingTimeOut);
            tagChanging.value = true;

            slider.slideToLoop(props.slideTo)

            tagChangingTimeOut =  setTimeout(() => {
                tagChanging.value = false;
            }, 400)
        }
    })
})

</script>

<template>

    <!-- swiper area start -->

    <swiper

        :modules="[Navigation]"
        :initialSlide="initialSlide"
        :navigation="true"
        :loop="true"
        :grabCursor="true"
        @slideChange="onSlideChange"
        @swiper="(event) => {slider = event}"

        :breakpoints="{
            '768': {
            slidesPerView: 3,
            spaceBetween: 1,
            },
            '1024': {
            slidesPerView: 4,
            spaceBetween: 1,
            },
            '1280': {
            slidesPerView: 5,
            spaceBetween: 1,
            },
        }"
    >
        <swiper-slide
            v-for="(item, index) in filteredItemsStore.users"
            :key="`slide_${item.id}`"
            :id="`slide_${item.id}`"
            class="transition-all duration-500 pt-5 cursor-pointer group hover:-translate-y-5 space-y-2"
        >   

            <RouterLink 
                :to="{ name: 'subpage', params: { url:item.url }}"
                class="h-[154px] relative block w-[154px] mx-auto transition-all duration-500">
                
                <span class="inline-block absolute top-[21px] -translate-x-1/2 w-[48px]  text-white font-bold text-[11px] px-[10px] py-[5px]"
                    :class="{'bg-[#5BE060]': route.params.url == item.url}, {'bg-[#C7B276]': route.params.url != item.url}"
                >
                    {{ item.serial }}
                </span>

                <img :src="url(`/person-images/${item.image}`)" alt="person-image" class="h-full w-full object-cover object-top">
                
            </RouterLink>

            <h1 class="group-hover:text-[#5BE060] font-courier font-bold transition-all duration-500 group-hover:opacity-100 group-hover:visible opacity-0 invisible text-transparent text-[16px] text-center">
                {{ item.name }}
            </h1>
        </swiper-slide>

        <!-- swiper area end -->

    </swiper>
    
</template>

<style>

.swiper {
    position: static!important;
    width: 98%;
}

.swiper-button-prev, .swiper-button-next {
    position: absolute;
    z-index: 10;
    cursor: pointer;
}


.swiper-button-prev::after{
    content: "";
    display: inline-block;
    width: 100%;
    height: 100%;
    background-image: url('./slider-icon/sliderIconLeft.svg');
    background-repeat: no-repeat;
}

.swiper-button-next::after{
    content: "";
    display: inline-block;
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-image: url('./slider-icon/sliderIconRight.svg');
}

.swiper-button-next {
    right: -25px;

}
.swiper-button-prev {
    left: -15px;
}




</style>
