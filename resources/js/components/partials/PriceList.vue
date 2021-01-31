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
            <div class="col-md-10 main-block px-0 services">
                <div class="row text-grey price-box pt-20">
                    <div class="col-md-4 offset-md-2 my-1 pr-3 text-right wedding-price">
                        <h3>Весілля</h3>
                        <h1>300$</h1>
                    </div>
                    <div class="col-md-4 my-1 ml-2 pl-3 text-left family-price">
                        <h3>Сімейна</h3>
                        <h1>100$</h1>
                    </div>
                    <div class="col-md-4 offset-md-2 my-1 pr-3 text-right story-price">
                        <h3>loveStory</h3>
                        <h1>150$</h1>
                    </div>
                    <div class="col-md-4 my-1 ml-2 pl-3 text-left studio-price">
                        <h3>Студійна</h3>
                        <h1>200$</h1>
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
