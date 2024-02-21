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
                            <div class="space-x-8 sm:-my-px sm:ms-10 sm:flex">

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
        </div>


        <!-- Page Heading -->
        <header class="shadow">
            <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8 overflow-hidden">



            <Breadcrumbs :route="route"></Breadcrumbs>


                <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center space-x-2">

                    <div>{{ currentPagetitle }}</div>

                    <CreateButton :route="route"></CreateButton>
                    <EditButton :route="route" :id="route.params.id"></EditButton>
                    <DeleteButton :route="route"></DeleteButton>


                </h2>
            </div>
        </header>

        <!-- Page Content -->
        <main class="">
            <div class="py-2">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="my-6 text-gray-900 min-h-96">


                            <router-view></router-view>


                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
    </div>

</template>


<script setup>

import { computed } from "vue";
import { useRoute } from "vue-router";
import { inject } from "vue";

import CreateButton from "../components/action_buttons/CreateButton.vue";
import EditButton from "../components/action_buttons/EditButton.vue";
import DeleteButton from "../components/action_buttons/DeleteButton.vue";
import Breadcrumbs from "../components/Breadcrumbs.vue";

const route = useRoute()
const router = inject('router')


const currentPagetitle = computed(() => {
    if (route.meta.title) {
        return route.meta.title;
    }
    else {
        return 'Дефолтный заголовок';
    }
})

</script>
