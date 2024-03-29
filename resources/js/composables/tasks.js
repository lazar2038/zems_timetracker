import { ref } from 'vue'
import {useRouter} from "vue-router";

export default function useTasks() {

    const tasks = ref({})
    const task = ref({})

    const tasksWithoutProject = ref({})
    const taskTimelines = ref({})

    const router = useRouter()

    const getTasks = async(page= 1) => {
        axios.get('/api/tasks?page=' + page)
            .then(response => {
                tasks.value = response.data;
            })
            .catch(error => {
                    if (error.response && error.response.status === 404) {
                        router.push('/404');
                    }
                    if (error.response && error.response.status === 403) {
                        router.push('/404');
                    }
                    else {
                        console.error(error);
                    }
                }
            )
    }

    const getTasksWithoutProject = async(page= 1) => {
        axios.get('/api/tasks/without_project?page=' + page)
            .then(response => {

                tasksWithoutProject.value = response.data;
            })
            .catch(error => {
                    if (error.response && error.response.status === 404) {
                        router.push('/404');
                    }
                    if (error.response && error.response.status === 403) {
                        router.push('/404');
                    }
                    else {
                        console.error(error);
                    }
                }
            )
    }


    const getTask = async(id) => {
        axios.get('/api/tasks/' + id)
            .then(response => {
                task.value = response.data.data;
            })
            .catch(error => {
                    if (error.response && error.response.status === 404) {
                        router.push('/404');
                    }
                    if (error.response && error.response.status === 403) {
                        router.push('/404');
                    }
                    else {
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
            .catch(error => {
                    if (error.response && error.response.status === 404) {
                        router.push('/404');
                    }
                    if (error.response && error.response.status === 403) {
                        router.push('/404');
                    }
                    else {
                        console.error(error);
                    }
                }
            )
    }

    const updateTask = async(task) => {
        axios.put('/api/tasks/' + task.id, task)
            .then(response => {
                router.push({ name: 'tasks.index'})
            })
            .catch(error => {
                    if (error.response && error.response.status === 404) {
                        router.push('/404');
                    }
                    if (error.response && error.response.status === 403) {
                        router.push('/404');
                    }
                    else {
                        console.error(error);
                    }
                }
            )
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
            .catch(error => {
                    if (error.response && error.response.status === 404) {
                        router.push('/404');
                    }
                    if (error.response && error.response.status === 403) {
                        router.push('/404');
                    }
                    else {
                        console.error(error);
                    }
                }
            )
    }






    const getTaskTimelines = async(task_id) => {
        axios.get('/api/tasks/' + task_id + '/timelines')
            .then(response => {
                taskTimelines.value = response.data;
            })
            .catch(error => {
                    if (error.response && error.response.status === 404) {
                        router.push('/404');
                    }
                    if (error.response && error.response.status === 403) {
                        router.push('/404');
                    }
                    else {
                        console.error(error);
                    }
                }
            )
    }

    return { task, tasks, taskTimelines, tasksWithoutProject, getTask, getTasks, getTasksWithoutProject, getTaskTimelines, storeTask, updateTask, deleteTask }

}
