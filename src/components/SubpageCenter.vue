<script setup>
import { useHelpers } from '@/composables/useHelpers';

import { ref, onMounted, watch } from 'vue';

const { url } = useHelpers();

const props = defineProps({
    user: {
        type: Object,
        default: {}
    }
})

</script>

<template>
    <!-- desktop version start-->
     <div>
         <div class="flex flex-col md:flex-row gap-[40px] 2xl:gap-x-[68px] xl:items-center justify-center gap-y-[8px]">
             
            <div class="image-area w-[341px] h-[341px] md:w-[280px] md:h-[280px] lg:w-[380px] lg:h-[380px] 2xl:w-[460px] 2xl:h-[460px] relative flex-shrink-0">
                 <img :src="url(`/person-images/${user.image}`)" alt="person-image" class="w-full h-full object-cover">         
                 <span 
                     class="bg-[#C7B276] hidden md:inline-block px-[20px] lg:px-[35px] absolute top-[20px] lg:top-[30px] xl:top-[53px] -translate-x-1/2
                     py-[10px] 2xl:py-[19px] w-[80px] lg:w-[100px] 2xl:w-[160px] font-bold text-white text-[20px] lg:text-[25px] 2xl:text-[34px]">
                     {{ user.serial }}
                 </span>
             </div>

             <div class="text-area space-y-[8px] xl:space-y-[20px] flex flex-col max-w-[320px] mx-auto xl:max-w-[500px]">
                 <div class="name font-courier text-[#5BE060] text-[31px] text-center leading-[35px]
                    md:text-start lg:text-[48px] font-bold lg:leading-[52px]">
                    {{ user.name }}
                </div>
                 <div class="text-[12px] leading-[12px]
                    lg:text-[18px] lg:leading-[23px] font-bold">
                     <div class="text-[#696969]">Legismertebb érdekeltségei:</div>
                     <div class="text-[#A7A7A7]">{{ user.legismertebb }}</div>
                 </div>
                 
                 <div class="text-[#C56A01] font-bold">
                     <div class="text-[12px] leading-[17px] lg:text-[18px] lg:leading-[24px]">Becsült érték:</div>
                     <div class="text-[23px] leading-[28px] lg:text-[36px] lg:leading-[45px]">{{ user.becsult }}</div>
                 </div>
                 <div v-html="user.description" class="text-[#696969] font-medium text-[12px] lg:text-[16px] leading-[17px] lg:leading-[20px] max-w-[405px] pb-[100px] md:pb-0 md:max-h-[140px] lg:max-h-[140px] xl:max-h-[200px] overflow-auto md:pr-3 description"></div>
             </div>
         </div>
     </div>
    <!-- desktop version end-->
</template>

<style>
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

.perspective {
    perspective: 1000px;
}
.transform-style-preserve-3d {
    transform-style: preserve-3d;
}
.backface-hidden {
    -webkit-backface-visibility: hidden; /* Safari */
    backface-visibility: hidden;
}
.rotate-y-180 {
    transform: rotateY(180deg);
    -webkit-transform: rotateY(180deg);
}
.description::-webkit-scrollbar {
  width: 8px;
  height: 8px;
}

.description::-webkit-scrollbar-thumb {
  background-color: #5BE060;
  border-radius: 10px;
  border: 2px solid transparent;
  background-clip: padding-box;
}

.description::-webkit-scrollbar-track {
  background-color: #f0f0f0;
  border-radius: 10px;
}

.description::-webkit-scrollbar-thumb:hover {
  background-color: #505050;
}

.description {
  scrollbar-width: thin;
  scrollbar-color: #5BE060 #f0f0f0;
}

.description a {
  color: #5BE060;
  text-decoration: underline;
  transition-duration: 0.4s;
}

.description a:hover {
  color: #02a208;
}

</style>
