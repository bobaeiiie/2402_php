require('./bootstrap');

import { createApp } from 'vue';
import router from './router';
import store from './store';
import AppComponent from '../components/AppComponent.vue';

createApp({
    components: {
        AppComponent,
    }
})
.use(router)
.use(store)
.mount('#app');