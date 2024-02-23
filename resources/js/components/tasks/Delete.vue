<template>
    <form @submit.prevent="deleteTask(task)">

        <div>
            <label for="confirmation">Напишите DELETE для удаления задачи</label>
        </div>
        <div>
            <input type="text" v-model="task.confirmation" id="confirmation">
        </div>
        <div>
            <input type="submit" class="button red disabled" value="Удалить задачу">
        </div>

    </form>
</template>

<script setup>

import useTasks from "../../composables/tasks.js";

import { ref } from 'vue'
import { useRouter} from "vue-router";
import { useRoute } from "vue-router";




const route = useRoute()
const router = useRouter()

const { task, getTask, deleteTask } = useTasks();

getTask(route.params.id)

</script>
