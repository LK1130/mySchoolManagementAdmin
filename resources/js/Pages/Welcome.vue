<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import NavBar from "../Components/NavBar.vue"
import Header from "../Components/Header.vue"
import StudentCountBox from "../Components/StudentCountBox.vue"

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
<NavBar/>
<Header headername="Student" />
<div class="absolute w-5/6 headercustomleft top-32 customblack min-h-max pb-5">
<div class="flex flex-row justify-evenly">
<StudentCountBox studentcount=140 studenttype="All Students" class="ml-3 mt-2"/>
<StudentCountBox studentcount=65 studenttype="Japanese" class="ml-3 mt-2"/>
<StudentCountBox studentcount=45 studenttype="Web Development" class="ml-3 mt-2"/>
<StudentCountBox studentcount=30 studenttype="JAVA SE" class="ml-3 mt-2"/>
</div>
</div>
</template>
