import DashboardIndex from "../components/dashboard/Index.vue"

import ProjectsIndex from "../components/projects/Index.vue"
import ProjectsCreate from "../components/projects/Create.vue"
import ProjectsShow from "../components/projects/Show.vue"
import ProjectsDelete from "../components/projects/Delete.vue"
import ProjectsEdit from "../components/projects/Edit.vue"


import TasksIndex from "../components/tasks/Index.vue"
import TasksCreate from "../components/tasks/Create.vue"
import TasksShow from "../components/tasks/Show.vue"
import TasksDelete from "../components/tasks/Delete.vue"
import TasksEdit from "../components/tasks/Edit.vue"


import TimelinesIndex from "../components/timelines/Index.vue"
import TimelinesCreate from "../components/timelines/Create.vue"


import { createRouter, createWebHistory } from 'vue-router'


const routes = [
    {
        path : '/',
        name : 'main',
        meta : {
            title : 'Главная',
        },
        component: DashboardIndex
    },

    {
        path : '/projects',
        name : 'projects.index',
        meta : {
            title : 'Проекты',
            actionButtons : {
                create : {
                    route : 'projects.create',
                    classes:
                        'button green',
                    icon:
                        ['fas', 'plus'],
                    text: 'Добавить'
                }
            },
        },

        component: ProjectsIndex
    },

    {
        path : '/projects/create',
        name : 'projects.create',
        meta : {
            title : 'Проекты. Создание.',
        },
        component: ProjectsCreate
    },

    {
        path : '/projects/:id',
        name : 'projects.show',
        meta : {
            title : 'Страница проекта',
            actionButtons : {
                edit : {
                    route : 'projects.edit',
                    classes:
                        'button yellow',
                    icon:
                        ['fas', 'pen'],
                    text: 'Изменить'
                },
                delete : {
                    route : 'projects.delete',
                    classes:
                        'button red',
                    icon:
                        ['fas', 'trash'],
                    text: 'Удалить проект'
                }
            },
        },
        component: ProjectsShow
    },

    {
        path : '/projects/:id/edit',
        name : 'projects.edit',
        meta : {
            title : 'Изменение деталей проекта',
        },
        component: ProjectsEdit
    },

    {
        path : '/projects/:id/delete',
        name : 'projects.delete',
        meta : {
            title : 'Удалить проект'
        },
        component: ProjectsDelete
    },

    {
        path : '/tasks',
        name : 'tasks.index',
        meta : {
            title : 'Задачи',
            actionButtons : {
                create : {
                    route : 'tasks.create',
                    classes:
                        'button green',
                    icon:
                        ['fas', 'plus'],
                    text: 'Добавить'
                }
            },
        },
        component: TasksIndex
    },
    {
        path : '/tasks/create',
        name : 'tasks.create',
        meta : {
            title : 'Задачи. Создание.',
        },
        component: TasksCreate
    },

    {
        path : '/tasks/:id',
        name : 'tasks.show',
        meta : {
            title : 'Страница задачи',
            actionButtons : {
                edit : {
                    route : 'tasks.edit',
                    classes:
                        'button yellow',
                    icon:
                        ['fas', 'pen'],
                    text: 'Изменить'
                },
                delete : {
                    route : 'tasks.delete',
                    classes:
                        'button red',
                    icon:
                        ['fas', 'trash'],
                    text: 'Удалить задачу'
                }
            },
        },
        component: TasksShow
    },

    {
        path : '/tasks/:id/edit',
        name : 'tasks.edit',
        meta : {
            title : 'Изменение деталей задания',
        },
        component: TasksEdit
    },

    {
        path : '/tasks/:id/delete',
        name : 'tasks.delete',
        meta : {
            title : 'Удалить задание'
        },
        component: TasksDelete
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

const breadcrumbs = {
    'projects.index' : ['main', 'projects.index']
};

export default createRouter({
    history: createWebHistory(),
    routes,
    breadcrumbs
})


