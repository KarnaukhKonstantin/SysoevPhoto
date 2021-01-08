<template>
    <section>
        <div class="row justify-content-between align-items-center mx-3 mt-3">
            <h6 class="name">Stanislav Sysoev</h6>

<!--            <transition name="fade">-->
<!--                <div class="row menu t" v-if="showMenu">-->
<!--                    <span class="mx-1" @click="[showGallery = true, showPriceList = false]">Портфолио</span>-->
<!--                    <span class="mx-1" @click="showPrice()">Цены</span>-->
<!--                    <span class="mx-1">Контакты</span>-->
<!--                </div>-->
<!--            </transition>-->
            <div>
                <div class="row justify-content-left align-items-center mx-3">
                    <a href="https://www.facebook.com/dchnmkn"><i class="fa fa-facebook mr-2"></i></a>
                    <a href=""><i class="fa fa-youtube mr-2"></i></a>
                    <a href="https://www.instagram.com/sysoevphoto/" target="_blank"><i class="fa fa-instagram mr-2"></i></a>
                    <a href="https://t.me/sysoevphoto"><i class="fa fa-telegram mr-2"></i></a>
<!--                    <button class="btn btn-menu ml-3" type="button" @click="openMenu()">-->
<!--                        <i class="fa fa-th"></i>-->
<!--                    </button>-->
                </div>
            </div>
        </div>

        <gallery v-if="showGallery"></gallery>
        <price-list v-if="showPriceList"></price-list>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-1">
                    <div class="row d-flex flex-column align-items-start justify-content-start sidebar pl-5">
                        <ul>
                            <router-link class="d-block" :to="{ name: 'main'}" tag="a">
                                <li class="line-main">Main</li>
                            </router-link>
                        </ul>
                        <ul>
                            <router-link class="d-block" :to="{ name: 'about'}" tag="a">
                                <li class="line-about">About</li>
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
                            <router-link class="d-block" :to="{ name: 'contacts'}" tag="a">
                                <li class="line-contacts">Contacts</li>
                            </router-link>
                        </ul>
                    </div>
                </div>

                <div class="col-md-11">
                    <router-view></router-view>
                </div>

            </div>
        </div>
    </section>
</template>
<script>
export default {
    data() {
        return {
            showMenu: false,
            showGallery: false,
            showPriceList: false,
            fullImageSource: '',
        }
    },
    mounted() {
        //
    },
    methods: {
        showPage(item) {
            // this.$refs.fullpage.$fullpage.moveNext();
        },
        moveNext() {
            this.$refs.example.$fullpage.moveNext(); //Move to the next page
        },
        openMenu() {
            Bus.$emit('open-menu');
            this.showPriceList = false;
            this.showMenu = !this.showMenu;
            this.showGallery = this.showMenu ? this.showGallery = true : this.showGallery = false;
            this.$root.check();
        },
        showPrice() {
            this.showGallery = false;
            this.showPriceList = true;
        }
    }
}
</script>
<style type="text/css">
.name {
    font-size: 2.0rem;
    letter-spacing: 0.1em;
    position: relative;
    z-index: 1000;
}
.page-container {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
}
.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */ {
    opacity: 0;
}
a {
    text-decoration: none;
    color: #fff !important;
    font-size: 20px;
}
a :hover {
    text-decoration: none;
    color: #fff !important;
}
i {
    color: #fff;
}

.sidebar {
    margin-top: 550%;
}

ul {
    padding: 0;
    cursor: pointer;
}
li {
    position: relative;
    display: inline-block;
}
li:after {
    content: "";
    position: absolute;
    left:0;
    top: 100%;
    width: 20px;
    height: 2px;
    background-color: #7a3f3e;
    transition: width .3s ease-in-out;
}
.line-main:hover:after {
    width: 45px;
}
.line-about:hover:after {
    width: 55px;
}
.line-services:hover:after, .line-contacts:hover:after {
    width: 80px;
}

/*#scroll-down{*/
/*    transform: rotate(90deg);*/
/*    margin-top: 200%*/
/*}*/
/*#scroll-line {*/
/*    transform: rotate(90deg);*/
/*    margin-top: 20px;*/
/*}*/
#scroll-line p {
    position: relative;
    display: inline-block;
}
#scroll-line p:after {
    content: "";
    position: absolute;
    left:0;
    top: 100%;
    height: 5px;
    background-color: #7a3f3e;
    width: 100px;
    transition: width .3s ease-in-out;
}
</style>
