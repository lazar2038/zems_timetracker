<template>
    <form @submit.prevent="deleteProject(project)">

        <div>
            <label for="confirmation">Напишите DELETE для удаления проекта</label>
        </div>
        <div>
            <input type="text" v-model="project.confirmation" id="confirmation">
        </div>
        <div>
            <input type="submit" class="button red disabled" value="Удалить проект">
        </div>

    </form>
</template>

<script setup>

import useProjects from "../../composables/projects.js";

import { ref } from 'vue'
import { useRouter} from "vue-router";
import { useRoute } from "vue-router";


const route = useRoute()
const router = useRouter()

const { project, getProject, deleteProject } = useProjects();

getProject(route.params.id)

</script>
