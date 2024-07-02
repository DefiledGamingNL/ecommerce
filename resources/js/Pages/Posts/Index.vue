<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {Link, router} from "@inertiajs/vue3";
import Swal from 'sweetalert2'

let props = defineProps({
    posts: Array,
    required: true,
    pagination: Object,
})



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
            router.delete(`/posts/${id}`)
        }
    })
}

</script>

<template>
    <AppLayout title="Posts">
        <div class="flex justify-end max-w-screen-2xl">
            <Link :href="route('posts.create')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Maak nieuw bericht</Link>

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
                                <th scope="col" class="px-4 py-3">Titel</th>
                                <th scope="col" class="px-4 py-3">Url</th>
                                <th scope="col" class="px-4 py-3">Datum</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="post in posts" class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <td class="w-4 px-4 py-3 ">
                                    <div class="flex items-start">
                                        <input id="checkbox-table-search-1" type="checkbox" onclick="event.stopPropagation()" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row" class="flex h-4 flex-col  items-start px-4 py-2 font-medium text-gray-900 dark:text-white">
                                    {{post.title}}
                                    <div class="gap-1 flex invisible group-hover:visible">
                                        <Link :href="route('posts.edit', post.id)" class="text-xs text-blue-500 hover:text-blue-900 dark:text-gray-400">Edit</Link>
                                        <form @submit.prevent="deletePost(post.id)">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="text-xs text-red-500 hover:text-red-900 dark:text-red-400">Delete</button>
                                        </form>
                                    </div>
                                </th>
                                <td class="px-4 py-2 h-4">
                                    <p class="flex-col text-primary-900 h-full font-medium rounded dark:bg-primary-900 dark:text-primary-500">{{post.slug}}</p>
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex flex-col items-start">
                                        <div :class="post.is_published ? 'text-emerald-600' : 'text-red-600'" class="text-sm font-bold">{{post.is_published ? 'Published' : 'Draft'}}</div>
                                       {{$formatDate(post.created_at)}}
                                    </div>
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


