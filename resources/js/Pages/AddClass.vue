<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import AddClassInformation from "../Components/AddClassInformation.vue";



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
<Header headername="Web Developer Batch 9" classaddmode=true />
<!---------------- body ----------------------->
<div class="absolute w-5/6 headercustomleft  top-32 customblack px-5">
<AddClassInformation class="my-5"/>
<div class="flex flex-row mb-3">
<h3 class="text-white pt-1">Student Name : </h3>
<input type="text" class="customnavcolor ml-3  text-white text-sm rounded-lg w-1/4 customborder" placeholder="name">
<button class=" w-20 bg-blue-700 rounded-lg p-1 ml-3 text-white">Search</button>
</div>
</div>
</template>
<style scoped>
.customalign{
    margin-bottom: 1.3em;
}
.customborder{
    border: 0.01em solid white;

}
</style>
