import {ref, reactive, onMounted} from "vue";
import { useRouter } from 'vue-router'

export default function useAuth(){

    const router = useRouter()
    const processing = ref(false)
    const validationErrors = ref({})

    const user = ref({
        name: '',
        email: ''
    })

    const loginForm = reactive({
        email: '',
        password: '',
        remember: false
    })

    const submitLogin = async () => {

        if (processing.value) return;

        processing.value = true;
        validationErrors.value = {};
        await getToken()
        await axios.post('/login', loginForm)
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
        router.push({name: 'main'})

    }





    const getUser = async () => {
        axios.get('/api/user').then(
            response => {
               user.value = response.data;
            }
        )
    }

    const getToken = async () => {
        await axios.get('/sanctum/csrf-cookie')
    }


    const logOut = async () => {
        await axios.get('/logout').
        then(
            response => {
                getUser()
                router.replace('/')
            })
    }


    return { loginForm, validationErrors, processing, user, submitLogin, getUser, logOut }
}


