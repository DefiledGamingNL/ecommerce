<script setup>
import {onMounted} from "vue";

const props = defineProps({
    role: Object
});

import {router, useForm} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Swal from "sweetalert2";

const form = useForm({
    name: '',
});

onMounted(() => {
    form.name = props.role.name || '';
});

const updatePage = async () => {
    const postData = {
        name: form.name,
    };

    try {
        await router.put(`/roles/${props.role.id}`, postData);
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
            <h2 class="text-4xl font-bold">Edit Role {{role.name}}</h2>
            <form @submit.prevent="updatePage">
                <div class="mt-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Naam</label>
                    <input type="text" v-model="form.name" id="title" name="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Publish</button>
                </div>
            </form>
        </div>
    </AppLayout>

</template>
