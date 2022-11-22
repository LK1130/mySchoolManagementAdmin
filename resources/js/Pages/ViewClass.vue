<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import ClassInformationBox from "../Components/ClassInformationBox.vue";
import StudentListTableBox from "../Components/StudentListTableBox.vue";
import RecordingVideoListTableBox from "../Components/RecordingVideolistTablebox.vue";

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

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    classdata:Object,
    students:Object,
});
</script>

<template >
<!-------------------- Navbar&header -------------------->
<NavBar/>
<Header classaddmode=true />

<!---------------- body ----------------------->
<div class="absolute w-5/6 headercustomleft  top-32 customblack px-5 max-h-full">
<div class="flex flex-row mt-10 fixed sm:top-4 top-10 z-50 w-full">
<div class="text-white  font-bold sm:text-2xl  text-sm">{{classdata[0].cname}}</div>
 <a :href="route('class.edit',classdata[0].id)" class="mt-2 text-center bg-blue-600 hover:bg-blue-700 active:bg-blue-900 text-white sm:w-20 w-14 h-5 text-sm  rounded-md ml-7">
     Edit
</a>
</div>

<div class="custombackgroundcolor w-full text-white p-4 rounded-lg">
   <h3 class="sm:text-lg text-base">Class Information</h3>
   <img :src='"/storage/"+classdata[0].c_profile' alt="" class="rounded-full sm:w-20 w-14 sm:h-20 h-14 float-right">
   <div class="sm:text-2xl text-lg font-bold mt-2">{{classdata[0].cname}}</div>
   <p class="sm:text-sm text-xs opacity-80 mt-2 w-10/12">{{classdata[0].c_description }}</p>
   <div class="flex flex-row justify-between w-10/12 sm:text-sm text-xs mt-3">
    <div>
        <div>Date : <br class="sm:hidden block"><span>{{classdata[0].c_start_date }} - {{classdata[0].c_end_date  }}</span></div>
        <div class="mt-1">Day : <br class="sm:hidden block"><span>{{datesplit(classdata[0].c_date)}}</span></div>
        <div class="mt-1">Time : <br class="sm:hidden block"><span>{{classdata[0].c_start_time }} - {{classdata[0].c_end_time }}</span></div>
        <div class="mt-1">Person : <br class="sm:hidden block"><span>{{students.length}}</span></div>
    </div>
    <div>
        <div>Instructor : <br class="sm:hidden block"><span class="customtextcolor7 underline">{{classdata[0].i_name }}</span></div>
        <div class="mt-1">Category : <br class="sm:hidden block"><span class="customtextcolor7 underline">{{classdata[0].c_name}}</span></div>
        <div class="mt-1">Fees : <br class="sm:hidden block"><span>{{ Number(classdata[0].c_fees).toLocaleString() }}  Ks</span></div>
    </div>
   </div>
  </div>
<div class="flex flex-wrap mt-5 sm:justify-between justify-center">
<div class="sm:w-7/12 w-11/12">
    <h3 class="text-white">Student List</h3>
    <div class="custombackgroundcolor h-48   rounded-lg ml-0.5 mt-3 px-3 py-4 overflow-y-scroll">
  <table  class="text-white w-full ">
    <thead class="">
    <tr  class="opacity-70 sm:text-sm  customfontsize ">
        <th class="text-start sm:pl-4 pl-0 ">NAME</th>
        <th class="">Join Date</th>
        <th >Rank</th>
        <th >Paid Fees</th>
        <th >Remain Fees</th>
        <th >Detail</th>
    </tr>
    </thead>
    <tbody class="lg:text-sm text-xs customfontsize overflow-y-scroll">
    <tr class="customborder" v-for="student in students">
        <td class="text-start sm:pl-3 pl-0 py-1 customtextcolor7 underline">{{student.name}}</td>
        <td  class="text-center ">{{student.start_join}}</td>
        <td  class="text-center">1</td>
        <td  class="text-center">{{student.paid_fees}}</td>
        <td  class="text-center">{{student.remain_fees}}</td>
        <td  class="text-center customtextcolor7 underline">View</td>
     </tr>
  <!--  <tr class="customborder">
        <td class="text-start sm:pl-3 pl-0 py-1 customtextcolor7 underline">Thazin Aung</td>
        <td  class="text-center ">2022/09/10</td>
        <td  class="text-center">1</td>
        <td  class="text-center">200,000</td>
        <td  class="text-center">90,000</td>
        <td  class="text-center customtextcolor7 underline">View</td>
    </tr>
    <tr class="customborder">
        <td class="text-start sm:pl-3 pl-0 py-1 customtextcolor7 underline">Thazin Aung</td>
        <td  class="text-center ">2022/09/10</td>
        <td  class="text-center">1</td>
        <td  class="text-center">200,000</td>
        <td  class="text-center">90,000</td>
        <td  class="text-center customtextcolor7 underline">View</td>
    </tr>
    <tr class="customborder">
        <td class="text-start sm:pl-3 pl-0 py-1 customtextcolor7 underline">Thazin Aung</td>
        <td  class="text-center ">2022/09/10</td>
        <td  class="text-center">1</td>
        <td  class="text-center">200,000</td>
        <td  class="text-center">90,000</td>
        <td  class="text-center customtextcolor7 underline">View</td>
    </tr>
    <tr class="customborder">
        <td class="text-start sm:pl-3 pl-0 py-1 customtextcolor7 underline">Thazin Aung</td>
        <td  class="text-center ">2022/09/10</td>
        <td  class="text-center">1</td>
        <td  class="text-center">200,000</td>
        <td  class="text-center">90,000</td>
        <td  class="text-center customtextcolor7 underline">View</td>
    </tr>
    <tr class="customborder">
        <td class="text-start sm:pl-3 pl-0 py-1 customtextcolor7 underline">Thazin Aung</td>
        <td  class="text-center ">2022/09/10</td>
        <td  class="text-center">1</td>
        <td  class="text-center">200,000</td>
        <td  class="text-center">90,000</td>
        <td  class="text-center customtextcolor7 underline">View</td>
    </tr>
    <tr class="customborder">
        <td class="text-start sm:pl-3 pl-0 py-1 customtextcolor7 underline">Thazin Aung</td>
        <td  class="text-center ">2022/09/10</td>
        <td  class="text-center">1</td>
        <td  class="text-center">200,000</td>
        <td  class="text-center">90,000</td>
        <td  class="text-center customtextcolor7 underline">View</td>
    </tr> -->
    </tbody>
  </table>
  </div>
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
          .customfontsize{
        font-size: 0.6em;
      }
    }
</style>
