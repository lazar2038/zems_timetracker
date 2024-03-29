import './bootstrap';
import { createApp } from 'vue'
import router from './routes/index.js'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import { faPlus } from "@fortawesome/free-solid-svg-icons";
import { faPen } from "@fortawesome/free-solid-svg-icons";
import { faTrash } from "@fortawesome/free-solid-svg-icons";
import { faXmark } from "@fortawesome/free-solid-svg-icons";
import { faClock } from "@fortawesome/free-regular-svg-icons";

import { TailwindPagination } from 'laravel-vue-pagination';


library.add( faPlus, faPen, faTrash, faXmark, faClock )

const app = createApp({})

app.component('font-awesome-icon', FontAwesomeIcon)
app.component('Pagination', TailwindPagination)
app.use(router)



app.mount('#app')
