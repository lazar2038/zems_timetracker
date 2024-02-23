import { ref } from 'vue'
import {useRouter} from "vue-router";

export default function useTasks() {

    const tasks = ref({})
    const task = ref({})

    const tasksWithoutProject = ref({})

    const router = useRouter()

    const getTasks = async(page= 1) => {
        axios.get('/api/tasks?page=' + page)
            .then(response => {
                tasks.value = response.data;
            })
            .catch(error => console.log(error))
    }

    const getTasksWithoutProject = async(page= 1) => {
        axios.get('/api/tasks/without_project?page=' + page)
            .then(response => {

                tasksWithoutProject.value = response.data;
            })
            .catch(error => console.log(error))
    }


    const getTask = async(id) => {
        axios.get('/api/tasks/' + id)
            .then(response => {
                task.value = response.data.data;
            })
            .catch(error => {
                    if (error.response && error.response.status === 404) {
                        router.push('/404');
                    } else {
                        console.error(error);
                    }
                }
            )
    }

    const storeTask = async(task) => {
        axios.post('/api/tasks', task)
            .then(response => {
                router.push({ name: 'tasks.index'})
            })
            .catch(error => console.log(error))
    }

    const updateTask = async(task) => {
        axios.put('/api/tasks/' + task.id, task)
            .then(response => {
                router.push({ name: 'tasks.index'})
            })
            .catch(error => console.log(error))
    }

    const deleteTask = async(task) => {
        axios.delete('/api/tasks/' + task.id, {
            data: {
                confirmation: task.confirmation
            }
        })
            .then(response => {
                router.push({ name: 'tasks.index'})
            })
            .catch(error => console.log(error))
    }



    return { task, tasks, tasksWithoutProject, getTask, getTasks, getTasksWithoutProject, storeTask, updateTask, deleteTask }

}
