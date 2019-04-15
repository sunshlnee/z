require('./bootstrap')

import store from './store.js'

Vue.component('order', require('./components/order.vue').default)
Vue.component('gallery', require('./components/gallery.vue').default)
Vue.component('dropdown', require('./components/dropdown.vue').default)
Vue.component('cardButton', require('./components/cardButton.vue').default)

var app = new Vue({

    el: '#app',

    store: new Vuex.Store(store),

    created() {

        this.$store.commit('cartCount');

        this.$store.commit('reloadCart');
    }
});
