import DashboardIndex from "../components/dashboard/Index.vue"
import ProjectsIndex from "../components/projects/Index.vue"
import ProjectsCreate from "../components/projects/Create.vue"
import TasksIndex from "../components/tasks/Index.vue"
import TasksCreate from "../components/tasks/Create.vue"
import TimelinesIndex from "../components/timelines/Index.vue"
import TimelinesCreate from "../components/timelines/Create.vue"


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

    {
        'path' : '/tasks',
        'name' : 'tasks.index',
        'meta' : {
            'title' : 'Задачи',
        },
        component: TasksIndex
    },
    {
        'path' : '/tasks/create',
        'name' : 'tasks.create',
        'meta' : {
            'title' : 'Задачи. Создание.',
        },
        component: TasksCreate
    },

    {
        'path' : '/timelines',
        'name' : 'timelines.index',
        'meta' : {
            'title' : 'Таймлайны',
        },
        component: TimelinesIndex
    },
    {
        'path' : '/timelines/create',
        'name' : 'timelines.create',
        'meta' : {
            'title' : 'Таймлайны. Создание.',
        },
        component: TimelinesCreate
    },
]


export default createRouter({
    history: createWebHistory(),
    routes
})


