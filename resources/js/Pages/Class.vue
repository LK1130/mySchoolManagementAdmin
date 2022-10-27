<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import ClassTable from "../Components/ClassTable.vue";



defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template >
<!-------------------- Navbar&header -------------------->
<NavBar/>
<Header headername="Class" />
<!---------------- body ----------------------->
<div class="absolute w-5/6  headercustomleft  top-32 customblack">
 <ClassTable/>

</div>
</template>
<style scoped>
.customalign{
    margin-bottom: 1.3em;
}

</style>
