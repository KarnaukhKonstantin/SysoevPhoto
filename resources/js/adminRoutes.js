import VueRouter from 'vue-router';

let routes = [
    {
        path: '/wedding',
        component: require('./components/admin/Wedding.vue').default,
        name: 'wedding',
    },
    {
        path: '/other',
        component: require('./components/admin/Other.vue').default,
        name: 'other',
    }
];

let adminRouter = new VueRouter ({
    routes,
    mode: 'history',
    linkActiveClass: 'is-active'
});

export default adminRouter;
