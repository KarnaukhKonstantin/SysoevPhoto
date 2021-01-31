<template>
    <section>
        <div class="landing-content">
            <div class="row justify-content-between align-items-center mx-4 mt-4">
<!--                <h6 class="name">Станіслав Сисоєв</h6>-->
            </div>

            <div class="container-fluid">
                <div class="row row-rotate">
                    <div class="col-sm-12 col-md-2 col-lg-1">
                        <div class="row pl-5">
                            <img src="assets/images/sysoev-logo.png" class="img-thumbnail" width="100">
                        </div>
                        <div class="row social-sidebar">
                            <a href="https://www.facebook.com/dchnmkn"><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-youtube"></i></a>
                            <a href="https://www.instagram.com/sysoevphoto/" target="_blank"><i class="fa fa-instagram"></i></a>
                            <a href="https://t.me/sysoevphoto"><i class="fa fa-telegram"></i></a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-8 col-lg-10">
                        <router-view></router-view>
                    </div>

                    <div class="col-sm-12 col-md-2 col-lg-1">
                        <div class="row navigate-sidebar pr-5">
                            <ul>
                                <router-link class="d-block" :to="{ name: 'main'}" tag="a">
                                    <li class="line-main">Головна</li>
                                </router-link>
                            </ul>
                            <ul>
                                <router-link class="d-block" :to="{ name: 'services'}" tag="a">
                                    <li class="line-services">Послуги</li>
                                </router-link>
                            </ul>
                            <ul>
                                <router-link class="d-block" :to="{ name: 'portfolio'}" tag="a">
                                    <li class="line-portfolio">Портфоліо</li>
                                </router-link>
                            </ul>
                            <ul>
                                <router-link class="d-block" :to="{ name: 'price'}" tag="a">
                                    <li class="line-price">Розцінки</li>
                                </router-link>
                            </ul>
                            <ul>
                                <router-link class="d-block" :to="{ name: 'contacts'}" tag="a">
                                    <li class="line-contacts">Контакти</li>
                                </router-link>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mobile-content">
            <mobile-view></mobile-view>
        </div>
    </section>
</template>
<script>
import debounce from "lodash/debounce";

export default {
    props: {
        wheelTouch: Boolean
    },
    data() {
        return {
            fullImageSource: '',
            start: 0,
        }
    },
    mounted() {
        //
    },
    methods: {
        //
    },
    created() {
        //
    }
}
</script>
