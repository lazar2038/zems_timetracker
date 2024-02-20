import './bootstrap';
import { createApp } from 'vue'
import App from './layouts/App.vue'
import router from './routes/index.js'

import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import { faPlus } from "@fortawesome/free-solid-svg-icons";

library.add(faPlus)

const app = createApp(App)

app.component('font-awesome-icon', FontAwesomeIcon)
app.use(router)
app.mount('#app')
