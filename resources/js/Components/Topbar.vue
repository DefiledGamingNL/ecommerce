<script setup>
import { Link } from '@inertiajs/vue3';
import {ref} from "vue";


let search = ref([
    {
        query: '',
    }

]);

const Search = () => {
    console.log(search.value.query);
};

</script>

<template>
        <section id="topbar" class="shadow">
            <section id="navbar" class="border-b-2">
                <div class="bg-white py-2">
                    <div class="container max-w-7xl mx-auto">
                        <div class="flex justify-between items-center py-4">
                            <div>
                                <nav>
                                    <ul class="flex gap-3" v-for="item in $page.props.menus" :key="item.id" :id="item.name">
                                        <li v-if="item.is_active" v-for="menuItem in item.items" :key="menuItem.id">
                                            <Link :href="route('pages.show', menuItem.url)" class="text-gray-600">{{ menuItem.title }}</Link>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div>
                                <Link :href="route('login')" class="text-sm text-gray-600">Login</Link>
                                <Link :href="route('register')" class="ml-4 text-sm text-gray-600">Register</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="searchbar">
                <div class="bg-white py-2">
                    <div class="container max-w-7xl mx-auto">
                        <div class="flex justify-between items-center">
                            <form @submit.prevent="Search" class="flex gap-3">
                                <input type="text" v-model="search.query" class="w-full border-2 border-gray-200 p-2 rounded-lg" placeholder="Zoek een product">
                                <button type="submit">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </button>

                            </form>
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
</template>
