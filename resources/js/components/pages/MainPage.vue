<template>
    <transition appear name="fade" :duration="20000">
        <div class="row pt-5 site">
            <div class="col-md-2">
                <div class="row px-3 title title--top">
                    <h1 class="title__text js-letter" style="transform: translateX(0%) translateZ(0px);">
                        СТАНІСЛАВ<br>СИСОЄВ
                    </h1>
                    <div class="business-title pt-3">
                        <h6>фотограф /</h6>
                        <h6>happy maker.</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-10 main-block px-0 bg-black h-100">
                <img src="assets/images/wedding-as.jpg" class="img-fluid">
            </div>
        </div>
    </transition>
</template>
<script>
export default {
    data () {
        return {
            pageNumber: 1,
            opened: false,
        }
    },
    mounted() {
        //
    }
}
</script>
