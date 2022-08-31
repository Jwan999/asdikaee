import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
import Vuex from 'vuex';

import cart from "./cart";
import Navbar from "./components/Navbar";


const router = new VueRouter({routes, mode: "history",});
Vue.use(VueRouter);
Vue.use(Vuex)
const store = new Vuex.Store(cart);

new Vue({
    components: {
        "friends-navbar": Navbar,
    },
    router,
    store,
    el: "#app"
})

