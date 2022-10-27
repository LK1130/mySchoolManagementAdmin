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
<div class="flex flex-wrap mt-5 sm:justify-between justify-center">
<div class="sm:w-7/12 w-11/12">
    <h3 class="text-white">Student List</h3>
    <StudentListTableBox />
</div>
<div class="cuswidth sm:mt-0 mt-5">
    <h3 class="text-white">Recording Video List</h3>
    <RecordingVideoListTableBox />
</div>
</div>
</div>
</template>
<style scoped>
.customalign{
    margin-bottom: 1.3em;
}
.cuswidth{
    width: 40%;
}

@media screen and (max-width: 640px) {
    .cuswidth{
        width:80% ;
      }
    }
</style>
