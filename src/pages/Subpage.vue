<script setup>
import { ref, onBeforeMount, onMounted, watch, provide } from 'vue';
import headerArea from '@/components/Header.vue';
import Slider from "@/components/Slider.vue";
import verticalBanner from "@/components/banner/verticalBanner.vue";
import subpageCenter from "@/components/SubpageCenter.vue";
import { useRoute } from 'vue-router';
import { useFilteredItemsStore } from '@/components/stores/filteredItemsStore';
import { useHelpers } from '@/composables/useHelpers';
import router from '@/router';
import listaPopUp from '@/components/listaPopUp.vue';
import ListaPageValue from '@/components/listaPageValue.vue';

const filteredItemsStore = useFilteredItemsStore();
const { url } = useHelpers();

const route = useRoute();

const user = ref({});

onBeforeMount(async () => {

    filteredItemsStore.init(route.params.tag);

    const response = await fetch(url('data.json'))

    const users = await response.json();

    filteredItemsStore.init(route.params.tag, users);
})

const selectUser = () => {
    user.value = filteredItemsStore.users.find((user) => user.url == route.params.url);
}

const previousPage = () => {
    const index = filteredItemsStore.users.findIndex((item) => item.url == route.params.url);

    let previousIndex = 0;

    if (index <= 0) {

        previousIndex = filteredItemsStore.users.length - 1;
    }
    else {
        previousIndex = index - 1;
    }

    return filteredItemsStore.users[previousIndex];
}

const nextPage = () => {
    const index = filteredItemsStore.users.findIndex((item) => item.url == route.params.url);

    let nextIndex = 0;

    let maxIndex = filteredItemsStore.users.length - 1;

    if (index >= maxIndex) {

        nextIndex = 0;
    }
    else {
        nextIndex = index + 1;
    }

    return filteredItemsStore.users[nextIndex];
}

const onSlideChange = () => {
    setTimeout(() => {
        const slide = document.querySelector('.swiper-slide-active');

        if (slide) {

            // console.log(slide.id);

            const item = filteredItemsStore.users.find((user) => `slide_${user.id}` == slide.id);

            router.push({
                name: 'subpage',
                params: {
                    url: item.url
                },
            })
        }
    }, 200)

}

const initialSlide = (route.params.url.split('-')[0] ?? 1) - 1;
const slideTo = ref(null);

const slideToTag = (tag) => {
    slideTo.value = filteredItemsStore.users.findIndex(user => user.tag == tag);
    // console.log(slideTo.value)
}

onMounted(async () => {

    selectUser()

    // fetch the user information when params change
    watch(
        () => [route.params.url, route.params.tag],
        () => {
            selectUser()
            filteredItemsStore.selectTag(route.params.tag)
        }
    )
    watch(
        () => [route.params.tag],
        () => {
            filteredItemsStore.selectTag(route.params.tag)
        }
    )
})

const openlistapge = ref(false);

const toggle = () => {
    openlistapge.value = !openlistapge.value;
};


</script>

