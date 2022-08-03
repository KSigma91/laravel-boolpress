require('./bootstrap');

//window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'
//import { component } from 'vue/types/umd';
import App from './App.vue';

import PageHome from './pages/PageHome.vue';
import PageBlog from './pages/PageBlog.vue';
import PageAbout from './pages/PageAbout.vue';
import PageContacts from './pages/PageContacts.vue';
import PageShow from './pages/PageShow.vue';
import Page404 from './pages/Page404.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: PageHome
    },
    {
        path: '/blog',
        name: 'blog',
        component: PageBlog
    },
    {
        path: '/about',
        name: 'about',
        component: PageAbout
    },
    {
        path: '/contacts',
        name: 'contacts',
        component: PageContacts
    },
    {
        // pagina di dettaglio dei post
        path: '/blog/:slug',
        name: 'show',
        component: PageShow,
        props: true
    },
    {
        path: '*',
        name: 'page404',
        component: Page404
    }
];

const router = new VueRouter({
    routes,
    mode: 'history'
});

Vue.use(VueRouter);

const app = new Vue({
    el: '#root',
    render: h => h(App),
    router
});
