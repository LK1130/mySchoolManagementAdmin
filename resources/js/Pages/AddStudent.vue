<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import { ref } from "vue";
</script>

<template>
    <!-------------------- Navbar&header -------------------->
    <NavBar />
    <Header headername="Add Student" />
    <!---------------- body ----------------------->
    <div
        class="absolute h-full w-full md:w-5/6 headercustomleft top-32 customblack flex justify-center items-top"
    >
        <div class="w-full md:w-4/6 h-3/6 bg-white mt-14 rounded-2xl"></div>
    </div>
</template>
