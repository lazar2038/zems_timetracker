<template>

{{ this.$route.meta.title }}

</template>

<script setup>
    import { useRouter} from "vue-router";
    const router = useRouter()

    let name = "Create"
</script>

<style scoped>

</style>
