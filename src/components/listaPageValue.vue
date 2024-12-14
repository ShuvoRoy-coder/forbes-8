<script setup>
import { useFilteredItemsStore } from './stores/filteredItemsStore';
import { RouterLink, useRoute } from 'vue-router';
import { useHelpers } from '../composables/useHelpers';
import { watch, provide, ref } from 'vue';
import headerArea from './Header.vue';
import magazine from './Magazine.vue';

const { url } = useHelpers();
const filteredItemsStore = useFilteredItemsStore();
const route = useRoute();

const emits = defineEmits([
    'closePopup'
]);

watch(() => [route.params.tag, route.params.url],
    () => {
        emits('closePopup');
    }
)

</script>

<template>

    <div class="mx-auto space-y-10 w-full">

        <div class="flex flex-col items-center gap-y-[30px] lg:hidden">
            <headerArea :showForbesLogo="true" :showMagazine="false" :showSmallLogo="false" />

            <magazine/>
        </div>

        <div class="max-w-[256px] mx-auto space-y-5 pb-[100px]">

            <RouterLink 
                v-for="item in filteredItemsStore.filteredItems"
                :key="item"
                :to="{ name: 'subpage', params: { url:item.url }}"
                class="inline-flex items-center justify-center gap-[29px]">

                <span class="h-[154px] relative inline-block w-[154px] flex-shrink-0 mx-auto transition-all duration-500">
                    <span class="inline-block absolute top-[21px] -translate-x-1/2 w-[48px]  text-white font-bold text-[11px] px-[10px] py-[5px]"
                        :class="{'bg-[#5BE060]': route.params.url == item.url}, {'bg-[#C7B276]': route.params.url != item.url}"
                    >
                        {{ item.serial }}
                    </span>
    
                    <img :src="url(`/person-images/${item.image}`)" alt="person-image" class="h-full w-full object-cover object-top">
                </span>

                <span 
                    class="block text-[20px] leading-[24px] font-bold"
                    :class="{'text-[#5BE060]': route.params.url == item.url}, {'text-black': route.params.url != item.url}"
                    >
                    {{ item.name }}
                </span>
                
            </RouterLink>
        
        </div>



    </div>

</template>