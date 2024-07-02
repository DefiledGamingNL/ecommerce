<script setup>
import HeaderBanner from "@/Components/HeaderBanner.vue";
import FeaturedProductCard from "@/Components/FeaturedProductCard.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import BlogPost from "@/Components/BlogPost.vue";

defineProps({
    post: Array
})
</script>

<template>
<GuestLayout>
    <template #topbar>
        <HeaderBanner />
    </template>
    <FeaturedProductCard />
    <BlogPost :post />

</GuestLayout>
</template>
