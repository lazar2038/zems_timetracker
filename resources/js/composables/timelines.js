import { ref } from 'vue'

export default function useTimelines() {

    const timelines = ref({})

    const getTimelines = async(page=1) => {
        axios.get('/api/timelines?page=' + page)
            .then(response => {
                timelines.value = response.data;
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

    return { timelines, getTimelines }

}
