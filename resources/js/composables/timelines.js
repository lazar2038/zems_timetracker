import { ref } from 'vue'

export default function useTimelines() {

    const timelines = ref({})

    const getTimelines = async(page=1) => {
        axios.get('/api/timelines?page=' + page)
            .then(response => {
                timelines.value = response.data;
            })
            .catch(error => console.log(error))
    }

    return { timelines, getTimelines }

}
