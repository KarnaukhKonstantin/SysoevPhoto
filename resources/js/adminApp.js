require('./bootstrap');

import VueRouter from 'vue-router';
import router from './adminRoutes';


window.Vue = require('vue');
window.Bus = new Vue;

Vue.use(VueRouter);

Vue.component('admin-page', require('./components/AdminPage.vue').default);

Vue.component('admin-header', require('./components/partials/AdminHeader.vue').default);
Vue.component('admin-sidebar', require('./components/partials/AdminSidebar.vue').default);
Vue.component('uploader-page', require('./components/partials/Uploader.vue').default);


const app = new Vue({
    el: '#admin-app',
    router,
});
