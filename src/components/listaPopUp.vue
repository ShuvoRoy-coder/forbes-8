<script setup>
import listaPageValue from './listaPageValue.vue';
import { ref } from 'vue';
import { useHelpers } from '@/composables/useHelpers';
const { url } = useHelpers();

const openlistapge = ref(false);

const toggle = () => {
    openlistapge.value = !openlistapge.value;
};
</script>

<template>
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
          <div v-show="openlistapge" class="w-full bg-white/50 backdrop-blur-xl absolute left-0 top-0 z-20">
              <listaPageValue
                  @closePopup="openlistapge = false"
              />
          </div>
          <!-- page value end -->
      </transition>
     </teleport>


    <button @click="toggle" class="inline-flex items-center justify-center md:hidden w-full text-[#C7B276] fixed bottom-0 left-0 z-30
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
    <!-- lista popup end -->


</template>

<style scoped>
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