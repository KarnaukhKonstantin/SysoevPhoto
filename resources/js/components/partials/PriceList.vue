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
            <div class="col-md-10 main-block px-0 prices">
                <div class="row text-grey price-box pt-20">
                    <div class="col-md-5 offset-1 my-1 pr-5 text-right wedding-price">
                        <h1 class="mb-3">Стандарт</h1>
                        <h5>- 6 годин зйомки</h5>
                        <h5>- повна обробка усіх фото (не менше 400)</h5>
                        <h5>- термін готовности 1 - 2 місяці</h5>
                        <h5>- ретуш великих портретів</h5>
                        <h5>- знижка на loveStory 15%</h5>
                        <h1 class="mt-3">6000 грн</h1>
                    </div>
                    <div class="col-md-5 my-1 ml-2 pl-5 text-left family-price">
                        <h1 class="mb-3">Преміум</h1>
                        <h5>- 8 годин зйомки</h5>
                        <h5>- повна обробка усіх фото (не менше 500)</h5>
                        <h5>- термін готовности 1 - 2 місяці</h5>
                        <h5>- ретуш великих портретів</h5>
                        <h5>- знижка на loveStory 25%</h5>
                        <h1 class="mt-3">8000 грн</h1>
                    </div>
                    <div class="col-md-5 offset-1 my-1 pr-5 text-right story-price">
                        <h1 class="mb-3">Повний день</h1>
                        <h5>- 12 годин зйомки</h5>
                        <h5>- повна обробка усіх фото (не менше 700)</h5>
                        <h5>- термін готовности 1 - 2 місяці</h5>
                        <h5>- ретуш великих портретів</h5>
                        <h5>- знижка на loveStory 50%</h5>
                        <h1 class="mt-3">10500 грн</h1>
                    </div>
                    <div class="col-md-5 my-1 ml-2 pl-5 text-left studio-price">
                        <h1 class="mb-3">Індивідуальна</h1>
                        <h5 class="mt-3">Умови та Прайс розглядаються в залежності від побажань</h5>
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
