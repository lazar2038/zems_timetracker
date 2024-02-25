<template>
<div>
    <button @click="logOut" class="button yellow inline-block logout">Выйти</button>
</div>
</template>

<script setup>

import useAuth from '../routes/auth'
const { logOut } = useAuth()

</script>
