<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import { ref } from '@vue/reactivity';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    classdata : {
        type : Object
    },
    instructor : {
        type : Object
    },
    category : {
        type : Object
    },
    student : {
        type : Object
    },
        day : {
        type : Object
    },
    studentsids: {
        type : Object
    },
    date1: {
        type : Object
    },
        date2: {
        type : Object
    },
        date3: {
        type : Object
    },
        date4: {
        type : Object
    },
        date5: {
        type : Object
    },
        date6: {
        type : Object
    },
            date7: {
        type : Object
    },
})


const form = useForm({
    _method : "PUT",
    classnames:props.classdata[0].c_name,
    classimage: null,
    classdetail: props.classdata[0].c_description,
    startdate: props.classdata[0].c_start_date ,
    enddate:props.classdata[0].c_end_date ,
    day1 : 0 ,
    day2 : 0 ,
    day3 : 0 ,
    day4 : 0 ,
    day5 : 0 ,
    day6 : 0 ,
    day7 : 0 ,
    starttime : props.classdata[0].c_start_time ,
    endtime : props.classdata[0].c_end_time ,
    teacher: props.classdata[0].instructor_id ,
    categories:props.classdata[0].category_id ,
    fees: props.classdata[0].c_fees ,
    students: null ,
    
});
const testarry=[]
var arrycount=0
const toarry=(a)=>{
 a.forEach(element => {
  testarry[arrycount++]=element.user_id
 });

}
const adddate=()=>{
  if (props.date1==1) {
    form.day1=true;
  }
    if (props.date2==1) {
    form.day2=true;
  }
    if (props.date3==1) {
    form.day3=true;
  }
    if (props.date4==1) {
    form.day4=true;
  }
    if (props.date5==1) {
    form.day5=true;
  }
    if (props.date6==1) {
    form.day6=true;
  }
    if (props.date7==1) {
    form.day7=true;
  }
  
}
adddate();
toarry(props.studentsids);
var studentid = ref(testarry);
var testdate=true;

var checkedcd=true
var day=props.classdata[0].c_day
var dayone=day.charAt(0)
var daytwo=day.charAt(1)
var daythree=day.charAt(2)
var dayfour=day.charAt(3)
var dayfive=day.charAt(4)
var daysix=day.charAt(5)
var dayseven=day.charAt(6)
const imgSrc = ref("/storage/"+props.classdata[0].c_profile);
const onFile = (e) => {
    const files = e.target.files
    if (!files.length) return
    
    const reader = new FileReader()
    reader.readAsDataURL(files[0])
    var imgname=files[0].name
    reader.onload = () => (imgSrc.value = reader.result)
    form.classimage=files[0];
    console.log(form.classimage)
}

const submit = () => {
  form.students=studentid;
  console.log(form);
    form.post(route('class.update',props.classdata[0].id));
};

</script>

<template >
<!-------------------- Navbar&header -------------------->
<NavBar/>
<Header headername="Web Developer Batch 9" classaddmode=true />

<!---------------- body ----------------------->
<div class="absolute w-5/6 headercustomleft  top-32 customblack px-5">
<form @submit.prevent="submit">
<div class="flex flex-row mt-10 addclasscss fixed sm:top-4 top-10 z-50" >
<input type="text"  class="classnameinput  sm:text-xl text-sm font-bold text-white"  v-model="form.classnames">
<button type="button" class="mt-2 sm:w-7 w-4 sm:h-7 h-4 border-2 sm:text-sm text-xs rounded-full border-solid border-white text-white " @click="form.classnames=''"> &#9587</button>
</div>

<div class="my-5">
    <div class="customnavcolor w-full text-white p-4 rounded-lg">
   <h3 class="sm:text-lg text-base">Class Information</h3>
   <div class="float-right">
   <img :src="imgSrc" alt="" class="rounded-full sm:w-20 sm:h-20 h-14 w-14" >
<label for="file-upload" class="custom-file-upload sm:w-20 w-14 bg-blue-600 hover:bg-blue-700 active:bg-blue-900 sm:text-base text-xs rounded-lg p-1 mt-4">
    Upload
