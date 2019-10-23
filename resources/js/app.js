// app.js

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import FontAwesome from '@fortawesome/fontawesome-free/css/all.min.css';
import Moment from 'moment';
import Vuex from 'vuex'
import VueSession from 'vue-session';

import App from './components/App';

const options = {
    persist: true
};

Vue.use(
    VueRouter,
    VueAxios,
    axios,
    FontAwesome,
    Moment,
    Vuex
);

Vue.use(VueSession, options);

import Cashier from './components/cashier/Cashier';
import Data from './components/data/Data';
import History from './components/history/History';
import Dashboard from './components/dashboard/Dashboard';
import Login from './components/login/Login';
import NotFound from './components/error/Error404.vue'

const routes = [
    {
        name: 'index',
        path: '/',
        component: Dashboard
    },
    {
        name: 'data',
        path: '/data',
        component: Data
    },
    {
        name: 'history',
        path: '/history',
        component: History
    },
    {
        name: 'cashier',
        path: '/cashier',
        component: Cashier
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'notFound',
        path: '*',
        component: NotFound
    }

];
const router = new VueRouter({mode: 'history', routes: routes});
import menuModules from './modules/menuModules'

const store = new Vuex.Store({
    modules: [menuModules]
});

new Vue({
    el: '#app',
    render: h => h(App),
    router,
    store,
});

