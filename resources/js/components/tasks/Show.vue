<template>



</template>

<script setup>

    import { useRouter} from "vue-router";
    import { useRoute } from "vue-router";
    import useTasks from "../../composables/tasks.js";
    const route = useRoute()
    const router = useRouter()

    const { task, getTask } = useTasks()

    getTask(route.params.id)

</script>
