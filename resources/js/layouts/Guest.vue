<template>

    <div class="min-h-screen bg-gray-100 w-full">
        <div class="max-w-4xl mx-auto bg-white">

            <div class="w-100 flex bg-white border-b border-gray-100 px-4 items-center">
                <div class="logo text-black-500" ></div>
                <nav class="">
                    <!-- Primary Navigation Menu -->
                    <div class="max-w-7xl mx-auto">
                        <div class="flex h-16">
                            <div class="flex">
                                <!-- Logo -->
                                <div class="shrink-0 flex items-center">

                                    <router-link :to="{ name: 'main' }">
                                        <img src="/images/logo_tracker.svg" width="125px">
                                    </router-link>

                                </div>

                                <!-- Navigation Links -->
                                <div class="space-x-8 sm:-my-px sm:ms-10 flex">


                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- Responsive Navigation Menu -->

                </nav>
            </div>


            <!-- Page Heading -->
            <header class="shadow">
                <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8 overflow-hidden">

                    <Breadcrumbs :route="route"></Breadcrumbs>

                    <h1 class="flex items-center space-x-2">

                        <div>{{ currentPagetitle }}</div>

                        <CreateButton :route="route"></CreateButton>
                        <EditButton :route="route" :id="route.params.id"></EditButton>
                        <DeleteButton :route="route"></DeleteButton>


                    </h1>
                </div>
            </header>

            <!-- Page Content -->
            <main class="py-2 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="my-6 text-gray-900 min-h-96">


                        <router-view></router-view>


                    </div>
                </div>

            </main>
        </div>
    </div>

</template>


<script setup>

import { computed } from "vue";
import { useRoute } from "vue-router";



import CreateButton from "../components/action_buttons/CreateButton.vue";
import EditButton from "../components/action_buttons/EditButton.vue";
import DeleteButton from "../components/action_buttons/DeleteButton.vue";
import Breadcrumbs from "../components/Breadcrumbs.vue";


import breadcrumbs from "../routes/breadcrumbs.js";

const route = useRoute()


const currentPagetitle = computed(() => {
    if (route.meta.title) {

        let title = route.meta.title;
        if(route.params.id) {
            title += ' #' + route.params.id;
        }

        return title;
    }
    else {
        return 'Дефолтный заголовок';
    }
})

</script>
