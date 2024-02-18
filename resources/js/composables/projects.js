import { ref } from 'vue'

export default function useProjects() {

    const projects = ref([])

    const getProjects = async() => {
        axios.get('/api/projects')
            .then(response => {
                projects.value = response.data.data;
            })
            .catch(error => console.log(error))
    }

    return { projects, getProjects }

}
