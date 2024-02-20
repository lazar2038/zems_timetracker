<template>

    <ul>
        <li v-for="task in tasks">
            {{ task.title }}
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
