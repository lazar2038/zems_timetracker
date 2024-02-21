<template>
    <form @submit.prevent="storeProject(project)">

        <div>
            <input v-model="project.title" type="text" id="title" placeholder="Название проекта" >
        </div>

        <div>
            <input type="submit" class="block text-white button font-bold py-2 my-2 px-4 rounded bg-green-600 cursor-pointer hover:bg-green-800 transition-all" value="Создать" >
        </div>

    </form>
</template>

<script setup>

    import { reactive } from "vue";
    import useProjects from "../../composables/projects.js";
    const { storeProject } = useProjects();
    const project = reactive({
        title : ''
    })

</script>
