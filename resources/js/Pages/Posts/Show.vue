<script setup>

defineProps({
    post: Object,
})
</script>


<template>

        <div class="max-w-2xl mx-auto py-4 px-2">
            <div class="flex flex-col">
                <div class="heading">
                    <h1 class="text-7xl font-bold text-gray-800 dark:text-white">{{ post.title }}</h1>
                </div>
                <p class="text-gray-500 dark:text-gray-400">{{$formatDate(post.created_at)}}</p>
                <div class="mt-5">
                    <p class="text-gray-800 dark:text-white">{{ post.content }}</p>
                </div>
            </div>
        </div>
</template>
