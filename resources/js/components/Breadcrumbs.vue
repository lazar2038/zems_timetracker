<template>
    <div class="breadcrumbs">
        <ol class="flex">
            <li class="pr-2">
                <router-link :to="{ name: 'main' }">
                    Главная
                </router-link>
            </li>
            <li class="text-gray-500 select-none">&rsaquo;</li>
            <li class="px-2"><a href="#" class="hover:underline">Проекты</a></li>
            <li class="text-gray-500 select-none">&rsaquo;</li>
            <li class="px-2">Проект # {{ route.params.id }}</li>
        </ol>
    </div>

</template>

<script>

import { computed } from "vue";
import { useRoute } from "vue-router";
const route = useRoute()

export default {
    props: ['route'],
    name: "Breadcrumbs"
}
</script>
