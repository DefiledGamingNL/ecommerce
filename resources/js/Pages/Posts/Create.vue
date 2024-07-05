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
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>

                        <input type="file" @input="form.image = $event.target.files[0]" />
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
                        <Editor
                            api-key="vapv8a9vycoqgyogceu2h0s6xjnne7j691mou628viibmv7c"
                            v-model="form.content"
                            :init="{
        toolbar_mode: 'sliding',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
          { value: 'First.Name', title: 'First Name' },
          { value: 'Email', title: 'Email' },
        ],
                        }"
                        initial-value="Welcome to TinyMCE!"
                        />
                    </div>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </AppLayout>
</template>

<script setup>
import Editor from '@tinymce/tinymce-vue'
import { ref } from 'vue'
import {router, useForm} from '@inertiajs/vue3'
import AppLayout from "@/Layouts/AppLayout.vue";

const form = useForm({
    title: '',
    content: '',
    slug: '',
    meta_description: '',
    meta_keywords: '',
    image: '',
})

const submit = () => {
    const postData = {
        title: form.title,
        content: form.title,
        image: form.image,
        slug: form.slug,
        meta_description: form.meta_description,
        meta_keywords: form.meta_keywords,
    }
    router.post('/posts', postData, {
        forceFormData: true,
    })
}
</script>
