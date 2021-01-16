<template>
    <transition appear name="fade" :duration="10000">
        <div class="row pt-5">
            <div class="col-md-4">
                <div class="row px-3 title title--top">
                    <h1 class="title__text js-letter" style="transform: translateX(0%) translateZ(0px);">
                        Price List
                    </h1>
                    <div class="border b-1">
                        <span></span>
                    </div>
                    <div class="border b-2">
                        <span></span>
                    </div>
                    <div class="business-title pt-3">
                        <h3>Actual basic price /</h3>
                        <h3>2021</h3>
                    </div>
                </div>
            </div>
            <!--            <div class="col-md-4 px-5 main-block"></div>-->
            <div class="col-md-8 px-5 main-block services">
                <div class="row text-grey">
                    <div class="col-md-4 offset-md-2 my-1 pr-3 text-right wedding-price">
                        <h3>Wedding</h3>
                        <h1>300$</h1>
                    </div>
                    <div class="col-md-4 my-1 ml-2 pl-3 text-left family-price">
                        <h3>Family</h3>
                        <h1>100$</h1>
                    </div>
                    <div class="col-md-4 offset-md-2 my-1 pr-3 text-right story-price">
                        <h3>Story</h3>
                        <h1>150$</h1>
                    </div>
                    <div class="col-md-4 my-1 ml-2 pl-3 text-left studio-price">
                        <h3>Studio</h3>
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

        }
    },
    methods: {

    }
}
</script>
