<template>
    <AppLayout>
        <div class="max-w-7xl mx-auto py-5">
            <form @submit.prevent="submit">
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" id="title" v-model="form.title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title" required />
                    </div>
                    <div>
                        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                        <input type="text" id="slug" v-model="form.slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="example-page" required />
                    </div>
                    <div>
                        <label for="meta_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta description</label>
                        <textarea id="meta_description" v-model="form.meta_description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="description" required ></textarea>
                    </div>
                    <div>
                        <label for="meta_keywords" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta keywords</label>
                        <textarea id="meta_keywords" v-model="form.meta_keywords" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="comma seperated words" required ></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                        <textarea id="content" v-model="form.content" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Content" required ></textarea>
                    </div>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </AppLayout>
</template>

<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'
import AppLayout from "@/Layouts/AppLayout.vue";

const form = ref({
    title: '',
    content: '',
    slug: '',
    meta_description: '',
    meta_keywords: ''
})

const submit = () => {
    const postData = {
        title: form.value.title,
        content: form.value.content,
        slug: form.value.slug,
        meta_description: form.value.meta_description,
        meta_keywords: form.value.meta_keywords
    }
    router.post('/posts', postData)
}
</script>
