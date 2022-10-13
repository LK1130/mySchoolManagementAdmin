<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';




const props = defineProps({
    href: String,
    active: Boolean,
    headername: {
        type: String,
    },
});

const classes = computed(() => {
    return props.active
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition'
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition';
});
</script>

<template>
<div class="fixed left-1/4 min-w-full h-32 customblack">
<div class="grid grid-cols-2">
<div class="ml-5 ">
    <div class="text-white mt-3">2022/09/23 20:28:30 (FRI) </div>
    <div class="text-white font-bold text-2xl mt-10">{{ headername }}</div>
</div>
<div class="flex flex-row text-white ml-48 mt-7">
    <div class="mt-1.5 mr-3">
        <div >Linn Ko Ko</div>
        <div class="opacity-80 text-right">Admin</div>
    </div>
    <img src="../../../public/img/php-developer.jpg" alt="" class="w-16 h-16 rounded-full ">
</div>
</div>
</div>

</template>