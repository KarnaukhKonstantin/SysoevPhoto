<template>
    <transition appear name="fade" :duration="10000">
        <div class="row pt-5">
            <div class="col-md-4">
                <div class="row px-3 d-flex flex-column title title--top">
                    <h1 class="title__text js-letter" style="transform: translateX(0%) translateZ(0px);">
                        About Me
                    </h1>
                    <div class="border b-1">
                        <span></span>
                    </div>
                    <div class="border b-2">
                        <span></span>
                    </div>
                    <div class="business-title pt-3">
                        <h3>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-md-8 px-5 main-block">
    <!--            <img src="assets/images/sysoev.jpg" width="100%">-->
            </div>
        </div>
    </transition>
</template>
<script>
export default {
    data () {
        return {
            pageNumber: 2,
        }
    }
}
</script>
