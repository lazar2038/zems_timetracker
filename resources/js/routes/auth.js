import { ref, reactive } from "vue";
import { useRouter } from 'vue-router'

export default function useAuth(){

    const router = useRouter()
    const processing = ref(false)
    const validationErrors = ref({})

    const loginForm = reactive({
        email: '',
        password: '',
        remember: false
    })

    const submitLogin = async () => {

        if (processing.value) return;

        processing.value = true;
        validationErrors.value = {};

        axios.post('/login', loginForm)
            .then(async response => {
                loginUser(response)
            })
            .catch(error =>{
                if(error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() =>processing.value = false)
        }


    const loginUser = (response) => {
        localStorage.setItem('loggedIn', JSON.stringify(true))
        router.push({name: 'dashboard'})

    }

    return { loginForm, validationErrors, processing, submitLogin }
}

