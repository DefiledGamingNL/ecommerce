<script setup>
import {onMounted} from "vue";

const props = defineProps({
    page: Object
});

import {router, useForm} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Editor from "@tinymce/tinymce-vue";
import Swal from "sweetalert2";

const form = useForm({
    title: '',
    content: '',
    slug: '',
    is_published: false
});

onMounted(() => {
    form.title = props.page.title || '';
    form.content = props.page.content || '';
    form.slug = props.page.slug || '';
    form.is_published = !!props.page.is_published; // Ensure it's a boolean
});

const updatePage = async () => {
    const postData = {
        title: form.title,
        content: form.content,
        slug: form.slug,
        is_published: form.is_published,
    };

    try {
        await router.put(`/pages/${props.page.id}`, postData);
        console.log('Page has been updated', postData);
        Swal.fire({
            title: 'Success!',
            text: 'Page has been updated',
            icon: 'success',
            confirmButtonText: 'Ok'
        })
    } catch (error) {
        Swal.fire({
            title: 'Error!',
            text: error,
            icon: 'error',
            confirmButtonText: 'Ok'
        })
    }
};

</script>


<template>
    <AppLayout>
        <div class="max-w-7xl mx-auto bg-gray-100 p-10">
            <h2 class="text-4xl font-bold">Edit {{page.title}}</h2>
            <form @submit.prevent="updatePage">
                <div class="mt-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" v-model="form.title" id="title" name="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mt-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <Editor
                        v-model="form.content"
                        api-key="vapv8a9vycoqgyogceu2h0s6xjnne7j691mou628viibmv7c"
                        :init="{
                    height: 500,
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar:
                        'formatselect | bold italic backcolor | \
                        alignleft aligncenter alignright alignjustify | \
                        bullist numlist outdent indent | removeformat | help'
                }"
                    />
                </div>
                <div class="mt-4">
                    <label for="slug" class="block text-sm font-medium text-gray-700">URL</label>
                    <input type="text" v-model="form.slug" id="slug" name="slug" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mt-4">
                    <input type="checkbox" v-model="form.is_published" id="is_published" name="is_published">

                    <label for="is_published" class="block text-sm font-medium text-gray-700">Is Published</label>
                </div>
                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Publish</button>
                </div>
            </form>
        </div>
    </AppLayout>

</template>
