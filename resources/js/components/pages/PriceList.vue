<template>
    <transition appear name="fade" :duration="20000">
        <div class="row pt-5 site">
            <div class="col-md-2">
                <div class="row px-3 title title--top">
                    <h1 class="title__text js-letter" style="transform: translateX(0%) translateZ(0px);">
                        МОЇ<br>РОЗЦІНКИ
                    </h1>
                    <div class="business-title pt-3">
                        <h6>Актуальний базовий прайс /</h6>
                        <h6>2021</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-10 main-block px-0">
                <div class="row text-grey price-box pt-20">
                    <div class="col-md-6 my-1 py-2 pr-5 text-right wedding-price prices">
                        <h1 class="mb-4">Стандарт</h1>
                        <h6>- 6 годин зйомки</h6>
                        <h6>- повна обробка усіх фото (не менше 400)</h6>
                        <h6>- термін готовності 1 - 2 місяці</h6>
                        <h6>- ретуш великих портретів</h6>
                        <h6>- знижка на loveStory 15%</h6>
                        <h2 class="mt-5">6000 грн</h2>
                    </div>
                    <div class="col-md-5 my-1 ml-1 py-2 pl-5 text-left family-price prices">
                        <h1 class="mb-4">Преміум</h1>
                        <h6>- 8 годин зйомки</h6>
                        <h6>- повна обробка усіх фото (не менше 500)</h6>
                        <h6>- термін готовності 1 - 2 місяці</h6>
                        <h6>- ретуш великих портретів</h6>
                        <h6>- знижка на loveStory 25%</h6>
                        <h2 class="mt-5">8000 грн</h2>
                    </div>
                </div>
                <div class="row text-grey price-box">
                    <div class="col-md-6 py-2 pr-5 text-right story-price prices">
                        <h1 class="mb-4">Повний день</h1>
                        <h6>- 12 годин зйомки</h6>
                        <h6>- повна обробка усіх фото (не менше 700)</h6>
                        <h6>- термін готовності 1 - 2 місяці</h6>
                        <h6>- ретуш великих портретів</h6>
                        <h6>- знижка на loveStory 50%</h6>
                        <h2 class="mt-5">10500 грн</h2>
                    </div>
                    <div class="col-md-5 ml-1 py-2 pl-5 text-left studio-price prices">
                        <h1 class="mb-3">Індивідуальна</h1>
                        <h6 class="mt-3">Умови та Прайс розглядаються в залежності від побажань</h6>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>
<script>
export default {
    data () {
        return {
           //
        }
    },
    mounted() {
        //
    },
    methods: {
        //
    }
}
</script>
