<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import ClassInformationBox from "../Components/ClassInformationBox.vue";
import StudentListTableBox from "../Components/StudentListTableBox.vue";
import RecordingVideoListTableBox from "../Components/RecordingVideolistTablebox.vue";



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
<Header headername="Web Developer Batch 9" classviewmode=true />
<!---------------- body ----------------------->
<div class="absolute w-5/6 headercustomleft  top-32 customblack px-5">
<ClassInformationBox/>
<div class="flex flex-row mt-5 justify-between">
<div class="w-7/12">
    <h3 class="text-white">Student List</h3>
    <StudentListTableBox />
</div>
<div class="cuswidth">
    <h3 class="text-white">Recording Video List</h3>
    <RecordingVideoListTableBox />
</div>
</div>
<button class="float-right pt-0.5 custommb w-1/6 h-7 mt-5  text-white rounded-lg flex justify-center bg-blue-600 hover:bg-blue-700 active:bg-blue-900 cusmargin">
<img src="../../../public/img/addlogo.png" alt="" class="w-5 h-5 pt-0.5">
<span class="ml-1">Add Video</span>
</button>
</div>
</template>
<style scoped>
.customalign{
    margin-bottom: 1.3em;
}
.cuswidth{
    width: 40%;
}
.custommb{
    margin-bottom: 0.93em;
}
</style>
