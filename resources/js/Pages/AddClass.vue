<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import AddClassInformation from "../Components/AddClassInformation.vue";
import EachBatchStudentTable from "../Components/EachBatchStudentTable.vue";



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
<h3 class="text-white pt-1 ">Student Name : </h3>
<input type="text" class="customnavcolor sm:ml-3 ml-2  text-white sm:text-sm text-xs rounded-lg sm:w-1/4 w-24 customborder" placeholder="name">
<button class=" w-20 bg-blue-600 hover:bg-blue-700 active:bg-blue-900 rounded-lg p-1 ml-3 text-white sm:text-sm text-xs">Search</button>
</div>
<EachBatchStudentTable class="sm:w-2/4 w-4/4"/>
<button class=" pt-0.5 float-right  mb-3  w-28 h-7 mt-5  text-white rounded-lg flex justify-center bg-blue-600 hover:bg-blue-700 active:bg-blue-900 cusmargin">
<img src="../../../public/img/bx_save.png" alt="" class="w-5 h-5 pt-0.5">
<span class="ml-2 sm:text-base text-xs sm:pt-0 pt-1">Save</span>
</button>
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
