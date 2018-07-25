export default[
    { path: '', redirect: '/index' },
    { path: '/index', component: require('./page/App.vue') },
    { path: '/list', component: require('./page/List.vue') },
    { path: '/detail/:id', component: require('./page/Detail.vue') },
    { path: '/page1', component: require('./page/page1.vue') },
    { path: '/page2', component: require('./page/page2.vue') }
];