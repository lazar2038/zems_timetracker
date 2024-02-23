<template>

    <h2 class="flex items-center space-x-2">
        <div v-if="task.project">
            <div class="my-2">
                <router-link :to="{ name : 'projects.show', params : { id : task.project.id} }">
                    Проект {{ task.project.title }}
                </router-link>
            </div>
        </div>
        <div v-else>
            <div>Проект не назначен</div>
        </div>
    </h2>

    <div class="">Название задачи: {{ task.title }}</div>
    <div class="">Потрачено: {{ task.durationString }}</div>
    <div class="my-4">Описание: <div v-html="task.description"></div></div>


    <ul class="ml-2">
        <li v-for="timeline in task.timelines">
            Начало: {{ timeline.date_start }} {{ timeline.time_start }}, Окончание: {{ timeline.date_end }} {{ timeline.time_end }}
        </li>
    </ul>

</template>

<script setup>

    import { useRouter} from "vue-router";
    import { useRoute } from "vue-router";
    import useTasks from "../../composables/tasks.js";
    const route = useRoute()
    const router = useRouter()

    const { task, getTask } = useTasks()

    getTask(route.params.id)

</script>
