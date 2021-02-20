<template>
    <transition appear name="fade" :duration="20000">
        <div class="row pt-5 site">
            <div class="col-md-2">
                <div class="row px-3 title title--top">
                    <h1 class="title__text js-letter" style="transform: translateX(0%) translateZ(0px);">
                        Я<br>ПРОПОНУЮ
                    </h1>
                    <div class="business-title pt-3">
                        <h6>весільна фотографія /</h6>
                        <h6>сімейна фотографія /</h6>
                        <h6>loveStory /</h6>
                        <h6>індивідуальна</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-10 main-block px-0 services">
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
    mounted() {
        //
    },
    created() {
        //
    }
}
</script>
