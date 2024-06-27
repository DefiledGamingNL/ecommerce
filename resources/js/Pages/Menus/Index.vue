<script setup>
import {Link} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";


defineProps({
    menus: {
        type: Array,
        required: true,
    }
})

const deleteMenu = (id) => {
    router.delete(`/menus/${id}`);

}
</script>


<template>
    <AppLayout title="Menu builder">
        <div class="flex justify-end max-w-screen-2xl">
            <Link :href="route('menus.create')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Maak nieuw Menu</Link>
        </div>
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
                                <th scope="col" class="px-4 py-3">Items</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="item in menus" class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <td class="w-4 px-4 py-3 ">
                                    <div class="flex items-start">
                                        <input id="checkbox-table-search-1" type="checkbox" onclick="event.stopPropagation()" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row" class="flex h-4 flex-col  items-start px-4 py-2 font-medium text-gray-900 dark:text-white">
                                    {{item.name}}
                                    <div class="gap-1 flex invisible group-hover:visible">
                                        <Link :href="route('menus.edit', item.id)" class="text-xs text-blue-500 hover:text-blue-900 dark:text-gray-400">Edit</Link>
                                    </div>
                                </th>
                                <td class="px-4 py-2 h-4">
                                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option class="p-6" v-for="item in item.items" value="{{item.title}}">{{item.title}}</option>
                                    </select>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </AppLayout>
</template>
