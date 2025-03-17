import './bootstrap';
import Alpine from 'alpinejs'
import Mask from "@ryangjchandler/alpine-mask";
import screen from '@victoryoalli/alpinejs-screen';
import 'flowbite';
import { createApp } from 'vue';
import axios from 'axios';
import Helpers from './plugins/helpers';
import Toast, { POSITION } from "vue-toastification";
import '../../public/css/style.css';
import $ from 'jquery';
window.$ = window.jQuery = $;
import select2 from 'select2';

axios.defaults.baseURL                            = __var_axios_base_url;
axios.defaults.headers.common['X-Requested-With'] = "XMLHttpRequest";
axios.defaults.headers.post  ['X-CSRF-TOKEN']     = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Vue.js Components
import PostProject from './components/main/post/project/project.vue';
import EditProject from './components/main/account/projects/edit.vue';

// Get app element
const app_element = document.getElementById("app");
const app = createApp({});

app.component('post-project', PostProject);
app.component('edit-project', EditProject);

app.use(Helpers);
app.use(Toast, {
    position: POSITION.BOTTOM_CENTER
});
if (app_element) {
    app.mount('#app');
}

Alpine.plugin(Mask);
Alpine.plugin(screen);

window.Alpine = Alpine;
window.Alpine.start();