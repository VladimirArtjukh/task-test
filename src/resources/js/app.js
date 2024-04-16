import Vue from 'vue';
import App from './App.vue';
import router from './router';
import 'bootstrap/dist/css/bootstrap.min.css';
import '../css/app.css';

const app = new Vue({
    el: '#app',
    router,
    render: h => h(App)
});
