<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";

defineProps({
    page: Array
})
</script>


<template>
    <GuestLayout>
        <section id="page">
            <div class="max-w-7xl mx-auto bg-gray-100 p-10">
                <h2 class="text-4xl font-bold">{{page.title}}</h2>
                <div class="mt-4">
                    <div class="mt-4">
                        <div class="text-gray-600" v-html="page.content"></div>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>
