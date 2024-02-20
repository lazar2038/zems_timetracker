<template>

    <ul>
        <li v-for="timeline in timelines">
            Исполнитель: {{ timeline.user.name }}, Начало: {{ timeline.date_start }} {{ timeline.time_start }}, Окончание: {{ timeline.date_end }} {{ timeline.time_end }}
        </li>
    </ul>

</template>

<script>

import useTimelines from "../../composables/timelines.js";
import {onMounted} from "vue";

export default {
    setup() {
        const { timelines, getTimelines } = useTimelines()
        onMounted(getTimelines)

        return { timelines }
    }
}

</script>

<style scoped>

</style>
