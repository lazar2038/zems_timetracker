<template>

    <ul>
        <li v-for="project in projects.data" class="mb-3 border-b-2 pb-4">
            <div>
               <router-link :to=" { name : 'projects.show', params : { id : project.id } } ">
                   Проект #{{ project.id }} <span class="font-bold">{{ project.title }}</span>
                </router-link>

            </div>
            <div>Общее затраченное время: {{ project.durationString }}</div>
            <ul class="ml-3">
                <li v-for="task in project.tasks" class="my-3 border-l-2 border-green-500 pl-2">Задача: <span class="font-italic">{{ task.title }}</span>
                </li>
            </ul>
        </li>
    </ul>

    <Pagination
        :data="projects"
        :limit="5"
        @pagination-change-page="getProjects"
    />

</template>

<script setup>

    import useProjects from "../../composables/projects.js"

    const { projects, getProjects, actionButtons } = useProjects()

    getProjects()

</script>
