<script setup>
import Header from "@/Components/Header.vue";
import MainElement from "@/Components/MainElement.vue";
import Topbar from "@/Components/Topbar.vue";
import HeaderBanner from "@/Components/HeaderBanner.vue";
</script>


<template>
    <Header>
        <Topbar />
        <slot name="topbar" />

    </Header>
    <MainElement>
        <slot />
    </MainElement>

</template>
