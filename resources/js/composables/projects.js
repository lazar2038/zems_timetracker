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

    const actionButtons = {
        'addButton':
            {
                'classes':
                    'button green',
                'route':
                    'projects.create',
                'icon':
                    ['fas', 'plus']
            },
        'editButton':
            {
                'classes':
                    'button yellow',
                'route':
                    'projects.create',
                'icon':
                    ['fas', 'pen']
            }
    }


    return { projects, getProjects, actionButtons }

}
