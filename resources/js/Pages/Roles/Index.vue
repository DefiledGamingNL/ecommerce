<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {Link, router} from "@inertiajs/vue3";
import Swal from "sweetalert2";

defineProps({
    roles: {
        type: Array,
        required: true
    }
});

const deletePost = (id) => {
    // try catch deleting the post
    Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this post!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, keep it'
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(`/roles/${id}`)
        }
    })
}
</script>

<template>
    <AppLayout>
        <div class="flex justify-end max-w-screen-2xl">
            <Link :href="route('roles.create')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Maak nieuw Rol</Link>

        </div>
        <section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
            <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
                <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">


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
                                <th scope="col" class="px-4 py-3">Created at</th>
                                <th scope="col" class="px-4 py-3">ID</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="role in roles" class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <td class="w-4 px-4 py-3 ">
                                    <div class="flex items-start">
                                        <input id="checkbox-table-search-1" type="checkbox" onclick="event.stopPropagation()" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row" class="flex h-4 flex-col  items-start px-4 py-2 font-medium text-gray-900 dark:text-white">
                                    {{role.name}}
                                    <div class="gap-1 flex invisible group-hover:visible">
                                        <Link :href="route('roles.edit', role.id)" class="text-xs text-blue-500 hover:text-blue-900 dark:text-gray-400">Edit</Link>
                                        <form @submit.prevent="deletePost(role.id)">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="text-xs text-red-500 hover:text-red-900 dark:text-red-400">Delete</button>
                                        </form>
                                    </div>
                                </th>
                                <td class="px-4 py-3 ">
                                    <div class="flex items-start">
                                        {{$formatDate(role.created_at)}}
                                    </div>
                                </td>
                                <td class="px-4 py-3 ">
                                    <div class="flex items-start">
                                        {{role.id}}
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </section>

    </AppLayout>
</template>
