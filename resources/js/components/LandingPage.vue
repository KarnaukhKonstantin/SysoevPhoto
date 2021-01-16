<template>
    <section class="landing-content">
        <div class="row justify-content-between align-items-center mx-4 mt-4">
            <h6 class="name">Stanislav Sysoev</h6>
        </div>

        <div class="container-fluid p-0 m-0 ">
            <div class="row mobile-sidebar p-0 m-0">
                <div class="col-md-12 text-right p-0 m-0">
                    <button type="button" class="btn btn-outline-light mt-3 mx-3" @click="openMobMenu()">
                        <i class="fa fa-th-large"></i>
                    </button>
                    <div class="row mobile-router p-0 m-0 modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="mob-router">
                        <div class="modal-dialog modal-dialog modal-xl" role="document">
                            <button type="button" class="btn btn-outline-secondary mt-4" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                            </button>
                            <div class="modal-content mobile-menu">
                                <router-link class="d-block" :to="{ name: 'main'}" tag="a" data-dismiss="modal">
                                    <li>Main</li>
                                </router-link>
                                <router-link class="d-block" :to="{ name: 'services'}" tag="a" data-dismiss="modal">
                                    <li>Services</li>
                                </router-link>
                                <router-link class="d-block" :to="{ name: 'portfolio'}" tag="a" data-dismiss="modal">
                                    <li>Portfolio</li>
                                </router-link>
                                <router-link class="d-block" :to="{ name: 'price'}" tag="a" data-dismiss="modal">
                                    <li>Price-list</li>
                                </router-link>
                                <router-link class="d-block" :to="{ name: 'contacts'}" tag="a" data-dismiss="modal">
                                    <li>Contacts</li>
                                </router-link>
                                <div class="row justify-content-center align-items-end mt-40vh">
                                    <img src="assets/images/sysoev-logo.png" class="img-thumbnail" width="100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row row-rotate">
                <div class="col-sm-12 col-md-1">
                    <div class="row social-sidebar">
                        <a href="https://www.facebook.com/dchnmkn"><i class="fa fa-facebook mr-2"></i></a>
                        <a href=""><i class="fa fa-youtube mr-2"></i></a>
                        <a href="https://www.instagram.com/sysoevphoto/" target="_blank"><i class="fa fa-instagram mr-2"></i></a>
                        <a href="https://t.me/sysoevphoto"><i class="fa fa-telegram mr-2"></i></a>
                    </div>
                </div>

                <div class="col-sm-12 col-md-10">
                    <router-view></router-view>
                </div>

                <div class="col-sm-12 col-md-1">
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
        openMobMenu() {
            $('#mob-router').modal('show');
        },
        hideMobMenu() {
            $('#mob-router').modal('hide');
        }
    }
}
</script>
