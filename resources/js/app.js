require('./bootstrap');
window.Vue = require('vue').default

window.Vue.module.exports = {
    runtimeCompiler: true
}

// import router from './router'

window.Vue.component('app-init', './layouts/default.vue')

const app = new window.Vue({
    el: '#app',
    // router
});
