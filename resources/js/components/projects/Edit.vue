<template>
    <form @submit.prevent="updateProject(project)">


        <div class="my-3">
            <div><label for="title">Название проекта:</label></div>

            <input v-model="project.title" type="text" name="title" id="title" placeholder="Название проекта" >
        </div>


        <div>

            <input type="submit" class="button green" value="Изменить" >

        </div>


    </form>
</template>

<script setup>
import { reactive } from "vue";

import useProjects from "../../composables/projects.js";

import { useRouter} from "vue-router";
import { useRoute } from "vue-router";

const route = useRoute()
const router = useRouter()

const { project, getProject, updateProject } = useProjects();

getProject(route.params.id)

</script>
