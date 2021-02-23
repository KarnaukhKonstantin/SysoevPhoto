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


Vue.component('landing-page', require('./components/LandingPage.vue').default);
Vue.component('mobile-view', require('./components/MobileView.vue').default);

Vue.component('navigate-page', require('./components/partials/Navigate.vue').default);
Vue.component('footer-page', require('./components/partials/Footer.vue').default);
Vue.component('header-menu', require('./components/partials/HeaderMenu.vue').default);
Vue.component('price-list', require('./components/pages/PriceList.vue').default);
Vue.component('gallery', require('./components/galleries/Gallery.vue').default);
Vue.component('other-gallery', require('./components/galleries/OtherGallery.vue').default);

Vue.component('Main-page', require('./components/pages/MainPage.vue').default);
Vue.component('Services-page', require('./components/pages/Services.vue').default);
Vue.component('Contact-page', require('./components/pages/ContactPage.vue').default);
Vue.component('Works-page', require('./components/pages/Works.vue').default);
Vue.component('About-page', require('./components/pages/AboutMe.vue').default);



const app = new Vue({
    el: '#app',
    router,
});
