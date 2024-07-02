<template>
   <AppLayout>
<div class="flex flex-col max-w-5xl mx-auto">
        <div class="flex flex-col gap-3">
            <label for="title" class="block text-sm font-medium text-gray-700">Titel</label>
            <input v-model="form.title" type="text" name="title" id="title" autocomplete="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <label for="slug" class="block text-sm font-medium text-gray-700">URL</label>
            <input :value="slug" type="text" name="slug" id="slug" autocomplete="slug" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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
<!--            is published-->
            <input type="checkbox" id="is_published" name="is_published" v-model="form.is_published">
            <PrimaryButton class="w-max" @click="publishPage">Publiceer</PrimaryButton>
    </div>

        </div>
   </AppLayout>
</template>

<script setup>
import Editor from '@tinymce/tinymce-vue';
import {router, useForm} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Swal from "sweetalert2";
import {computed, watch} from "vue";


// How do i automatically fill the slug field with the title field and replace spaces with dashes?



const slug = computed(() => {
    return form.title.replace(/\s+/g, '-').toLowerCase();
});

const form = useForm({
    title: '',
    content: '',
    slug: '',
    is_published: false
});
const publishPage = async() => {
    const postData = {
        title: form.title,
        content: form.content,
        slug: slug.value,
        is_published: form.is_published,
    };

    try {
        router.post('/pages', postData);
        form.reset();
        console.log('Page has been published', postData);
        Swal.fire({
            title: 'Success!',
            text: 'Page has been published',
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

