<template>
    <transition appear name="fade" :duration="20000">
        <div class="row pt-5 site">
            <div class="col-md-2">
                <div class="row px-3 title title--top">
                    <h1 class="title__text js-letter" style="transform: translateX(0%) translateZ(0px);">
                        МОЇ<br>РОБОТИ
                    </h1>
                    <div class="business-title pt-3">
                        <h6>зберігаємо</h6>
                        <h6>найкращі моменти</h6>
                    </div>

                    <div class="business-title pt-3 text-right">
                        <router-link class="d-block" :to="{ name: 'gallery'}" tag="a">
                            <h6>...тут більше</h6>
                        </router-link>
                    </div>
                </div>
            </div>
            <div class="col-md-10 main-block px-3">
                <div class="row py-1">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 px-1">
                                <img src="assets/images/portfolio/family.jpg" class="img-fluid" width="100%">
                            </div>
                            <div class="col-md-6 px-1">
                                <img src="assets/images/portfolio/lovestory.jpg" class="img-fluid" width="100%">
                            </div>
                            <div class="col-md-6 px-1">
                                <img src="assets/images/portfolio/wedding-as.jpg" class="img-fluid" width="100%">
                            </div>
                            <div class="col-md-6 px-1">
                                <img src="assets/images/portfolio/wedding.jpg" class="img-fluid" width="100%">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 px-1">
                                <img src="assets/images/portfolio/wedding2.jpg" class="img-fluid" width="100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 px-1">
                                <img src="assets/images/portfolio/fon2.jpg" class="img-fluid" width="100%">
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="col-md-6 px-1">
                                <img src="assets/images/portfolio/pair.jpg" class="img-fluid" width="100%">
                            </div>
                            <div class="col-md-6 px-1">
                                <img src="assets/images/portfolio/kid.jpg" class="img-fluid" width="100%">
                            </div>
                            <div class="col-md-6 px-1">
                                <img src="assets/images/portfolio/sysoev_stan.jpg" class="img-fluid" width="100%">
                            </div>
                            <div class="col-md-6 px-1">
                                <img src="assets/images/portfolio/airport.jpg" class="img-fluid" width="100%">
                            </div>
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
    }
}
</script>
