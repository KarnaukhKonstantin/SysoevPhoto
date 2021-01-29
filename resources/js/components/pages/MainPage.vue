<template>
    <transition appear name="fade" :duration="10000">
        <div class="row pt-5 site">
            <div class="col-md-4">
                <div class="row px-3 title title--top">
                    <h1 class="title__text js-letter" style="transform: translateX(0%) translateZ(0px);">
                        СТАНІСЛАВ<br>СИСОЄВ
                    </h1>
                    <div class="border b-1">
                        <span></span>
                    </div>
                    <div class="border b-2">
                        <span></span>
                    </div>
                    <div class="business-title pt-3">
                        <h3>фотограф /</h3>
                        <h3>happy maker.</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-8 px-5 main-block"></div>
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
        Bus.$on('open-menu', data => {
            this.opened = !this.opened;
        });
    }
}
</script>
