<template>
    <section>
        <h2>Задачи без проектов</h2>
        <ul>
            <li v-for="task in tasksWithoutProject.data" class="my-3">
                <div v-if="!task.project">

                <span>
                    <span v-if="task.active">
                            <font-awesome-icon :icon="['far', 'clock']" class="rotate-icon"/>
                    </span>
                   <span v-if="!task.active">
                        <font-awesome-icon :icon="['far', 'clock']" class="text-gray-300"/>
                   </span>
                </span>
                <span class="my-3 border-l-2 border-green-500 pl-2 ml-2">
                      <router-link :to="{ name : 'tasks.show', params : { id : task.id} }">
                        {{ task.title }}
                      </router-link>
                </span>
                </div>
            </li>
        </ul>

        <Pagination
            :data="tasksWithoutProject"
            :limit="5"
            @pagination-change-page="getTasksWithoutProject"
        />


    </section>

    <section>
        <h2>Задачи с проектами</h2>
        <ul>
            <li v-for="task in tasks.data" class="my-3">
                <div v-if="task.project">
                     <span>
                        <span v-if="task.active">
                            <font-awesome-icon :icon="['far', 'clock']" class="rotate-icon"/>
                        </span>
                        <span v-if="!task.active">
                            <font-awesome-icon :icon="['far', 'clock']" class="text-gray-300"/>
                        </span>
                    </span>
                    <span class="my-3 border-l-2 border-green-500 pl-2 ml-2">

                        <router-link :to="{ name : 'tasks.show', params : { id : task.id} }">
                            {{ task.title }}
                        </router-link>

                        <router-link :to="{ name : 'projects.show', params : { id : task.project.id} }" class="text-xs">
                            ({{ task.project.title }})
                        </router-link>
                    </span>
                </div>
            </li>
        </ul>

        <Pagination
            :data="tasks"
            :limit="5"
            @pagination-change-page="getTasks"
        />

    </section>
</template>

<script setup>

import useTasks from "../../composables/tasks.js";

const {tasks, tasksWithoutProject, getTasks, getTasksWithoutProject} = useTasks()

getTasks()
getTasksWithoutProject()

</script>

<style scoped>

</style>
