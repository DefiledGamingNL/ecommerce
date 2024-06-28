<script>
import { Link } from '@inertiajs/vue3';
export default {

    computed: {
        menu() {
            return this.$page.props.menu;
        }
    },
    components: {
        Link
    }
};
</script>

<template>
        <div class="bg-white shadow py-2">
            <div class="container max-w-6xl mx-auto">
                <div class="flex justify-between items-center py-4">
                    <div>
                        <nav>
                            <ul class="flex gap-3" v-for="item in $page.props.menus" :key="item.id" :id="item.name">
                                <li v-if="item.is_active" v-for="menuItem in item.items" :key="menuItem.id">
                                    <Link :href="menuItem.url" class="text-gray-600">{{ menuItem.title }}</Link>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div>
                        <Link href="/login" class="text-sm text-gray-600">Login</Link>
                        <Link href="/register" class="ml-4 text-sm text-gray-600">Register</Link>
                    </div>
                </div>
            </div>
        </div>
</template>
