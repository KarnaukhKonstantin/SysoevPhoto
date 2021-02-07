/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router';
import router from './routes';
import VueScrollReveal from 'vue-scroll-reveal';
import rumuslog from 'rumuslog';
import debounce from 'lodash/debounce';
import VueMasonry from 'vue-masonry-css'


window.Vue = require('vue');
window.Bus = new Vue;

Vue.use(VueRouter);
Vue.use(VueScrollReveal, {
    class: 'v-scroll-reveal',
    duration: 2000,
    scale: 1,
    distance: '40px',
    mobile: false,
    rotate: {
        x: 0,
        y: 0,
        z: 0
    },
});
Vue.use(rumuslog);
Vue.use(VueMasonry);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('landing-page', require('./components/LandingPage.vue').default);
Vue.component('admin-page', require('./components/AdminPage.vue').default);
Vue.component('mobile-view', require('./components/MobileView.vue').default);

Vue.component('admin-header', require('./components/partials/AdminHeader.vue').default);
Vue.component('admin-sidebar', require('./components/partials/AdminSidebar.vue').default);
Vue.component('uploader-page', require('./components/partials/Uploader.vue').default);


Vue.component('navigate-page', require('./components/partials/Navigate.vue').default);
Vue.component('footer-page', require('./components/partials/Footer.vue').default);
Vue.component('header-menu', require('./components/partials/HeaderMenu.vue').default);
Vue.component('gallery', require('./components/partials/Gallery.vue').default);
Vue.component('other-gallery', require('./components/partials/OtherGallery.vue').default);
Vue.component('wedding-gallery', require('./components/partials/WeddingGallery.vue').default);
Vue.component('price-list', require('./components/partials/PriceList.vue').default);

Vue.component('Main-page', require('./components/pages/MainPage.vue').default);
Vue.component('Services-page', require('./components/pages/Services.vue').default);
Vue.component('Contact-page', require('./components/pages/ContactPage.vue').default);
Vue.component('Works-page', require('./components/pages/Works.vue').default);
Vue.component('About-page', require('./components/pages/AboutMe.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,

    data: {
        pages: [
            '/',
            '/services',
            '/portfolio',
            '/price',
            '/contacts'
        ],
    },
    methods: {
        handleScroll: function (event) {
            console.log(this.$route.path !== '/gallery');
            if (this.$route.path !== '/gallery' && this.$route.path !== '/other-gallery') {
                if (event.deltaY > 0) {
                    this.start = this.start < 4 ? this.start + 1 : this.start = 0;
                } else {
                    this.start = this.start > 0 ? this.start - 1 : this.start = 4;
                }
                this.$router.push(this.pages[this.start]).catch(()=>{});
            }
            // console.log(this.pages);
        },
        check() {
            rumuslog.checkLog();
        }
    },
    mounted() {
        this.handleDebouncedScroll = debounce(this.handleScroll, 10000);
        window.addEventListener('wheel', this.handleScroll);
    },
    created() {

    }
});
