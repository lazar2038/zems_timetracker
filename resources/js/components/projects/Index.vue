<template>

    <router-link :to=" { name : actionButtons.addButton.route } " :class="actionButtons.addButton.classes">
        <font-awesome-icon :icon="actionButtons.addButton.icon" />
    </router-link>

    <router-link :to=" { name : actionButtons.editButton.route } " :class="actionButtons.editButton.classes">
        <font-awesome-icon :icon="actionButtons.editButton.icon" />
    </router-link>

    <ul>
        <li v-for="project in projects" class="mb-3 border-b-2 pb-4">
            <div>
                <span class="font-normal">Проект #{{ project.id }}</span> <span class="font-bold">{{ project.title }}</span>
            </div>
            <div>Общее затраченное время: {{ project.durationString }}</div>
            <ul class="ml-3">
                <li v-for="task in project.tasks" class="my-3 border-l-2 border-green-500 pl-2">Задача: <span class="font-italic">{{ task.title }}</span>
                </li>
            </ul>
        </li>
    </ul>

</template>

<script setup>

    import useProjects from "../../composables/projects.js"

    const { projects, getProjects, actionButtons } = useProjects()





    getProjects()

</script>

<style scoped>

</style>
