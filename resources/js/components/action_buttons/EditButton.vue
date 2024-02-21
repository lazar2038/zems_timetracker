<template>
    <div v-if="route.meta.actionButtons && route.meta.actionButtons.edit">
        <router-link :to=" { name : route.meta.actionButtons.edit.route, to : 1 } " :class="route.meta.actionButtons.edit.classes">
            <font-awesome-icon :icon="route.meta.actionButtons.edit.icon" /> {{ route.meta.actionButtons.edit.text }}
        </router-link>
    </div>
</template>

<script>
export default {
    props: ['route'],
    name: "EditButton"
}
</script>
