<script setup>
import { watch } from 'vue';

const props = defineProps({
    showPopup: {
        type: Boolean,
        default:  false,
    }
})

const emits = defineEmits([
    'closePopup'
])

watch(() => props.showPopup, () => {
    if (props.showPopup) {
        document.body.style.overflow = 'hidden';
        
    } else {
        document.body.style.overflow = null;
    }
});
</script>
<template>
    <teleport to="body">
        <transition leave-active-class="duration-200">
            <div 
                v-show="showPopup" class="fixed index-conflict inset-0 z-50 px-1 py-10 flex items-center"
                scroll-region>
                <transition
                    enter-active-class="ease-out duration-300"
                    enter-from-class="opacity-0"
                    enter-to-class="opacity-100"
                    leave-active-class="ease-in duration-200"
                    leave-from-class="opacity-100"
                    leave-to-class="opacity-0"
                >
                    <div v-if="showPopup" class="fixed inset-0 backdrop-blur bg-black/50 transition-opacity" aria-hidden="true" @click="() => { emits('closePopup') }">
                        <!-- <div class="absolute inset-0 backdrop-blur bg-black/50 transition-opacity" aria-hidden="true" /> -->
                    </div>
                </transition>

                <transition
                    enter-active-class="ease-out duration-300"
                    enter-from-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    enter-to-class="opacity-100 translate-y-0 sm:scale-100"
                    leave-active-class="ease-in duration-200"
                    leave-from-class="opacity-100 translate-y-0 sm:scale-100"
                    leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                >
                    <div 
                        v-if="showPopup" 
                        class="bg-white overflow-hidden shadow-xl transform transition-all w-full sm:mx-auto max-w-4xl"
                    >

                        <div class="border-b border-gray3 py-3 px-5 font-semibold font-poppins text-md text-grayTxt flex justify-between items-center">
                            <span class="text-sm sm:text-lg">MÓDSZERTAN</span>
                            <button 
                                class="ms-5 hover:text-skyish transition-colors"
                                @click="() => { emits('closePopup') }"
                            >
                                
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg hover:fill-[red] transition-colors duration-[0.4s]" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                </svg>
                            </button>
                        </div>
                        <div 
                            class="pt-5 pb-10 px-2 sm:px-5 overflow-y-auto body"
                            :class="{'max-h-[calc(100vh-200px)]' : $slots.footer, 'max-h-[calc(100vh-130px)]' : !$slots.footer}" 
                            @scroll="(event) => {emits('modalScroll', event)}"
                        >
                            <div>
                                <div>
                                    <b>
                                        Mit mutat meg ez a lista?
                                    </b>
                                </div>
                                <div class="mt-5">
                                    Azt, hogy az elmúlt négy évben nemzetközi eredményeket elért, aktív magyar sportolók közül ki az, aki a leginkább tud olyan énmárkát építeni, amivel plusz bevételeket képes magának generálni - illetve azt, hogy ki az, akiben erre nagy a potenciál.
                                </div>
                                <div class="mt-5">
                                    A módszertant a Deloitte tanácsadócég munkatársaival állítottuk össze, és a Sentione közösségimédia-adatelemző cég adatbázisát használtuk.
                                </div>
                                <div class="mt-5">
                                    <b>
                                        Milyen értékeket néztünk?
                                    </b>
                                </div>
                                <div class="mt-5">
                                    A sportolók neve mellett három érték szerepel: sport-index, közösségimédia-index, üzleti potenciál.
                                </div>
                                <div class="mt-5">
                                    <b>Sport-index:</b> itt az elmúlt olimpiád nemzetközi dobogós eredményeit vettük számításba klub és válogatott szinten (a vizsgált időszak: 2021. szeptember – 2024. május). Plusz pontot ért az olimpiai dobogó és az is, ha valakinek több aktív éve van még hátra (mert ez nagyobb hirdetői érték). Az így kapott értéket egy sportági szorzóval szoroztuk meg – ez utóbbit a Deloitte szakemberei állapították meg nekünk az adott sportágak pénztermelőképessége, gazdasági ereje alapján. Szorzók: labdarúgás – 10 pont; úszás, tenisz – 8; motorsport, kézilabda – 6; kosárlabda – 5; országúti kerékpár, atlétika – 4; vízilabda – 3; kardvívás – 2. (Itt a listán szereplő sportágak szorzói szerepelnek csak.)
                                </div>
                                <div class="mt-5">
                                    <b>Közösségimédia-index:</b> Az index meghatározásához a SentiOne adatbázisát használtuk. A rendszer a sportolók elmúlt 12 hónapos elérését mérte a különböző platformokon (a Facebook és az Instagram mellett most először a TikTok-ot is vizsgáltuk), ezek összesítését vettük alapul, kiegészítve az elmúlt 12 hónap pozitív és semleges közösségi médiás megítélésének arányszámával, valamint a Meta felületein (Facebook és Instagram) mért engagement rate-el. Ezutóbbi leginkább azt mutatja meg, mennyire aktív egy követő tábor, a hirdetőknek ugyanis ez is egyre fontosabb. Ezekből egy kompozit mérőszámot képeztünk, ezek mentén rangsoroltunk és egy 1-100 ig terjedő skálára helyeztük a végeredményt – csakúgy mint  többi részérték esetében. 
                                </div>
                                <div class="mt-5">
                                    <b>Üzleti potenciál - <span class="text-[12px]">szponzorok szavazatai:</span></b> A legnagyobb, sport területén aktív hirdetőket (és egy ügynökséget) arra kértünk, hogy egy 15-ös skálán pontozzák, mennyire mély és hosszú távú kapcsolatot építenének ki adott sportolókkal egy, a márka ismertségének növelését célzó kampányban. A sporteredmények alapján 30-asra szűkítettük a shortlistünket, erre szavazhattak a következő cégek: Biotech USA, Decathlon, Mito, SPAR, OTP, Szerencsejáték Zrt., Mol, Telekom. A „zsűrihez” csatlakozott a lista tanácsadó partnere, a Deloitte is.</div>
                                <div class="mt-5">
                                    Képek forrása
                                </div>
                                <div class="mt-5">
                                    Klubok, szövetségek hivatalos oldala, a sportolók közösségmédia-felületei, Hirling Bálint, Orbital Strangers és Sebestyén László (Forbes archív), Kovács Tamás, Illyés Tibor (MTI)
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </transition>
            </div>
        </transition>
    </teleport>
</template>