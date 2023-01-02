<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import { ref } from "@vue/reactivity";
</script>

<template>
    <!-------------------- Navbar&header -------------------->
    <NavBar />
    <Header />

    <!---------------- body ----------------------->
    <div
        class="absolute h-5/6 w-5/6 headercustomleft top-32 bg-white flex justify-center items-center"
    >
        <form @submit.prevent="submit">
            
        </form>
    </div>
</template>
