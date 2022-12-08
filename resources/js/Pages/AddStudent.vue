<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

const form = useForm({
    name: null,
    email: null,
});

const props = defineProps({
    errors: {
        type: Object,
    },
});
const submit = () => {
    Inertia.post("/Addstudent/add", form, {
        onError: (data) => {
            console.log(data);
        },
    });
};
console.log(props.errors);
</script>

<template>
    <!-------------------- Navbar&header -------------------->
    <NavBar />
    <Header headername="Add Student" />
    <!---------------- body ----------------------->
    <div
        class="absolute h-5/6 w-5/6 headercustomleft top-32 bg-primaryBackground flex justify-center items-center"
    >
        <form
            @submit.prevent="submit"
            class="lg:w-5/6 md:w-4/6 xl:w-3/6 w-full h-3/6 bg-elementBackground rounded-2xl space-y-9 p-14"
        >
            <div class="flex flex-col">
                <label
                    for="first_name"
                    class="block mb-2 text-lg font-medium text-white md:text-xl"
                    >Name</label
                >
                <input
                    v-model="form.name"
                    type="text"
                    id="first_name"
                    class="w-full border border-white text-sm rounded-lg focus:ring-white focus:border-0 block p-2.5 bg-gray-700 text-white"
                    placeholder="John"
                />
                <div v-if="errors.name" class="text-red-700 text-md">
                    {{ errors.name }}
                </div>
            </div>
            <div class="">
                <label
                    for="email"
                    class="block mb-2 text-lg md:text-xl font-medium text-gray-900 dark:text-white"
                    >Email address</label
                >
                <input
                    v-model="form.email"
                    type="text"
                    id="email"
                    class="w-full border border-white text-sm rounded-lg focus:ring-white focus:border-0 block p-2.5 bg-gray-700 text-white"
                    placeholder="john.doe@gmail.com"
                />
                <div v-if="errors.email" class="text-red-700 text-md">
                    {{ errors.email }}
                </div>
            </div>

            <div class="flex justify-center items-center">
                <button
                    type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-lg px-16 py-2"
                >
                    Create
                </button>
            </div>
        </form>
    </div>
</template>
