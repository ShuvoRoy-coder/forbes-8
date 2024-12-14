<script setup>
import { useHelpers } from '@/composables/useHelpers';

const { url } = useHelpers();

</script>

<template>

    <a href="https://magazin.forbes.hu/2025-januar" target="_black" 
        class="inline-block w-[286px] md:w-[364px] px-[23px] relative group transition-all">
        
        <span class="w-[88px] md:w-[110px] ml-[15px] h-[112px] md:h-[140px] inline-block rotate-[15deg] z-10 relative shadow-gray-300 shadow-xl group-hover:shadow-black transition-all duration-[0.5s]">
            <img class="w-full h-full object-cover" :src="url('/images/magazine/magazine.png')" alt="magazine-book" />
        </span>

        <span class="inline-flex items-center justify-end gap-[16px] absolute -translate-y-1/2 top-1/2 left-0 w-full rounded-[7px] group-hover:bg-black transition-all duration-[0.5s] bg-[#C5C5C5] px-[23px] md:py-[20px] pt-[7px] pb-[29px]">
            
            <span class="text-[14px] font-bold text-black group-hover:text-[#5BE15F] transition-all duration-[0.5s]">
                Részletek <br>
                a magazinban!
            </span>
            <span class="bg-black left-1/2 translate-y-1/2 md:left-0 md:translate-y-0 bottom-0 absolute md:relative group-hover:bg-[#5BE15F] transition-all duration-[0.5s] rounded-full h-[39px] w-[39px] md:h-[52px] md:w-[52px] flex items-center justify-center">    
                <svg class="group-hover:fill-black transition-all duration-[0.5s] w-[23px] h-[12px] md:w-[32px] md:h-[18px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 18" fill="none">
                    <path class="group-hover:fill-black transition-all duration-[0.5s]" d="M1.83653 10.4193H26.7223L22.06 15.0816C20.7208 16.4208 22.7296 18.4295 24.0688 17.0903L28.3149 12.8376L31.1494 9.99871C31.6987 9.44609 31.6987 8.55359 31.1494 8.00097L24.0688 0.912131C23.7994 0.635312 23.4286 0.479991 23.0423 0.483203C21.767 0.483364 21.1411 2.03666 22.06 2.92099L26.7333 7.58331H1.76321C-0.200847 7.68076 -0.0541991 10.5171 1.83653 10.4193Z" fill="#5BE15F"/>
                </svg>
            </span>
        </span>
    </a>


</template>