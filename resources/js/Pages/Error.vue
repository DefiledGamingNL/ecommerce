<script setup>
import { computed } from 'vue'
import GuestLayout from "@/Layouts/GuestLayout.vue";

const props = defineProps({ status: Number })

const title = computed(() => {
    return {
        503: '503: Service Unavailable',
        500: '500: Server Error',
        404: '404: Page Not Found',
        403: '403: Forbidden',
    }[props.status]
})

const description = computed(() => {
    return {
        503: 'Sorry, we are doing some maintenance. Please check back soon.',
        500: `Sorry, Something went wrong on our end. Please try again later.`,
        404: 'Sorry, This is not the page you are looking for.',
        403: 'Sorry, you are forbidden from accessing this page.',
    }[props.status]
})

</script>

<template>
    <GuestLayout>
        <div class="max-w-7xl mx-auto">
            <h1 class="text-7xl text-center m-32">{{ title }}</h1>
            <div class="text-5xl text-center">{{ description }}</div>
        </div>
    </GuestLayout>
</template>
