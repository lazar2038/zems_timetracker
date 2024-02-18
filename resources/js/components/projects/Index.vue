<template>

    <ul>
        <li v-for="project in projects">
            {{ project.title }}
        </li>
    </ul>

</template>

<script>

export default {
    data() {
        return {
            projects: []
        }
    },
    mounted() {
      this.fetchProjects()
    },
    methods: {
        fetchProjects() {
            axios.get('api/projects')
                .then(response => this.projects = response.data)
                .catch(error => console.log(error))
        }
    }
}

</script>

<style scoped>

</style>
