<template>
    <div v-if="route.meta.actionButtons && route.meta.actionButtons.create">
        <router-link :to="{ name: route.meta.actionButtons.create.route }" :class="route.meta.actionButtons.create.classes">
            <font-awesome-icon :icon="route.meta.actionButtons.create.icon" /> {{ route.meta.actionButtons.create.text }}
        </router-link>
    </div>
</template>

<script>
export default {
    props: ['route'],
    name: "CreateButton"
}
</script>
