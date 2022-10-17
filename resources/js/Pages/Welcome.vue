<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import StudentCountBox from "../Components/StudentCountBox.vue";
import ActiveClassTable from "../Components/ActiveClassTable.vue";
import RecentAction from "../Components/RecentAction.vue";
import OnlineStudentCard from "../Components/OnlineStudendCard.vue";


defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
<!-------------------- Navbar&header -------------------->
<NavBar/>
<Header headername="Student" />
<!---------------- body ----------------------->
<div class="absolute w-5/6 headercustomleft top-32 customblack min-h-max pb-5">
<!--------------- 4 Student Coubt Box ---------------->
<div class="flex flex-wrap  sm:justify-evenly justify-center ">
<StudentCountBox studentcount=140 studenttype="All Students" class=" mt-2 order-1"/>
<StudentCountBox studentcount=65 studenttype="Japanese" class="ml-3 mt-2 order-2"/>
<StudentCountBox studentcount=45 studenttype="Web Development" class="ml-3 mt-2 order-3"/>
<StudentCountBox studentcount=30 studenttype="JAVA SE" class="ml-3 mt-2 order-4"/>
</div>

<div class="ml-20 mt-7 flex flex-row">
    <!------------------- Active class table --------------------------------->
    <ActiveClassTable />
    <!--------------------- Recent Action ----------------------------->
    <RecentAction class="ml-5"/>
</div>

<!-- Online student -->
<h3 class="text-white ml-20 mt-5">Online Students</h3>
<div class="flex flex-row ml-20 mt-3">
    <OnlineStudentCard studentname="Thazin Aung" classname="SEJ" address="Taung Ngu,Bago" actcondition="Active" pfimage=""/>
</div>
</div>
</template>
