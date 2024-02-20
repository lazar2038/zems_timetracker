<template>

    <ul>
        <li v-for="timeline in timelines" class="my-2 border-l-2 border-green-500 pl-3">
            <div>Проект: </div>
            <div>Задача: {{ timeline.task.title }}</div>
            <div>Начало: {{ timeline.date_start }} {{ timeline.time_start }}, Окончание: {{ timeline.date_end }} {{ timeline.time_end }}</div>
        </li>
    </ul>

</template>

<script setup>

    import useTimelines from "../../composables/timelines.js";
    const { timelines, getTimelines } = useTimelines()
    getTimelines()

</script>

<style scoped>

</style>
