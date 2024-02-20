<template>
    <section>
    <h2>Задачи без проектов</h2>
    <ul>
        <li></li>
    </ul>
    </section>

    <section>
    <h2>Задачи с проектами</h2>
    <ul>
        <li v-for="task in tasks" class="my-3 border-l-2 border-green-500 pl-3">
            <div class="my-2">Проект {{ task.project.title }}</div>
            <div class="">Задача: {{ task.title }}</div>
            <div class="">Описание: {{ task.description }}</div>

            <div class="mt-2">Потрачено: {{ task.durationString }}</div>
            <ul class="ml-2">
                <li v-for="timeline in task.timelines">
                    Начало: {{ timeline.date_start }} {{ timeline.time_start }}, Окончание: {{ timeline.date_end }} {{ timeline.time_end }}
                </li>
            </ul>
        </li>
    </ul>
    </section>
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
