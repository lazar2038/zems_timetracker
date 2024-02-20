import { ref } from 'vue'

export default function useTasks() {

    const tasks = ref([])

    const getTasks = async() => {
        axios.get('/api/tasks')
            .then(response => {
                tasks.value = response.data.data;
            })
            .catch(error => console.log(error))
    }

    return { tasks, getTasks }

}
