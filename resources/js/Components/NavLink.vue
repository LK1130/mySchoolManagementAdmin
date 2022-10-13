<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition'
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition';
});
</script>

<template>
    <!-- <Link :href="href" :class="classes">
        <slot />
    </Link> -->

         <!------------- Nav ---------->
    <div class="customnavcolor w-2/12  min-h-screen">
    <!-------- Logo ---------->
    <div class="flex flex-row pt-5">
    <img src="../../../public/img/logo.png" alt="" class="w-16 ml-3.5">
    <img src="../../../public/img/icon1.png" alt=""  class="h-6 ml-auto mr-5">
    </div>
    <!--  -->
    <div class="flex flex-row ml-9 text-white mt-7">
        <img src="../../../public/img/dashboardicon.png" alt="">
        <span class="text-lg ml-5 pt-1" >Dashboard</span>
    </div>
    <div class="flex flex-row ml-9 text-white mt-3">
        <img src="../../../public/img/courseicon.png" alt="" class="w-12">
        <span class="text-lg ml-5 pt-1" >Course</span>
    </div>
    <div class="flex flex-row ml-9 text-white mt-3">
        <img src="../../../public/img/studenticon.png" alt="">
        <span class="text-lg ml-5 pt-1" >Student</span>
    </div>
    <div class="flex flex-row ml-9 text-white mt-3">
        <img src="../../../public/img/financeicon.png" alt="">
        <span class="text-lg ml-5 pt-1" >Finance</span>
    </div>
    </div>
</template>
