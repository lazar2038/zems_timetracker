<template>

    <div>

        <form @submit.prevent="submitLogin">

            <!-- Email Address -->
            <div>
                <label for="email" />
                <input v-model="loginForm.email" id="email" class="block mt-1 w-full sm:w-1/2" type="email" name="email"
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

                <input v-model="loginForm.password" id="password" class="block mt-1 w-full sm:w-1/2"
                        type="password"
                        name="password"

                        placeholder="password"
                />
                <div v-for="message in validationErrors?.password">
                    {{ message }}
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="button green">Войти</button>
            </div>

        </form>



    </div>

</template>

<script setup>

import useAuth from "../routes/auth.js";
const { loginForm, validationErrors, processing, submitLogin } = useAuth()



</script>
