<script setup>

import GuestLayout from "@/Layouts/GuestLayout.vue";

defineProps({
    post: Object,
})
</script>


<template>

        <GuestLayout>
            <div class="max-w-2xl mx-auto py-4 px-2">
                <div class="flex flex-col">
                    <div class="w-full h-96 bg-gray-200 dark:bg-gray-800 rounded-lg overflow-hidden">
                        <img v-if="post.image" :src="`/storage/${post.image}`" alt="post image">
                        <img v-else src="https://placehold.co/10x10" alt="placeholder image">
                    </div>
                    <div class="heading">
                        <h1 class="text-7xl font-bold text-gray-800 dark:text-white">{{ post.title }}</h1>
                    </div>
                    <p class="text-gray-500 dark:text-gray-400">{{$formatDate(post.created_at)}}</p>
                    <div class="mt-5" >
                        <div id="content" v-html="post.content"></div>
                    </div>
                </div>
            </div>
        </GuestLayout>
</template>
