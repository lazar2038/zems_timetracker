<template>

    <ul>
        <li v-for="project in projects">
            {{ project.title }}
        </li>
    </ul>

</template>

<script>

import useProjects from "../../composables/projects.js";
import {onMounted} from "vue";

export default {
    setup() {
        const { projects, getProjects } = useProjects()
        onMounted(getProjects)

        return { projects }
    }
}

</script>

<style scoped>

</style>
