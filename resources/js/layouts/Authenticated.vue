<template>

    <div class="min-h-screen bg-gray-100 w-full">
    <div class="max-w-4xl mx-auto bg-white">
        <header>
        <div class="w-100 flex bg-white border-b border-gray-100 px-4 items-center">
            <div class="logo text-black-500" ></div>
            <nav class="">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto">
                    <div class="flex h-16 items-center">
                        <div class="flex items-center">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">

                                <router-link :to="{ name: 'main' }">
                                    <img src="/images/logo_tracker.svg" width="125px">
                                </router-link>

                            </div>

                            <!-- Navigation Links -->
                            <div class="space-x-8 sm:-my-px sm:ms-10 flex">

                                <router-link :to="{ name: 'projects.index' }"
                                             class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
                                             active-class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                                    Проекты
                                </router-link>

                                <router-link :to="{ name: 'tasks.index' }"
                                             class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
                                             active-class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                                    Задачи
                                </router-link>

                                <router-link :to="{ name: 'timelines.index' }"
                                             class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
                                             active-class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                                    Таймлайны
                                </router-link>

                            </div>
                        </div>


                    </div>

                </div>

                <!-- Responsive Navigation Menu -->

            </nav>



            <div class="grow text-right">

                <Logout></Logout>
                {{ user.email }}

            </div>





        </div>



        <div class="shadow">
            <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8 overflow-hidden">

            <Breadcrumbs :route="route"></Breadcrumbs>

                <h1 class="flex items-center space-x-2">

                    <div>{{ currentPagetitle }}</div>

                    <CreateButton :route="route"></CreateButton>
                    <EditButton :route="route" :id="route.params.id"></EditButton>
                    <DeleteButton :route="route"></DeleteButton>


                </h1>
            </div>
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

import { computed, ref,onMounted } from "vue";
import { useRoute } from "vue-router";

import CreateButton from "../components/action_buttons/CreateButton.vue";
import EditButton from "../components/action_buttons/EditButton.vue";
import DeleteButton from "../components/action_buttons/DeleteButton.vue";
import Breadcrumbs from "../components/Breadcrumbs.vue";
import Logout from "../components/Logout.vue";

import breadcrumbs from "../routes/breadcrumbs.js";

const route = useRoute()

import useAuth from "../routes/auth.js";


const { getUser, user } = useAuth()

getUser()

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
