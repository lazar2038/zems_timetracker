<template>

    <ul>
        <li v-for="timeline in timelines">
            User: {{ timeline.user_id }}, Date time start: {{ timeline.date_start }} {{ timeline.time_start }}
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
