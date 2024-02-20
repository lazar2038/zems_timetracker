import { ref } from 'vue'

export default function useTimelines() {

    const timelines = ref([])

    const getTimelines = async() => {
        axios.get('/api/timelines')
            .then(response => {
                timelines.value = response.data.data;
            })
            .catch(error => console.log(error))
    }

    return { timelines, getTimelines }

}
