<script setup>

import {Link} from '@inertiajs/vue3';
defineProps({
    post: Object
})
</script>

<template>
    <section id="blog-post">
        <div class="max-w-7xl mx-auto bg-gray-100 p-10">
            <h2 class="text-4xl font-bold">{{post.title}}</h2>
            <div class="mt-4">
                <div class="mt-4">
                    <p class="text-gray-600">{{post.content}}</p>
                    <div class="mt-4">
                        <Link :href="post.slug" class="text-blue-500">Read more</Link>
                        </div>
                    </div>
                </div>
        </div>
    </section>
</template>
