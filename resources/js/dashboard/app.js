import Vue from 'vue';
import Router from './Router.js';
import Layout from './Layouts/Layout.vue';
import 'vuetify/dist/vuetify.min.css'

import Vuetify from 'vuetify'
Vue.use(Vuetify)

const app = new Vue({
    el: '#main',
    vuetify: new Vuetify({}),
    router: Router,
    components: { Layout }
})
export default new Vuetify(app)