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
    classdata:Object,
});
</script>

<template >
<!-------------------- Navbar&header -------------------->
<NavBar/>
<Header headername="Web Developer Batch 9" classviewmode=true />
<!---------------- body ----------------------->
<div class="absolute w-5/6 headercustomleft  top-32 customblack px-5">
<div class="custombackgroundcolor w-full text-white p-4 rounded-lg">
   <h3 class="sm:text-lg text-base">Class Information</h3>
   <img src="../../../public/img/php-developer.jpg" alt="" class="rounded-full sm:w-20 w-14 float-right">
   <div class="sm:text-2xl text-lg font-bold mt-2">{{classdata[0].c_name}}</div>
   <p class="sm:text-sm text-xs opacity-80 mt-2 w-10/12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui ad adipisci officiis, exercitationem impedit, nemo quaerat sunt distinctio minus quis voluptates illum officia minima voluptas tenetur iste fugiat quae nihil. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima, perferendis minus vitae rerum ea aspernatur veniam distinctio repellendus harum at, quasi sed, magnam sequi eligendi! Adipisci esse sed enim eum.</p>
   <div class="flex flex-row justify-between w-10/12 sm:text-sm text-xs mt-3">
    <div>
        <div>Date : <br class="sm:hidden block"><span> 2022/12/01 - 2023/12/01</span></div>
        <div class="mt-1">Day : <br class="sm:hidden block"><span> Mon,Tue,Fri</span></div>
        <div class="mt-1">Time : <br class="sm:hidden block"><span>13:00 - 15:00</span></div>
        <div class="mt-1">Person : <br class="sm:hidden block"><span>20</span></div>
    </div>
    <div>
        <div>Instructor : <br class="sm:hidden block"><span class="customtextcolor7 underline">Linn Ko Ko</span></div>
        <div class="mt-1">Category : <br class="sm:hidden block"><span class="customtextcolor7 underline"> WEB</span></div>
        <div class="mt-1">Fees : <br class="sm:hidden block"><span>290,000 Ks</span></div>
    </div>
   </div>
  </div>
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
