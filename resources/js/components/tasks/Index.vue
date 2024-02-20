<template>

    <ul>
        <li v-for="task in tasks" class="my-3">
            <div class="font-normal">Проект {{ task.project.title }}</div>
            <div class="font-bold">Задача: {{ task.title }}</div>
            <ul class="ml-2">
                <li v-for="timeline in task.timelines">
                    Исполнитель: {{ timeline.user.name }}, Начало: {{ timeline.date_start }} {{ timeline.time_start }}, Окончание: {{ timeline.date_end }} {{ timeline.time_end }}
                </li>
            </ul>
        </li>
    </ul>

</template>

<script>

import useTasks from "../../composables/tasks.js";
import {onMounted} from "vue";

export default {
    setup() {
        const { tasks, getTasks } = useTasks()
        onMounted(getTasks)

        return { tasks }
    }
}

</script>

<style scoped>

</style>