</label>
<input id="file-upload" type="file" accept="image/*" @change="onFile"/>
   </div>
   <div class="sm:text-2xl text-lg font-bold mt-2" >{{ form.classnames }}</div>
   <textarea name="" id=""  v-model="form.classdetail"  class="text-white w-10/12 mt-2 sm:text-sm text-xs customnavcolor rounded-xl customborder1"></textarea>
   <div class="flex sm:flex-row flex-col justify-between w-10/12 text-sm mt-3">
  
    <div>
        <div>Date :
            
            <span>
            <input type="text" v-model="form.startdate" class="customnavcolor text-white sm:text-sm text-xs rounded-lg sm:w-1/4 w-16 customborder1">
            </span>
            -
            <span>
            <input type="text" v-model="form.enddate" class="customnavcolor text-white sm:text-sm text-xs rounded-lg sm:w-1/4 w-16 customborder1">
        </span> 
        </div>
      <div class="mt-3  flex flex-row ">Day: 
       <span class="flex flex-wrap mt-0.5 sm:text-sm text-xs">  
       <input type="checkbox"  v-model="form.day1" value="1" class="daycheckbox mt-0.5 ml-3" checked/>
       <label for="" class="ml-2">SUN</label>
       
       <input type="checkbox"  v-model="form.day2" value="1" class="daycheckbox mt-0.5 ml-3" checked/>
       <label for="" class="ml-2">Mon</label>

       <input type="checkbox"  v-model="form.day3" value="1" class="daycheckbox mt-0.5 ml-3"/>
       <label for="" class="ml-2">TUE</label>

       <input type="checkbox"  v-model="form.day4" value="1" class="daycheckbox mt-0.5 ml-3"/>
       <label for="" class="ml-2">WED</label>

       <input type="checkbox"  v-model="form.day5" value="1" class="daycheckbox mt-0.5 ml-3"/>
       <label for="" class="ml-2">THU</label>

     <input type="checkbox" name="checkbox6" v-model="form.day6" value="1" class="daycheckbox mt-0.5 ml-3"/>
       <label for="" class="ml-2">FRI</label>

       <input type="checkbox"  v-model="form.day7" value="1" class="daycheckbox mt-0.5 ml-3"/>
       <label for="" class="ml-2">SAT</label>

       </span>

        </div>
        <div class="mt-3">Time : 
           <span>
            <input type="text" v-model="form.starttime" class="customnavcolor text-white sm:text-sm text-xs rounded-lg sm:w-1/4 w-16 customborder1">
            </span>
            -
            <span>
            <input type="text" v-model="form.endtime" class="customnavcolor text-white sm:text-sm text-xs rounded-lg sm:w-1/4 w-16 customborder1">
            </span>
        </div>
        <div class="mt-3">Person : <span>{{studentid.length}}</span></div>
    </div>
    <div>
        <div class="sm:mt-0 mt-3">Instructor : 
        <span class="" >
        <select id="sorttype"  v-model="form.teacher" name="status" class="customnavcolor sm:text-sm text-xs sm:w-52 w-32 text-white border-white rounded-xl">
        <option v-for="item in instructor" :value="item.id" class="sm:text-sm text-xs">{{item.i_name}}</option>
        </select>
        </span>
        </div>
        <div class="mt-3">Category :
        <span class="">
        <select id="sorttype" name="status" v-model="form.categories" class="customnavcolor sm:text-sm text-xs text-white border-white rounded-xl sm:w-52 w-32">
        <option v-for="data in category" :value="data.id" class="sm:text-sm text-xs">{{data.c_name}}</option>
        </select>
        </span>
        </div>
        <div class="mt-3">Fees : <span class="pl-7"><input type="text" v-model="form.fees" class="customnavcolor text-white sm:text-sm text-xs rounded-lg sm:w-52 w-32 customborder1"></span></div>
    </div>
   </div>
  </div>
