<script setup>

import {Head, Link, router} from '@inertiajs/vue3';
import PrimaryNav from "@/Components/PrimaryNav.vue";
import Sidebar from "@/Components/Sidebar.vue";
import Content from "@/Components/Content.vue";
import MainElement from "@/Components/MainElement.vue";

defineProps({
    title: String,
});

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <Head :title="title"/>
    <!-- Page Content -->
    <MainElement>
        <PrimaryNav />
        <Sidebar/>
        <Content>
            <slot/>
        </Content>
    </MainElement>
</template>
