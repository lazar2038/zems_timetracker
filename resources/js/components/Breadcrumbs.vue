<template>

    <div class="breadcrumbs">
        <ol class="flex">
            <span v-for="(crumb,index) in breadcrumbs[route.name]">
                <li v-if="index !== breadcrumbs[route.name].length - 1" class="pr-2">
                    <router-link :to="{ name: crumb.route }">
                        {{  crumb.title }}
                    </router-link>
                    <span class="ml-2 text-gray-500 select-none">&rsaquo;</span>

                </li>

                <span v-if="index == breadcrumbs[route.name].length - 1">
                        {{  crumb.title }}
                </span>

            </span>
        </ol>
    </div>

</template>

<script setup>

import { useRoute } from "vue-router";
import { ref } from "vue";

import breadcrumbs from "../routes/breadcrumbs";

const route = useRoute()
const props = defineProps({
    ['route']: Array,
});

</script>
