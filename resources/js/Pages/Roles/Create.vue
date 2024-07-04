<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import {router, useForm} from "@inertiajs/vue3";
import Swal from "sweetalert2";

const form = useForm({
    name: '',
    guard_name: 'web'
});

const submit = () => {
    const postData = {
        name: form.name,
        guard_name: 'web'
    }

    if (form.name === '') {
        Swal.fire({
            title: 'Error!',
            text: 'Name is required',
            icon: 'error',
            confirmButtonText: 'Ok'
        })
        return;
    }

    if (form.name.length < 3) {
        Swal.fire({
            title: 'Error!',
            text: 'Name must be at least 3 characters',
            icon: 'error',
            confirmButtonText: 'Ok'
        })
        return;
    }

    if (form.name.match(/[^a-zA-Z0-9 ]/)) {
        Swal.fire({
            title: 'Error!',
            text: 'Name must only contain letters and numbers',
            icon: 'error',
            confirmButtonText: 'Ok'
        })
        return;
    }

    try {
        router.post('/roles', postData);
        form.reset();
        console.log('Role has been created', postData);
        Swal.fire({
            title: 'Success!',
            text: 'Role has been created',
            icon: 'success',
            confirmButtonText: 'Ok'
        }).then(() => {
            router.push('/roles');
        });
    } catch (error) {
        Swal.fire({
            title: 'Error!',
            text: error,
            icon: 'error',
            confirmButtonText: 'Ok'
        })
    }

}

</script>


<template>
    <AppLayout>
        <div class="max-w-7xl mx-auto py-5">
            <form @submit.prevent="submit">
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Naam</label>
                        <input type="text" id="name" v-model="form.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title"  />
                        <input type="hidden" id="guard_name" :value="form.guard_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  />
                    </div>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </AppLayout>

</template>
