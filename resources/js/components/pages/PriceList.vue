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
                <div class="row text-grey price-box">
                    <div class="col-md-6 my-1 py-2 pr-5 text-right wedding-price prices">
                        <h1>Стандарт</h1>
                        <h6>- 6 годин зйомки</h6>
                        <h6>- повна обробка усіх фото (не менше 400)</h6>
                        <h6>- термін готовності 1 - 2 місяці</h6>
                        <h6>- ретуш великих портретів</h6>
                        <h6>- знижка на loveStory 15%</h6>
                        <h2>6000 грн</h2>
                    </div>
                    <div class="col-md-5 my-1 ml-1 py-2 pl-5 text-left family-price prices">
                        <h1>Преміум</h1>
                        <h6>- 8 годин зйомки</h6>
                        <h6>- повна обробка усіх фото (не менше 500)</h6>
                        <h6>- термін готовності 1 - 2 місяці</h6>
                        <h6>- ретуш великих портретів</h6>
                        <h6>- знижка на loveStory 25%</h6>
                        <h2>8000 грн</h2>
                    </div>
                </div>
                <div class="row text-grey price-box">
                    <div class="col-md-6 py-2 pr-5 text-right story-price prices">
                        <h1>Повний день</h1>
                        <h6>- 12 годин зйомки</h6>
                        <h6>- повна обробка усіх фото (не менше 700)</h6>
                        <h6>- термін готовності 1 - 2 місяці</h6>
                        <h6>- ретуш великих портретів</h6>
                        <h6>- знижка на loveStory 50%</h6>
                        <h2>10500 грн</h2>
                    </div>
                    <div class="col-md-5 ml-1 py-2 pl-5 text-left studio-price prices">
                        <h1>Індивідуальна</h1>
                        <h6 class="mt-3">Умови та Прайс розглядаються в залежності від побажань</h6>
                        <h6 class="mt-50">Потрібна підказка?</h6>
                        <div class="row px-3">
                            <a href="https://www.instagram.com/sysoevphoto/" target="_blank" class="mx-2"><i class="fa fa-2x fa-instagram"></i></a>
                            <a href="https://t.me/sysoevphoto" target="_blank"><i class="fa fa-2x fa-telegram"></i></a>
                        </div>
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
