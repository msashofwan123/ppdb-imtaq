import './bootstrap';
import './bootstrap';
import Swal from 'sweetalert2';
window.Swal = Swal;

import {createApp} from 'vue'

import App from './app.vue'

const app = createApp(App)

app.mount('#appli')