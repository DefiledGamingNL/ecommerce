
<script>
import { router } from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import ActionSection from "@/Components/ActionSection.vue";
import FormSection from "@/Components/FormSection.vue";
import InputLabel from "@/Components/InputLabel.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Checkbox from "@/Components/Checkbox.vue";
export default {
    components: {Checkbox, SecondaryButton, InputLabel, FormSection, ActionSection, PrimaryButton, TextInput, AppLayout},
    props: {
        menus: Array,
    },
    data() {
        return {
            form: {
                name: '',
                is_active: false,
            },
            newMenuItem: {
                title: '',
                url: '',
            },
        };
    },
    methods: {
        createMenu() {
            router.post('/menus', this.form).then(() => {
                this.form.name = '';
                this.form.is_active = '';
            });
        },
        updateMenu(id) {
            router.put(`/menus/${id}`, { name: this.menus.find(menu => menu.id === id).name, is_active: this.menus.find(menu => menu.id === id).is_active});
        },
        deleteMenu(id) {
            router.delete(`/menus/${id}`);
        },
        addMenuItem(menuId) {
            router.post('/menu-items', { ...this.newMenuItem, menu_id: menuId }).then(() => {
                this.newMenuItem.title = '';
                this.newMenuItem.url = '';
            });
        },
        updateMenuItem(item) {
            router.put(`/menu-items/${item.id}`, { title: item.title, url: item.url });
        },
        deleteMenuItem(id) {
            router.delete(`/menu-items/${id}`);
        },
    },
};
</script>

<template>
   <AppLayout>
       <div class="container mx-auto p-4 max-w-7xl">
           <h1 class="text-2xl font-bold mb-4">Menus</h1>
           <form @submit.prevent="createMenu" class="mb-6">
                   <div class="flex gap-3 justify-between">
                       <TextInput v-model="form.name" label="Menu naam" placeholder="Menu naam" />
                       <PrimaryButton class="ml-3">Maak menu</PrimaryButton>
                   </div>
           </form>
           <div v-for="menu in menus" :key="menu.id" class="mb-8">
               <h2 class="text-xl font-semibold mb-2">{{ menu.name }}</h2>
               <form @submit.prevent="addMenuItem(menu.id)" class="mb-4">
                       <div class="flex gap-3 justify-between">
                          <div class="flex flex-col gap-2">
                              <InputLabel for="title">Menu item</InputLabel>
                              <div class="flex gap-2">
                                  <TextInput type="text" v-model="newMenuItem.title" placeholder="Naam" class="border p-2 rounded-md col-span-1" />
                                  <TextInput type="text" v-model="newMenuItem.url" placeholder="URL" class="border p-2 rounded-md col-span-1" />
                              </div>
                              <PrimaryButton type="submit" class="max-w-max">Nieuw item</PrimaryButton>
                          </div>

                       </div>
               </form>
               <ul>
                   <li v-for="item in menu.items" :key="item.id" class="mb-4">
                       <div class="flex items-center justify-between">
                           <span>{{ item.title }} ({{ item.url }})</span>
                           <div class="flex space-x-2">
                               <PrimaryButton @click="item.showEdit = !item.showEdit" class="bg-yellow-500 text-white px-4 py-2 rounded-md">Bewerken</PrimaryButton>
                               <PrimaryButton @click="deleteMenuItem(item.id)" class="bg-red-600 text-white px-4 py-2 rounded-md">Verwijder</PrimaryButton>
                           </div>
                       </div>
                       <div v-if="item.showEdit" class="mt-2">
                           <form @submit.prevent="updateMenuItem(item)" class="flex items-center space-x-2">
                               <TextInput type="text" v-model="item.title" class="border p-2 rounded-md" />
                               <TextInput type="text" v-model="item.url" class="border p-2 rounded-md" />
                               <PrimaryButton type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md">Update</PrimaryButton>
                           </form>
                       </div>
                   </li>
               </ul>
               <PrimaryButton @click="menu.showEdit = !menu.showEdit" class="bg-yellow-500 text-white px-4 py-2 mr-2 rounded-md mt-2">Bewerk Menu</PrimaryButton>
               <div v-if="menu.showEdit" class="mt-2">
                   <form @submit.prevent="updateMenu(menu.id)" class="flex flex-col gap-3 space-x-2">

                       <div class="flex items-center mb-4">
                           <TextInput type="text" v-model="menu.name" class="border max-w-max p-2 mr-2 rounded-md flex-1" />
                           <label class="inline-flex items-center cursor-pointer">
                               <Checkbox v-model="menu.is_active" class="mr-2" />
                               <span class="text-gray-700">Active</span>
                           </label>
                       </div>
                       <PrimaryButton type="submit" class="bg-yellow-500 max-w-max text-white px-4 py-2 rounded-md">Update Menu</PrimaryButton>
                   </form>
               </div>
               <PrimaryButton @click="deleteMenu(menu.id)" class="bg-red-500 text-white px-4 py-2 rounded-md mt-2">Delete Menu</PrimaryButton>
           </div>
       </div>
   </AppLayout>
</template>

