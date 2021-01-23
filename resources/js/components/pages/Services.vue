<template>
    <transition appear name="fade" :duration="10000">
        <div class="row pt-5">
            <div class="col-md-4">
                <div class="row px-3 title title--top">
                    <h1 class="title__text js-letter" style="transform: translateX(0%) translateZ(0px);">
                        My Services
                    </h1>
                    <div class="border b-1">
                        <span></span>
                    </div>
                    <div class="border b-2">
                        <span></span>
                    </div>
                    <div class="business-title pt-3">
                        <h3>wedding photo /</h3>
                        <h3>family photo</h3>
                    </div>
                </div>
            </div>
<!--            <div class="col-md-4 px-5 main-block"></div>-->
            <div class="col-md-8 px-5 main-block services">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-4 offset-lg-2 my-1 pr-1">
                        <img src="assets/images/wedding.jpg" width="100%">
                    </div>
                    <div class="col-md-6 col-lg-4 my-1 pl-1">
                        <img src="assets/images/family.jpg" width="100%">
                    </div>
                    <div class="col-md-6 col-lg-4 offset-lg-2 my-1 pr-1">
                        <img src="assets/images/lovestory.jpg" width="100%">
                    </div>
                    <div class="col-md-6 col-lg-4 my-1 pl-1">
                        <img src="assets/images/fon2.jpg" width="100%">
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
            pageNumber: 3,
        }
    },
    created() {
        // console.log('check w');
    }
}
</script>
