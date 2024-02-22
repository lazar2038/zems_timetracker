<template>
    <form @submit.prevent="submit">

        <div>
            <label for="confirmation">Напишите DELETE для удаления задачи</label>
        </div>
        <div>
            <input type="text" id="confirmation">
        </div>
        <div>
            <input type="submit" class="button red disabled" value="Удалить задачу">
        </div>

    </form>
</template>

<script setup>

</script>
