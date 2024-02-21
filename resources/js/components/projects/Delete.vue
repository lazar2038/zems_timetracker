<template>
    <form @submit.prevent="submit">

        <div>
            <label for="confirmation">Напишите DELETE для удаления проекта</label>
        </div>
        <div>
            <input type="text" id="confirmation">
        </div>
        <div>
            <input type="submit" class="button red disabled" value="Удалить проект">
        </div>

    </form>
</template>

<script setup>
let name = "Create"

function submit() {
    console.log('Submitted')
}
</script>
