<template>

    <span class="button green" @click="trigger(task_id)" >{{ props.text }}</span>

</template>

<script setup>

import useTasks from "../composables/tasks.js";



const props = defineProps({
    task_id : Number,
    text : String
});



const { task, taskTimelines, getTask, getTaskTimelines } = useTasks()
const emit = defineEmits(['triggered']);


const trigger = async(task_id) => {
    axios.get('/api/tasks/' + task_id + '/trigger')
        .then(response => {
            emit('triggered');
        })
        .catch(error => console.log(error))
}




</script>
