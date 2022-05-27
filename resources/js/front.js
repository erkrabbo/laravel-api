window.Vue = require('vue');
window.Axios = require('axios');

import App from './views/app';
import Show from './components/Show';
import Home from './components/Home';
import Index from './components/Index';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const routes = [
    { path: '/', name: 'home', component: Home},
    { path: '/posts', name: 'index', component: Index},
    { path: '/show/:slug', name:'show', component: Show, props: true },
  ]

const router = new VueRouter({
    mode:'history',
routes,
})

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
});

