<template>

    <ul>
        <li v-for="project in projects" class="mb-3 border-b-2 py-4">
            <div>
                <span class="font-normal">Проект #{{ project.id }}</span> <span class="font-bold">{{ project.title }}</span>
            </div>
            <div>Общее затраченное время: {{ project.durationString }}</div>
            <ul class="ml-3">
                <li v-for="task in project.tasks" class="my-3 border-l-2 border-green-500 pl-2">Задача: <span class="font-italic">{{ task.title }}</span>
                    <div>Исполнитель: {{ task.user.name }}</div>
                </li>
            </ul>
        </li>
    </ul>

</template>

<script>

import useProjects from "../../composables/projects.js";
import {onMounted} from "vue";

export default {
    setup() {
        const { projects, getProjects } = useProjects()
        onMounted(getProjects)

        return { projects }
    }
}

</script>

<style scoped>

</style>
