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
    dclass:Object,
});

const datesplit = (data) => {
    const fullday=[];
    var arrycount=0;
    for (let index = 0; index < 7; index++) {
        var day = data.charAt(index)
        var output=dateshow(day,index);
        if (output!=null) {
            fullday[arrycount++]=output;
        }    
    }
    return fullday.toString();
} ;
const dateshow = (data,count) =>{
    switch (count) {
        case 0:
        if (data==1) {
            return "Sun"
        }    
        break;
        case 1:
        if (data==1) {
            return "Mon"
        }    
        break;
        case 2:
        if (data==1) {
            return "Tue"
        }    
        break;
        case 3:
        if (data==1) {
            return "Wed"
        }    
        break;
        case 4:
        if (data==1) {
            return "Thu"
        }    
        break;
        case 5:
        if (data==1) {
            return "Fri"
        }    
        break;
        case 6:
        if (data==1) {
            return "Sat"
        }    
        break;
    }
};
// datesplit();
</script>

<template >
<!-------------------- Navbar&header -------------------->
<NavBar/>
<Header headername="Class" />
<!---------------- body ----------------------->
<div class="absolute w-5/6  headercustomleft  top-32 customblack">
 <div class="text-white sm:text-sm text-xs popfont flex justify-between px-4">

<div>
<span>
<input type="checkbox" class="css-checkbox" id="checkbox1"  checked="checked" />
<label for="checkbox1"  class="css-label lite-gray-check sm:text-base text-xs">Japanese</label>
</span>
<span class="sm:ml-3 ml-0 sm:mt-0 mt-2">
<input type="checkbox" class="css-checkbox" id="checkbox2"  checked="checked"/>
<label for="checkbox2"  class="css-label lite-gray-check sm:text-base text-xs">Web Development</label>
</span>
<br class="sm:hidden block">
<span class="sm:ml-3 ml-0 sm:mt-0 mt-2">
<input type="checkbox" class="css-checkbox" id="checkbox3"  checked="checked"/>
<label for="checkbox3"  class="css-label lite-gray-check sm:text-base text-xs">Java</label>
</span>
</div>

<div class="dopd ">
<select id="sorttype" name="status" class="bg-black text-white border-white rounded-xl customfontsize1">
<option value="status" class="customfontsize1">By status</option>
<option value="name" class="customfontsize1">By Name</option>
<option value="person" class="customfontsize1">By Person</option>
 </select>
</div>

</div>

<div class="px-4 my-6">
<table class="text-white w-full rounded-lg custombackgroundcolor mb-5">
    <tr class=" opacity-70 customfontsize">
        <th class="text-start pl-5 pt-4">NAME</th>
        <th class="pt-4">Instructor</th>
        <th class="pt-4">DAY</th>
        <th class="pt-4">TIME</th>
        <th class="pt-4">PERSON</th>
        <th class="pt-4">STATUS</th>
        <th class="pt-4">Fees</th>
        <th class="pt-4">Setting</th>
    </tr>
    <tbody class="text-sm customfontsize">
    <tr class="cusborder" v-for="data in dclass">
        <td class="text-start pl-4 py-2">{{data.c_name}}</td>
        <td class="text-center">{{data.i_name}}</td>
        <td class="text-center" >{{datesplit(data.c_date)}}</td>
        <td class="text-center">{{data.c_start_time}} - {{data.c_end_time}} </td>
        <td class="text-center">25</td>
        <td class="text-center customtextcolor6">After 3 hours</td>
        <td class="text-center">{{ Number(data.c_fees).toLocaleString() }} Ks</td>
        <td class="text-center customtextcolor7 underline">Edit</td>
    </tr>
    </tbody>
</table>
<a href="/class/create"><button class="pt-0.5 sm:w-1/12 w-20 h-7 text-white rounded-lg flex justify-center bg-blue-600 hover:bg-blue-700 active:bg-blue-900 cusmargin">
<ion-icon name="add-circle-outline"></ion-icon>
<img src="../../../public/img/addlogo.png" alt="" class="w-5 h-5 pt-0.5">
<span class="ml-1">ADD</span>
</button>
</a>
</div>

</div>
</template>
<style scoped>
.customalign{
    margin-bottom: 1.3em;
}
.popfont{
    font-family:poppins !important;
}
.cusborder{
  border-style: solid;
  border-bottom-width: 0.13em;
  border-color: rgba(255, 255, 255, 0.2);
}
.cusmargin{
    margin-bottom: 5.63em;
}
@media screen and (max-width: 640px) {
    .customfontsize{
        font-size: 0.4em !important;
      }
    .customfontsize1{
        font-size: 0.9em !important;
      }
    }
</style>
