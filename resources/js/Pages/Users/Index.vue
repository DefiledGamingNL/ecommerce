<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {Link} from "@inertiajs/vue3";

defineProps({
    users: Array,
    required: true,
    pagination: Object,
})
</script>


<template>
    <AppLayout title="Gebruikers">
        <h2 class="text-3xl font-bold">Gebruikers</h2>
        <section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
            <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
                <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all" type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="px-4 py-3">Naam</th>
                                <th scope="col" class="px-4 py-3">Email</th>
                                <th scope="col" class="px-4 py-3">Datum</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="user in users" class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <td class="w-4 px-4 py-3 ">
                                    <div class="flex items-start">
                                        <input id="checkbox-table-search-1" type="checkbox" onclick="event.stopPropagation()" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row" class="flex h-4 flex-col  items-start px-4 py-2 font-medium text-gray-900 dark:text-white">
                                    {{user.name}}
                                </th>
                                <td class="px-4 py-2 h-4">
                                    <p class="flex-col text-primary-900 h-full font-medium rounded dark:bg-primary-900 dark:text-primary-500">{{user.email}}</p>
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                   {{$formatDate(user.created_at)}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0" aria-label="Table navigation">
              <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                  Showing page
                  <span class="font-semibold text-gray-900 dark:text-white">{{pagination.currentPage}}</span>
                  of
                  <span class="font-semibold text-gray-900 dark:text-white">{{pagination.lastPage}}</span>
              </span>
                        <ul class="inline-flex items-stretch -space-x-px">
                            <li>
                                <span class="sr-only">Vorige</span>
                                <a v-if="pagination.prevPage" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" :href="pagination.prevPage">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Vorige
                                </a>
                            </li>
                            <li>
                                <span class="sr-only">Volgende</span>
                                <a class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" :href="pagination.nextPage">Volgende
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>

    </AppLayout>
</template>
