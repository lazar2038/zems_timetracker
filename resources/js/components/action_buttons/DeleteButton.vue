<template>
    <div v-if="route.meta.actionButtons && route.meta.actionButtons.delete">
        <router-link :to="{ name: route.meta.actionButtons.delete.route }" :class="route.meta.actionButtons.delete.classes">
            <font-awesome-icon :icon="route.meta.actionButtons.delete.icon" /> {{ route.meta.actionButtons.delete.text }}
        </router-link>
    </div>
</template>

<script>
export default {
    props: ['route'],
    name: "DeleteButton"
}
</script>
