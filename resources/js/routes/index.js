import DashboardIndex from "../components/dashboard/Index.vue"
import ProjectsIndex from "../components/projects/Index.vue"
import ProjectsCreate from "../components/projects/Create.vue"

import { createRouter, createWebHistory } from 'vue-router'


const routes = [
    {
        'path' : '/',
        'name' : 'main',
        'meta' : {
            'title' : 'Главная',
        },
        component: DashboardIndex
    },
    {
        'path' : '/projects',
        'name' : 'projects.index',
        'meta' : {
            'title' : 'Проекты',
        },
        component: ProjectsIndex
    },
    {
        'path' : '/projects/create',
        'name' : 'projects.create',
        'meta' : {
            'title' : 'Проекты. Создание.',
        },
        component: ProjectsCreate
    },
]


export default createRouter({
    history: createWebHistory(),
    routes
})


