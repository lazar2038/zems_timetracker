<template>

    <ul>
        <li v-for="timeline in timelines.data" class="my-2 border-l-2 border-green-500 pl-3">

            <div>Проект:

                <router-link v-if="timeline.project" :to="{ name : 'projects.show', params : { id : timeline.project.id} }">
                    {{ timeline.project.title }}
                </router-link>
                <span v-else class="font-bold">без проекта</span>
            </div>

            <div>Задача:
                <router-link :to="{ name : 'tasks.show', params : { id : timeline.task.id} }">
                    {{ timeline.task.title }}
                </router-link>

                 </div>
            <div>Начало: {{ timeline.date_start }} {{ timeline.time_start }}, Окончание: {{ timeline.date_end }} {{ timeline.time_end }}</div>
        </li>
    </ul>

    <Pagination
        :data="timelines"
        :limit="5"
        @pagination-change-page="getTimelines"
    />

</template>

<script setup>

    import useTimelines from "../../composables/timelines.js";
    const { timelines, getTimelines } = useTimelines()
    getTimelines()


</script>

<style scoped>

</style>
