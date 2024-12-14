<script setup>
import belepesButton from './Belepes.vue';
import modszertanModal from './ModszertanModal.vue';
import magazine from './Magazine.vue';
import { useFilteredItemsStore } from './stores/filteredItemsStore';
import { onBeforeMount, ref } from 'vue';
import { useHelpers } from '@/composables/useHelpers';

const modszertPopup = ref(false);
const closePopup = () => {
    modszertPopup.value = false;
}
const showPopup = () => {
    modszertPopup.value = true;
}

const { url } = useHelpers();

const filteredItemsStore = useFilteredItemsStore();

onBeforeMount(async () => {

    filteredItemsStore.init();

    const response = await fetch(url('data.json'))

    const users = await response.json();

    filteredItemsStore.init(null, users);
})

</script>

<template>
    <modszertanModal :showPopup="modszertPopup" @close-popup="closePopup" />
    <div class="w-full pt-[25px] xl:pt-[89px]">

        <div class="max-w-[984px] relative">

            <a href="https://forbes.hu/" class="forbes-logo mini:absolute mini:left-[100px] md:left-[150px] lg:left-[236px] z-30 -top-3">
                <svg class="w-[112px] h-[28px] sm:w-[158px] sm:h-[40px] mx-auto mb-[18px] mini:mb-0 mini:mx-0" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 95 25" fill="none">
                    <path d="M19.4491 7.91857L18.3099 8.25853C17.3451 4.87591 15.6553 2.94322 12.7244 2.94322H8.89606C8.68893 5.18697 8.58709 8.67158 8.68893 12.4333L11.2418 12.2956C12.9678 12.2956 13.6893 11.019 14.1035 9.15433H15.0684V16.9939H14.1035C13.6893 15.0969 12.9661 13.8203 11.2418 13.7166L8.68893 13.6826C8.68893 16.4771 8.72345 18.8586 8.89606 20.3119C9.06866 22.3823 9.621 23.3138 11.1037 23.5211L12.4845 23.6588V24.5563H0V23.6588L1.03563 23.5211C2.48378 23.3138 3.07064 22.3823 3.24325 20.3119C3.51941 16.931 3.58846 9.71867 3.24325 5.71561C3.06891 3.57215 2.48206 2.70865 1.03563 2.53696L0 2.36698V1.43209H19.4146L19.4491 7.91857ZM33.7235 16.234C33.7235 21.0649 30.6167 24.9983 25.0691 24.9983C19.62 24.9983 16.8618 21.2723 16.8618 16.3717C16.8618 11.5749 19.9687 7.57351 25.5179 7.57351C30.9653 7.57861 33.7235 11.3352 33.7235 16.2357V16.234ZM22.0693 16.3037C22.0693 20.5125 23.1722 23.9631 25.4143 23.9631C27.8308 23.9631 28.5212 20.5822 28.5212 16.3037C28.5212 12.0253 27.4442 8.67838 25.1727 8.67838C22.758 8.67838 22.0693 11.9573 22.0693 16.3054V16.3037ZM46.1718 12.6117C43.9279 11.0938 41.5115 11.7499 41.0334 12.6117C40.828 15.2703 40.8608 19.3413 41.0679 21.4508C41.1714 22.831 41.5512 23.4174 42.5868 23.5211L43.9676 23.6588V24.5563H33.689V23.6588L34.483 23.5211C35.4824 23.4174 35.8276 22.831 35.8966 21.4508C36.1383 19.2087 36.2073 14.5155 35.8966 11.9318C35.8276 10.4479 35.4824 9.89205 34.483 9.75946L33.689 9.65578V9.02345L41.0334 7.57861L40.9315 11.4423C42.6576 7.43922 46.0682 6.95647 47.9306 8.02566L46.1718 12.6117ZM64.6889 15.6833C64.6889 21.342 61.2074 25 55.3095 25C53.2279 24.9699 51.1568 24.7035 49.1372 24.2062C49.3098 21.9284 49.3098 7.85057 49.1372 5.19377C48.9646 3.81352 48.5865 3.154 47.5509 3.01971L46.8605 2.95002V2.32959L54.1375 0.949341C54.103 2.12221 54.034 5.19887 54.034 8.81607C55.3095 8.16164 56.4832 7.78088 58.0695 7.78088C61.8616 7.78088 64.6889 11.0938 64.6889 15.6833ZM59.5867 15.9604C59.4831 12.3704 58.2058 9.54189 55.7583 9.54189C55.1664 9.54768 54.5809 9.663 54.0322 9.88185C54.0322 15.6085 54.1013 22.0967 54.2394 23.6503C54.6416 23.7698 55.0603 23.8271 55.4804 23.8203C57.8623 23.8271 59.5867 20.3765 59.5867 15.9604ZM74.4479 7.57861C79.034 7.57861 81.2417 11.0292 81.2762 15.549H70.9648C70.9303 19.5521 72.9998 22.5879 76.8609 22.5879C78.5508 22.5879 79.5173 22.1052 80.5512 21.3454L81.0345 21.8978C79.8953 23.4854 77.5514 25.0034 74.4134 25.0034C69.3785 25.0034 65.8971 21.4491 65.8971 16.4465C65.8971 11.9216 68.7589 7.57861 74.4479 7.57861ZM76.174 14.2368C76.2775 11.9607 75.8288 8.68178 74.0009 8.68178C72.1385 8.68178 71.1046 11.7533 71.0666 14.3762L76.174 14.2368ZM94.1732 12.7188L93.3102 12.9602C92.4817 10.0705 91.1026 8.81947 89.1366 8.81947C87.7558 8.81947 86.7926 9.75266 86.7926 11.2349C86.7926 12.6508 87.9301 13.409 90.999 14.6855C93.8263 15.7564 95 17.0653 95 19.3447C95 22.8293 92.3436 25.0034 87.9646 25.0034C85.8623 25.0034 83.4769 24.5206 82.1375 23.9682L81.9649 19.1373L82.7917 18.9673C84.0344 22.2786 85.6207 23.5211 87.6885 23.5211C89.4818 23.5211 90.4139 22.2446 90.4139 20.934C90.4139 19.6235 89.6889 18.8637 86.8962 17.8285C84.2398 16.931 82.4085 15.7581 82.4085 12.8582C82.4085 9.99574 84.856 7.5803 89.0296 7.5803C90.9938 7.5803 92.7872 7.92027 93.9592 8.47611L94.1732 12.7188Z" fill="black"/>
                </svg>
            </a>
            <div class="relative z-0">
                <img :src="url('/images/landing-page-images/hero-lg.png')" alt="hero" class="w-full hidden mini:block">
                <img :src="url('/images/landing-page-images/hero-sm.png')" alt="hero" class="w-full block mini:hidden">
            </div>
        </div>

        <div class="max-w-[270px] mini:max-w-[324px] mx-auto mt-[31px]">
            <belepesButton buttonText="Megnézem" name="subpage" :url="filteredItemsStore.getSelectedUrl(0)" />
        </div>

        <div class="text-center mt-[17px]">
            <button class="inline-block cursor-pointer font-bold text-[10px] lg:text-[12px] leading-normal text-black hover:text-[#5BE15F] transition-all underline"
                @click="showPopup">
                MÓDSZERTAN
            </button>
        </div>

        <div class="font-bold mt-[12px] text-[10px] leading-[11px] lg:text-[12px] lg:leading-[18px] text-[#727272] text-center">
            Vezető szerkesztő: Gólya Ági<br>
            Felelős szerkesztő: Zsiborás Gergő<br>
            Írta és számolta: Bánáti Anna, Gólya Ági, Melis Dóra, Váradi Ibolya, Zsiborás Gergő
        </div>
    </div>

</template>