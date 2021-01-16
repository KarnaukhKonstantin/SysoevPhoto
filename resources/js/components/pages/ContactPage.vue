<template>
    <transition appear name="fade" :duration="10000">
        <div class="row pt-5">
            <div class="col-md-4">
                <div class="row px-3 title title--top">
                    <h1 class="title__text js-letter"
                        style="transform: translateX(0%) translateZ(0px); word-break: break-all;white-space: nowrap;color: rgb(255, 255, 255);
    mix-blend-mode: difference;">
                        Get In Touch
                    </h1>
                    <div class="border b-1">
                        <span></span>
                    </div>
                    <div class="border b-2">
                        <span></span>
                    </div>
                    <div class="business-title pt-3">
                        <h3>0661906833</h3>
                        <h3>@sysoevphoto</h3>
                        <h3>https://t.me/sysoevphoto</h3>
                        <h3>https://www.facebook.com/dchnmkn</h3>
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
            pageNumber: 4,
        }
    }
}
</script>
