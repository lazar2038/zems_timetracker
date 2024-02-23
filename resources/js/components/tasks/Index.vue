<template>

    <section>
    <h2>Задачи без проектов</h2>
        <ul>
            <li v-for="task in tasks" class="my-3 border-l-2 border-green-500 pl-3">
                <div v-if="!task.project">
                    <div class="">
                        <router-link :to="{ name : 'tasks.show', params : { id : task.id} }">
                            Задача: {{ task.title }}
                        </router-link>
                    </div>
                    <div class="">Описание: {{ task.description }}</div>

                    <div class="mt-2">Потрачено: {{ task.durationString }}</div>
                    <ul class="ml-2">
                        <li v-for="timeline in task.timelines">
                            Начало: {{ timeline.date_start }} {{ timeline.time_start }}, Окончание: {{ timeline.date_end }} {{ timeline.time_end }}
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </section>

    <section>
    <h2>Задачи с проектами</h2>
    <ul>
        <li v-for="task in tasks" class="my-3 border-l-2 border-green-500 pl-3">
            <div v-if="task.project">
                <div class="my-2">
                    <router-link :to="{ name : 'projects.show', params : { id : task.project.id} }">
                        Проект {{ task.project.title }}
                    </router-link>


                    </div>
                <div class="">
                    <router-link :to="{ name : 'tasks.show', params : { id : task.id} }">
                        Задача: {{ task.title }}
                    </router-link>
                </div>
                <div class="">Описание: {{ task.description }}</div>

                <div class="mt-2">Потрачено: {{ task.durationString }}</div>
                <ul class="ml-2">
                    <li v-for="timeline in task.timelines">
                        Начало: {{ timeline.date_start }} {{ timeline.time_start }}, Окончание: {{ timeline.date_end }} {{ timeline.time_end }}
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    </section>
</template>

<script setup>

    import useTasks from "../../composables/tasks.js";
    const { tasks, getTasks } = useTasks()
    getTasks()

</script>

<style scoped>

</style>
