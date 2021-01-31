
import VueRouter from 'vue-router';


let routes = [
    {
        path: '/',
        component: require('./components/pages/MainPage.vue').default,
        name: 'main',
    },
    {
        path: '/about',
        component: require('./components/pages/AboutMe.vue').default,
        name: 'about',
    },
    {
        path: '/services',
        component: require('./components/pages/Services.vue').default,
        name: 'services',
    },
    {
        path: '/portfolio',
        component: require('./components/pages/Portfolio.vue').default,
        name: 'portfolio',
    },
    {
        path: '/gallery',
        component: require('./components/partials/Gallery.vue').default,
        name: 'gallery',
    },
    {
        path: '/price',
        component: require('./components/partials/PriceList.vue').default,
        name: 'price',
    },
    {
        path: '/contacts',
        component: require('./components/pages/ContactPage.vue').default,
        name: 'contacts',
    }
];

let router = new VueRouter ({
    routes,
    mode: 'history',
    linkActiveClass: 'is-active'
});

export default router;
