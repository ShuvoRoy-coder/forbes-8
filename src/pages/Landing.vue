<script setup>
import headerArea from '@/components/Header.vue';
import landingCenter from '@/components/landingCenter.vue';
import horizontalBanner from '@/components/banner/horizontalBanner.vue';
import { useFilteredItemsStore } from '@/components/stores/filteredItemsStore';
import { onBeforeMount, ref } from 'vue';
import { useHelpers } from '@/composables/useHelpers';


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

    <div id="main" class="bg-[#F2F2F2] w-screen h-[100dvh] overflow-auto relative">
        <div class="mx-auto container relative pb-[15px]">
            <div class="w-full xl:absolute top-4 left-0">
                <headerArea :showForbesLogo="false" :showMagazine="true"/>
            </div>

            <div class="max-w-[970px] mx-auto">
                <landingCenter/>
    
                <!-- banner area start -->
                <!-- <div class="w-full lg:block hidden mt-[15px]">
                    <horizontalBanner />
                </div> -->
                <!-- banner area end -->

            </div>

        </div> 


    </div>
    
</template>