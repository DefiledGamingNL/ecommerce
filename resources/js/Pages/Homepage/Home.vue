<script setup>
import Topbar from "@/Components/Topbar.vue";
import HeaderBanner from "@/Components/HeaderBanner.vue";
import Header from "@/Components/Header.vue";
import FeaturedProductCard from "@/Components/FeaturedProductCard.vue";
import MainElement from "@/Components/MainElement.vue";
import BlogPost from "@/Components/BlogPost.vue";

defineProps({
    post: Object
})
</script>

<template>
<Header>
    <Topbar />
    <HeaderBanner />
</Header>
    <MainElement>
        <FeaturedProductCard />
        <BlogPost :post />

    </MainElement>
</template>
