<template>


    <form @submit.prevent="storeTask(task)">


        <div class="my-2">

            <div><label for="project">Проект:</label></div>

            <select v-if="route.query.project" v-model="task.project" id="project">
                <option :value="project.id" selected>{{ project.title }}</option>
            </select>

            <select v-else v-model="task.project" name="" id="">
                <option value="null" hidden>Выберите проект</option>
                <option v-for="project in projects" :value="project.id">{{ project.title }}</option>
            </select>
        </div>


        <div class="my-2">
            <input v-model="task.title" type="text" id="title" placeholder="Название задачи" >
        </div>

        <div class="my-2">
            <textarea v-model="task.description" id="description" class="w-full" placeholder="Описание">

            </textarea>
        </div>


        <div>
            <input type="submit" class="block text-white button font-bold py-2 my-2 px-4 rounded bg-green-600 cursor-pointer hover:bg-green-800 transition-all" value="Создать" >

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

const { storeTask } = useTasks();



const { project, projects, getProject, getProjects } = useProjects()

if(route.query.project) {
    getProject(route.query.project)
}
else {
    getProjects()
}


const task = reactive({
    title: '',
    description: '',
    project: route.query.project ?? null
})

</script>
