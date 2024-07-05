<script setup>

import {Link} from '@inertiajs/vue3';
defineProps({
    post: Array
})
</script>

<template>
    <section id="blog-post">
        <div class="max-w-7xl mx-auto bg-gray-100 p-10">
            <div class="w-full h-96 bg-gray-200 dark:bg-gray-800 rounded-lg overflow-hidden">
                <img v-if="post.image" :src="`/storage/${post.image}`" alt="post image">
                <img v-else src="https://placehold.co/10x10" alt="placeholder image">
            </div>
            <h2 class="text-4xl font-bold">{{post.title}}</h2>
            <div class="mt-4">
                <div class="mt-4">
                    <div class="text-gray-600" v-html="post.content"></div>
                    <div class="mt-4">
                        <Link :href="route('posts.show', post.slug)" class="text-blue-500">Read more</Link>
                        </div>
                    </div>
                </div>
        </div>
    </section>
</template>
