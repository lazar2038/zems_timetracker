<template>

    <div>
        Login form.
    </div>

</template>

<script setup>

import useAuth from "../routes/auth.js";
const { loginForm, validationErrors, processing, submitLogin } = useAuth()



</script>
