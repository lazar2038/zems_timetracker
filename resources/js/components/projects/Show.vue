<template>

    <div>Общее затраченное время: {{ project.durationString }}</div>

    <h2>Список задач по проекту   <router-link :to="{'name' : 'tasks.create', 'query' : {'project' : project.id}}" class="button green">
        Добавить задачу
    </router-link></h2>





    <div v-if="project.tasks.length == 0">Задач по проекту нет</div>

    <ul v-else class="ml-3">
        <li v-for="task in project.tasks" class="my-3 border-l-2 border-green-500 pl-2">Задача: <span class="font-italic">{{ task.title }}</span>
        </li>
    </ul>



</template>

<script setup>

    import { useRouter} from "vue-router";
    import { useRoute } from "vue-router";
    import useProjects from "../../composables/projects.js";
    const route = useRoute()
    const router = useRouter()

    const { project, getProject } = useProjects()

    getProject(route.params.id)

</script>
