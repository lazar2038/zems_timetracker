<template>
    <form @submit.prevent="submit">
        <input type="text" id="title" placeholder="Название проекта" >
        <input type="submit" class="block text-white button font-bold py-2 my-2 px-4 rounded bg-green-600 cursor-pointer hover:bg-green-800 transition-all" value="Создать" >
    </form>
</template>

<script setup>
    let name = "Create"
    function submit() {
            console.log('Submitted')
    }
</script>

<style scoped>

</style>
