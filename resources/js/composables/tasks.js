import { ref } from 'vue'
import {useRouter} from "vue-router";

export default function useTasks() {

    const tasks = ref([])
    const router = useRouter()

    const getTasks = async() => {
        axios.get('/api/tasks')
            .then(response => {
                tasks.value = response.data.data;
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

    return { tasks, getTasks, storeTask }

}
