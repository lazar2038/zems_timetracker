<template>
    <form @submit.prevent="updateTask(task)">


        <div class="my-3">

            <div><label for="project_id">Выберите проект:</label></div>

            <select v-model="task.project_id" name="project_id" id="project_id">
                <option value="0">Без проекта</option>
                <option v-for="project in projects.data" :value="project.id">#{{ project.id }} {{ project.title }}</option>
            </select>

        </div>

        <Pagination
            :data="projects"
            :limit="5"
            @pagination-change-page="getProjects"
        >
        </Pagination>

        <div class="my-3">
            <div><label for="title">Название задачи:</label></div>

            <input v-model="task.title" type="text" name="title" id="title" placeholder="Название задачи" >
        </div>


        <div class="my-3">
            <div>Описание:</div>
            <tiptap v-model="task.description" id="description" name="description"></tiptap>
        </div>


        <div>

            <input type="submit" class="button green" value="Создать" >

        </div>


    </form>
</template>

<script setup>
import { reactive } from "vue";

import useTasks from "../../composables/tasks.js";
import useProjects from "../../composables/projects.js";

import { useRouter} from "vue-router";
import { useRoute } from "vue-router";



const route = useRoute()
const router = useRouter()


import Tiptap from "../Tiptap.vue";

const { projects, getProjects } = useProjects()
const { task, getTask, updateTask } = useTasks();

getProjects()
getTask(route.params.id)

</script>