</div>
<div class="flex flex-row mb-3">
<h3 class="text-white pt-1 ">Student Name : </h3>
<input type="text" class="customnavcolor sm:ml-3 ml-2  text-white sm:text-sm text-xs rounded-lg sm:w-1/4 w-24 customborder1" placeholder="name">
<button type="button" class=" w-20 bg-blue-600 hover:bg-blue-700 active:bg-blue-900 rounded-lg p-1 ml-3 text-white sm:text-sm text-xs">Search</button>
</div>
<div class="sm:w-2/4 w-4/4">
<div class="custombackgroundcolor h-48   rounded-lg  mt-3 px-3 py-4 overflow-y-scroll my-5">
  <table  class="text-white w-full">
    <thead class="">
    <tr class="opacity-70 sm:text-sm customfontsize ">
        <th class="text-start pl-8">NAME</th>
        <th class="">Phone</th>
        <th >Address</th>
        <th>Age</th>
        <th >Detail</th>
    </tr>
    </thead>
    <tbody class="lg:text-sm text-xs customfontsize overflow-y-scroll">
    <tr class="customborder" v-for="user in student">
        <td class="text-start  py-1" >
       <input  type="checkbox" v-model="studentid" name="checkbox" :value="user.id"  class="cuscheckbox"/>
       {{user.name}}</td>
        <td  class="text-center ">{{user.phone}}</td>
        <td class="text-center ">{{user.address}}</td>
        <td  class="text-center">{{user.Age}}</td>
        <td  class="text-center customtextcolor7 underline">View</td>
    </tr>
    </tbody>
  </table>
  </div>
</div>
<button type="submit" class=" pt-0.5 float-right  mb-3  w-28 h-7 mt-5  text-white rounded-lg flex justify-center bg-blue-600 hover:bg-blue-700 active:bg-blue-900 cusmargin">
<img src="../../../public/img/bx_save.png" alt="" class="w-5 h-5 pt-0.5">
<span class="ml-2 sm:text-base text-xs sm:pt-0 pt-1" >Save</span>
</button>
</form>
<div class="text-white">{{props.day}}</div>
<div class="text-white">{{props.date1}}</div>
<div class="text-white">{{props.date2}}</div>
<div class="text-white">{{props.date3}}</div>
<div class="text-white">{{props.date4}}</div>
<div class="text-white">{{props.date5}}</div>
<div class="text-white">{{props.date6}}</div>
<div class="text-white">{{props.date7}}</div>
</div>
</template>
<style scoped>
input[type="checkbox"].daycheckbox {
  appearance: none;
  background-color: rgba(217, 217, 217, 0.36);
  font: inherit;
  color: currentColor;
  width: 1.15em;
  height: 1.15em;
  border-radius: 50%;
  transform: translateY(-0.075em);
  display: grid;
  place-content: center;
}
input[type="checkbox"].daycheckbox::before {
  content: "";
  width: 1.15em;
  height: 1.15em;
  border-radius: 50%;
  transform: scale(0);
  transition: 120ms transform ease-in-out;
  box-shadow: inset 1em 1em #304BFC;
}

input[type="checkbox"].daycheckbox:checked::before {
  transform: scale(1);
}
.customborder1{
    border: 0.01em solid white;

}
.customalign{
    margin-bottom: 1.3em;
}
input[type="checkbox"].cuscheckbox {
  font: inherit;
  color:#FFC652;
  width: 1.15em;
  height: 1.15em;
  transform: translateY(-0.075em);
  margin-right: 0.7em;
}
.addclasscss{
  background-color: #2B2B2B;
  border: 1px solid white;
  border-radius: 1em;
  width: 52%;
}
.classnameinput{
  background-color: #2B2B2B;
  border-radius: 1em;
  border: #2B2B2B;
  width: 90%;
}
.imginput{
  visibility: hidden;
}
.imginputdiv{
  background-color: #304BFC;
  overflow: hidden;
}
input[type="file"] {
    display: none;
}
.custom-file-upload {
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
.profileimgnoborder{
  border: white 2px solid;
}
@media screen and (max-width: 640px) {
    .customfontsize{
        font-size: 0.6em !important;
      }
    }
</style>
