<template>

    <div>

        <form @submit.prevent="submitRegister">

            <!-- Email Address -->
            <div>
                <label for="email" />
                <input v-model="registerForm.email" id="email" class="block mt-1 w-full sm:w-1/2" type="email" name="email"
                       autofocus
                       autocomplete="username"
                placeholder="e-mail"/>
                <div v-for="message in validationErrors?.email">
                    {{ message }}
                </div>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" />

                <input v-model="registerForm.password" id="password" class="block mt-1 w-full sm:w-1/2"
                        type="password"
                        name="password"

                        placeholder="Задайте пароль"
                />
                <div v-for="message in validationErrors?.password">
                    {{ message }}
                </div>
            </div>

            <div class="mt-4">
                <label for="password2" />

                <input v-model="registerForm.password2" id="password2" class="block mt-1 w-full sm:w-1/2"
                       type="password"
                       name="password2"

                       placeholder="Повторите пароль"
                />
                <div v-for="message in validationErrors?.password2">
                    {{ message }}
                </div>
            </div>



            <div class="mt-4">
                <button type="submit" class="button green">Зарегистрироваться</button>
            </div>

        </form>

        <div class="my-3"><router-link to="/login">Вернуться на страницу входа</router-link></div>


    </div>

</template>

<script setup>

import useAuth from "../routes/auth.js";
const { registerForm, validationErrors, processing, submitRegister } = useAuth()



</script>
