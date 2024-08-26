
// require('./bootstrap');
import './bootstrap';

import { createApp } from 'vue'
import {createPinia} from 'pinia'
import router from './router'
import App from './App.vue'
import "bootstrap/dist/css/bootstrap.min.css"
import roleDirective from './directives/role';

const pinia = createPinia()
const app = createApp(App)

app.use(pinia)
app.use(router)
app.directive('role', roleDirective);
app.mount('#app')
