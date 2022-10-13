<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import NavLink from "../Components/NavLink.vue"

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
<NavLink/>
</template>
