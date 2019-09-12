// app.js

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import FontAwesome from '@fortawesome/fontawesome-free/css/all.min.css';
import Moment from 'moment';

import App from './components/App';
Vue.use(
    VueRouter,
    VueAxios,
    axios,
    FontAwesome,
    Moment
);

import Cashier from './components/cashier/Cashier';
import Data from './components/data/Data';
import History from './components/history/History';
import Dashboard from './components/dashboard/Dashboard';

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
    }
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