<template>
    <div id="main" class="bg-[#F2F2F2] w-screen h-[100dvh] overflow-auto relative">
        <!-- lista popup start-->
        <teleport to="body">
            <transition
                enter-active-class="ease-out duration-300"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-active-class="ease-in duration-200"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
                >
                <!-- page value start -->
                <div v-show="openlistapge" class=" bg-white/50 backdrop-blur-xl fixed index-conflict inset-0 z-20 overflow-auto">
                    <listaPageValue
                        @closePopup="openlistapge = false"
                    />
                </div>
                <!-- page value end -->
            </transition>
        </teleport>

        <div class="mx-auto">
            
            <div class="block lg:hidden">
                <headerArea :showForbesLogo="true" :showMagazine="false" />
            </div>
            <div class="hidden lg:block">
                <headerArea :showForbesLogo="true" :showMagazine="true" />
            </div>

            <div class="w-[97%] 2xl:w-full max-w-[1588px] mx-auto relative">

                <div class="relative mx-auto pt-[20px] lg:pt-[5px] px-[15px] mini:px-[20px]">

                    <div class="w-full relative flex flex-col items-center justify-center gap-[20px]">

                        <!-- center area start -->
                         
                        <div class="w-full flex items-start justify-center gap-[20px]">

                            <!-- previous button -->
                            <router-link :to="{ name: 'subpage', params: { url: previousPage().url } }"
                                class="flex items-center justify-start absolute z-10 top-[150px] md:top-[180px] lg:top-[200px] 2xl:top-[224px] left-0 bg-white md:bg-transparent px-[13px] py-[10px]">
                                
                                <svg class="w-[16.62px] h-25.78px] sm:w-[26px] sm:h-[38px]" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 26 38" fill="none">
                                <path d="M22.2418 37.7462C22.7959 37.7584 23.3401 37.5977 23.7987 37.2864C24.2572 36.975 24.6074 36.5282 24.8004 36.0087C24.9934 35.4891 25.0198 34.9224 24.8758 34.3871C24.7319 33.8519 24.4247 33.375 23.997 33.0224L7.67931 19.0432L23.997 5.06902C24.2929 4.85159 24.5406 4.57555 24.7248 4.25793C24.9089 3.94032 25.0255 3.588 25.0673 3.22324C25.109 2.85847 25.075 2.4891 24.9673 2.1381C24.8596 1.78709 24.6806 1.462 24.4416 1.18337C24.2025 0.904743 23.9084 0.67873 23.5779 0.519001C23.2473 0.359276 22.8873 0.269562 22.5204 0.255405C22.1536 0.241253 21.7877 0.302791 21.4458 0.436573C21.1039 0.57035 20.7933 0.773281 20.5335 1.03266L1.85118 17.0172C1.5578 17.2676 1.32221 17.5783 1.16067 17.9286C0.999122 18.2788 0.91547 18.66 0.91547 19.0457C0.91547 19.4314 0.999122 19.8126 1.16067 20.1628C1.32221 20.5131 1.5578 20.8241 1.85118 21.0745L20.5335 37.0744C21.0054 37.4936 21.6107 37.7319 22.2418 37.7468L22.2418 37.7462Z" fill="#C7B276"/>
                                </svg>
                            </router-link>

                            <div class="max-w-[350px] md:max-w-[700px] lg:max-w-[980px] xl:max-w-[1150px] 2xl:max-w-[1352px] flex justify-center mx-auto gap-[30px] 2xl:gap-[63px]">
                                <!-- subpageCenter Start-->
                                <Transition name="fade-slide" mode="out-in">
                                    <subpageCenter :user="user" />
                                </Transition>
                                <!-- subpageCenterEnd-->

                            </div>

                            <!-- next button -->
                            <router-link :to="{ name: 'subpage', params: { url: nextPage().url } }"
                                class="flex items-center justify-end absolute z-10 top-[150px] md:top-[180px] lg:top-[200px] 2xl:top-[224px] right-0 bg-white md:bg-transparent px-[13px] py-[10px]">
                                <svg class="w-[16.62px] h-25.78px] sm:w-[26px] sm:h-[38px]" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 26 38" fill="none">
                                    <path d="M3.75819 0.253819C3.20405 0.241631 2.65988 0.40227 2.20133 0.71365C1.74278 1.02503 1.39265 1.47176 1.1996 1.99133C1.00655 2.5109 0.980185 3.07764 1.12417 3.61289C1.26815 4.14814 1.57532 4.62501 2.00298 4.97761L18.3207 18.9568L2.00298 32.931C1.70715 33.1484 1.45939 33.4245 1.27524 33.7421C1.09108 34.0597 0.974482 34.412 0.932751 34.7768C0.891019 35.1415 0.925052 35.5109 1.03272 35.8619C1.14038 36.2129 1.31936 36.538 1.55844 36.8166C1.79752 37.0953 2.09156 37.3213 2.42213 37.481C2.75271 37.6407 3.11271 37.7304 3.47958 37.7446C3.84645 37.7587 4.21229 37.6972 4.55419 37.5634C4.89609 37.4296 5.20669 37.2267 5.46653 36.9673L24.1488 20.9828C24.4422 20.7324 24.6778 20.4217 24.8393 20.0714C25.0009 19.7212 25.0845 19.34 25.0845 18.9543C25.0845 18.5686 25.0009 18.1874 24.8393 17.8372C24.6778 17.4869 24.4422 17.1759 24.1488 16.9255L5.46653 0.925571C4.99458 0.506378 4.38925 0.268056 3.75819 0.253204V0.253819Z" fill="#C7B276"/>
                                </svg>
                            </router-link>
                        </div>

                        <!-- center area end -->
                        <!-- slider area start -->

                        <div class="hidden md:block relative max-w-[650px] lg:max-w-[850px] xl:max-w-[1104px] mx-auto">
                            <div class="slider w-full mx-auto relative">
                                <Slider @slideChange="onSlideChange" :initialSlide="initialSlide" :slideTo="slideTo" />
                            </div>
                        </div>

                        <!-- slider area end -->

                    </div>

                </div>

            </div>


        </div>
        
        <button @click="toggle" class="inline-flex items-center justify-center md:hidden w-full text-[#C7B276] fixed index-conflict bottom-0 left-0 z-30
            bg-white py-[23px] px-[30px] font-bold text-[14px] space-x-2">
            <span v-show="!openlistapge" class="inline-block">Lista</span>
            <span v-show="!openlistapge" class="inline-block space-x-1">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </span>
            <span v-show="openlistapge" class="text-[#C7B276] font-bold text-[14px] leading-normal">Vissza</span>
            <span v-show="openlistapge">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                    <path d="M12.5219 10.002L8.8898 6.36933L12.2602 2.99891C12.8979 2.36209 12.8979 1.32916 12.2602 0.691784C11.6231 0.0546887 10.5902 0.0549648 9.95364 0.691784L6.58267 4.0622L3.0469 0.526161C2.40953 -0.110934 1.3766 -0.110934 0.739781 0.526161C0.102962 1.16353 0.102962 2.19591 0.739781 2.83328L4.27583 6.36933L0.478097 10.1668C-0.159274 10.8044 -0.159274 11.8368 0.478097 12.4742C1.11519 13.111 2.14785 13.111 2.78467 12.4742L6.58267 8.67645L10.2153 12.3091C10.8524 12.9462 11.8851 12.9462 12.5219 12.3091C13.1595 11.6715 13.1593 10.6385 12.5219 10.002Z" fill="#C7B276"/>
                </svg>
            </span>
        </button>

    </div>
</template>


<style scoped>

/* Fade and slide animation using Tailwind and custom classes */
.fade-slide-enter-active,
.fade-slide-leave-active {
  @apply transition-all duration-500 ease-in-out;
}

.fade-slide-enter-from {
  @apply opacity-0 translate-y-4;
}

.fade-slide-enter-to {
  @apply opacity-100 translate-y-0;
}

.fade-slide-leave-from {
  @apply opacity-100 translate-y-0;
}

.fade-slide-leave-to {
  @apply opacity-0 translate-y-4;
}

.dot {
  border-radius: 50%;
  width: 5px;
  height: 5px;
  background-color: #C7B276;
  display: inline-block;
  animation: dotPulse 3s infinite ease-in-out;
}

.dot:nth-child(1) {
  animation-delay: 0s;
}

.dot:nth-child(2) {
  animation-delay: 1s;
}

.dot:nth-child(3) {
  animation-delay: 2s;
}

@keyframes dotPulse {
  0%, 100% {
    background-color: #5BE060;
  }
  50% {
    background-color: #C7B276;
    scale: 1.5;
  }
}

</style>
