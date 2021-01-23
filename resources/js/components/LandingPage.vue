<template>
    <section>
        <div class="landing-content">
            <div class="row justify-content-between align-items-center mx-4 mt-4">
                <h6 class="name">Stanislav Sysoev</h6>
            </div>

            <div class="container-fluid">
                <div class="row row-rotate">
                    <div class="col-sm-12 col-md-2 col-lg-1">
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
                                    <li class="line-main">Main</li>
                                </router-link>
                            </ul>
                            <ul>
                                <router-link class="d-block" :to="{ name: 'services'}" tag="a">
                                    <li class="line-services">Services</li>
                                </router-link>
                            </ul>
                            <ul>
                                <router-link class="d-block" :to="{ name: 'portfolio'}" tag="a">
                                    <li class="line-services">Portfolio</li>
                                </router-link>
                            </ul>
                            <ul>
                                <router-link class="d-block" :to="{ name: 'price'}" tag="a">
                                    <li class="line-price">Price-list</li>
                                </router-link>
                            </ul>
                            <ul>
                                <router-link class="d-block" :to="{ name: 'contacts'}" tag="a">
                                    <li class="line-contacts">Contacts</li>
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
export default {
    data() {
        return {
            fullImageSource: '',
        }
    },
    mounted() {
        //
    },
    methods: {
        //
    }
}
</script>
