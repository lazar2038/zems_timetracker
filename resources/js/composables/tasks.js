import { ref } from 'vue'
import {useRouter} from "vue-router";

export default function useTasks() {

    const tasks = ref({})
    const tasksWithoutProject = ref({})

    const router = useRouter()

    const getTasks = async(page= 1) => {
        axios.get('/api/tasks?page' + page)
            .then(response => {
                tasks.value = response.data;
            })
            .catch(error => console.log(error))
    }

    const getTasksWithoutProject = async(page= 1) => {
        axios.get('/api/tasks/without_project?page' + page)
            .then(response => {
                tasksWithoutProject.value = response.data;
            })
            .catch(error => console.log(error))
    }

    const storeTask = async(task) => {
        axios.post('/api/tasks', task)
            .then(response => {
                console.log(response)
                router.push({ name: 'tasks.index'})
            })
            .catch(error => console.log(error))
    }

    return { tasks, tasksWithoutProject, getTasks, getTasksWithoutProject, storeTask }

}
