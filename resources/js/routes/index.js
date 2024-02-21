import DashboardIndex from "../components/dashboard/Index.vue"
import ProjectsIndex from "../components/projects/Index.vue"
import ProjectsCreate from "../components/projects/Create.vue"
import ProjectsShow from "../components/projects/Show.vue"

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
            'actionButtons' : {
                'create' : {
                    'route' : 'projects.create',
                    'classes':
                        'button green',
                    'icon':
                        ['fas', 'plus'],
                    'text': 'Добавить'
                }
            },
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
        'path' : '/projects/:id',
        'name' : 'projects.show',
        'meta' : {
            'title' : 'Проекты.',
            'actionButtons' : {
                'edit' : {
                    'route' : 'projects.create',
                    'classes':
                        'button yellow',
                    'icon':
                        ['fas', 'plus'],
                    'text': 'Изменить'
                }
            },
        },
        component: ProjectsShow
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


