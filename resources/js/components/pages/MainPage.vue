<template>
    <transition appear name="fade" :duration="10000">
        <div class="row pt-5">
            <div class="col-md-4">
                <div class="row px-3 d-flex flex-column title title--top">
                    <h1 class="title__text js-letter" style="transform: translateX(0%) translateZ(0px);">
                        STANISLAV<br>SYSOEV
                    </h1>
                    <div class="border b-1">
                        <span></span>
                    </div>
                    <div class="border b-2">
                        <span></span>
                    </div>
                    <div class="business-title pt-3">
                        <h3>photographer /</h3>
                        <h3>happy maker.</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-8 px-5 main-block">

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
        Bus.$on('open-menu', data => {
            this.opened = !this.opened;
        });
    }
}
</script>
<style>
.title {
    color: #fff;
    position: absolute;
    overflow: hidden;
    top: 50%;
    -webkit-transform: translate3d(0, -50%, 0);
    transform: translate3d(0, -50%, 0);
    z-index: 200;
    /*margin-left: 11%;*/
}
.title__text {
    font-size: 7rem;
    line-height: 1;
    letter-spacing: 0.1em;
    margin-bottom: 1.8rem;
    font-family: "futura_m";
    font-weight: normal;
    text-shadow: 0 10px 30px rgba(2, 11, 22, 0.5);
    transform: translateX(0%) translateZ(0px);
    word-break: break-all;
    white-space: nowrap;
    color: rgb(255, 255, 255);
    mix-blend-mode: difference;
}
.title .border {
    display: inline-block;
    margin-bottom: 1rem;
    width: 100px;
    transform: translateX(0%) translateZ(0px);
    border: 1px solid #7a3f3e !important;
}
.b-2 {
    margin-left: 50px;
}
.business-title {
    color: #fff;
}
.main-block {
    height: 75vh;
}
.menu-info {
    height: 95%;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.5) !important;
}
</style>
