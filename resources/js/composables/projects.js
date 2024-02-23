import {reactive, ref} from 'vue'
import { useRouter } from "vue-router";

export default function useProjects() {

    const projects = ref({})
    const project = ref({})

    const router = useRouter()

    const getProjects = async(page = 1) => {
        axios.get('/api/projects?page=' + page)
            .then(response => {
                projects.value = response.data;
            })
            .catch(error => console.log(error))
    }

    const getProject = async (id) => {
        axios.get('/api/projects/' + id)
            .then(response => {
                project.value = response.data.data;
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

    const storeProject = async(project) => {
        axios.post('/api/projects', project)
            .then(response => {
                router.push({ name: 'projects.index'})
            })
            .catch(error => console.log(error))
    }



    const updateProject = async(project) => {
        axios.put('/api/projects/' + project.id, project)
            .then(response => {
                router.push({ name: 'projects.index'})
            })
            .catch(error => console.log(error))
    }

    const deleteProject = async(project) => {
        axios.delete('/api/projects/' + project.id, {
            data: {
                confirmation: project.confirmation
            }
        })
            .then(response => {
                router.push({ name: 'projects.index'})
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


    return { projects, project, getProjects, getProject, storeProject, deleteProject, updateProject, actionButtons }

}
