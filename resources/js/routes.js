
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
        component: require('./components/partials/Gallery.vue').default,
        name: 'portfolio',
    },
    {
        path: '/contacts',
        component: require('./components/pages/ContactPage.vue').default,
        name: 'contacts',
    }
];

let router = new VueRouter ({
    routes,
    linkActiveClass: 'is-active'
});

export default router;
