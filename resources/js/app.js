import './bootstrap';
import { createApp } from 'vue'
import App from './layouts/App.vue'
import router from './routes/index.js'
import { TailwindPagination } from 'laravel-vue-pagination'

const app = createApp(App)

app.component('Pagination', TailwindPagination)
app.use(router)
app.mount('#app')
