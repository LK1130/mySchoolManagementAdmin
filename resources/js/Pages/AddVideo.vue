<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import { ref } from '@vue/reactivity';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
var dnone=true;
const imgSrc = ref("");
const onFile = (e) => {
    const files = e.target.files
    if (!files.length) return
    
    const reader = new FileReader()
    reader.readAsDataURL(files[0])
    var imgname=files[0].name
    reader.onload = () => (imgSrc.value = reader.result,dnone=false)
    form.classimage=files[0];
    
}
const showphoto=()=>
{
 if(dnone){
  return "displaynone"
 }
}
var dnone1=true;
const imgSrc1 = ref("");
const onFile1 = (e) => {
    const files = e.target.files
    if (!files.length) return
    
    const reader = new FileReader()
    reader.readAsDataURL(files[0])
    var imgname=files[0].name
    reader.onload = () => (imgSrc1.value = reader.result,dnone1=false)
    form.classimage=files[0];
    
}
const showphoto1=()=>
{
 if(dnone1){
  return "displaynone"
 }
}
const addleacture=()=>{
    console.log("add")
}
</script>

<template>
<!-------------------- Navbar&header -------------------->
<NavBar/>
<Header   />

<!---------------- body ----------------------->
<div  class="mx-72 pt-32 px-4 customwidth mb-5">
<div class="addvideobodycolor w-full h-full rounded-md flex ">
<div class="mx-5 my-5 w-1/2">
    <div class="text-white font-bold text-lg">Video Upload</div>
    <div class="text-white">file</div>
    <div class="file-area text-white opacity-60 mt-2 ">
    <img :src="imgSrc" alt="" class="w-full h-40 absolute" :class="showphoto()">
    <input type="file" accept="image/*" @change="onFile">
    <div class="file-dummy">
        <span class="text-xs"><span class="font-semibold">Click to upload </span> or drag it here</span>
        <br>
        <span class="text-xs">SVG,PNG,JPG or GIF(Max.800x400px)</span>
    </div>
    </div>
    <div class="text-white mt-2">Name</div>
    <input type="text"  class="addvideobodycolor text-white sm:text-sm text-xs rounded-2xl  w-7/12 customborder1 mt-1">
    <div class="text-white mt-2">Description</div>
    <textarea name="" id=""    class="addvideobodycolor mt-1 text-white sm:text-sm text-xs rounded-lg  w-full  customborder1"></textarea>
    <div class="text-white mt-2">Date</div>
    <input type="text"  class="addvideobodycolor text-white sm:text-sm text-xs rounded-2xl  w-5/12 customborder1 mt-1">
    <div class="text-white mt-2">Storage Link</div>
    <input type="text"  class="addvideobodycolor text-white sm:text-sm text-xs rounded-2xl  w-full customborder1 mt-1">
    <div class="text-white mt-2">Storage Location</div>
    <select id="sorttype"  name="status" class="addvideobodycolor text-white sm:text-sm text-xs rounded-2xl  w-7/12 customborder1 mt-1">
        <option value="" class="sm:text-sm text-xs">You Tube</option>
        <option value="" class="sm:text-sm text-xs">Google Drive</option>
    </select>
</div>
<div class="linewidth linecolor"></div>
<div class="mx-5 my-5">
<div class="text-white font-bold text-lg">Lecture Upload</div>
<button class="pt-0.5  w-40 h-7 text-white rounded-lg flex  bg-blue-600 hover:bg-blue-700 active:bg-blue-900 cusmargin mt-2" @click="addleacture()">
<img src="../../../public/img/addlogo.png" alt="" class="w-5 h-5 pt-0.5 ml-3">
<span class="ml-2">Create Lecture</span>
</button>
<button type="button" class="mt-5 sm:w-7 w-4 sm:h-7 h-4 border-2 sm:text-sm text-xs rounded-full border-solid border-red-600 text-red-600 float-right">---</button>
    <div>
    <div class="text-white mt-2">Name</div>
    <input type="text"  class="addvideobodycolor text-white sm:text-sm text-xs rounded-2xl  w-7/12 customborder1 mt-1">
    <div class="text-white mt-2">file</div>
    <div class="file-area text-white opacity-60 mt-2 ">
    <img :src="imgSrc1" alt="" class="w-full h-40 absolute" :class="showphoto1()">
    <input type="file" accept="image/*" @change="onFile1">
    <div class="file-dummy">
        <span class="text-xs"><span class="font-semibold">Click to upload </span> or drag it here</span>
        <br>
        <span class="text-xs">SVG,PNG,JPG or GIF(Max.800x400px)</span>
    </div>
    </div>
    <div class="text-white mt-2">Storage Link</div>
    <input type="text"  class="addvideobodycolor text-white sm:text-sm text-xs rounded-2xl  w-full customborder1 mt-1">
    <div class="text-white mt-2">Storage Location</div>
    <select id="sorttype"  name="status" class="addvideobodycolor text-white sm:text-sm text-xs rounded-2xl  w-7/12 customborder1 mt-1">
        <option value="" class="sm:text-sm text-xs">You Tube</option>
        <option value="" class="sm:text-sm text-xs">Google Drive</option>
    </select>
    </div>
    <hr class="mt-5">
    <div>
    <div class="text-white mt-2">Name</div>
    <input type="text"  class="addvideobodycolor text-white sm:text-sm text-xs rounded-2xl  w-7/12 customborder1 mt-1">
    <div class="text-white mt-2">file</div>
    <div class="file-area text-white opacity-60 mt-2 ">
    <img :src="imgSrc1" alt="" class="w-full h-40 absolute" :class="showphoto()">
    <input type="file" accept="image/*" @change="onFile">
    <div class="file-dummy">
        <span class="text-xs"><span class="font-semibold">Click to upload </span> or drag it here</span>
        <br>
        <span class="text-xs">SVG,PNG,JPG or GIF(Max.800x400px)</span>
    </div>
    </div>
    <div class="text-white mt-2">Storage Link</div>
    <input type="text"  class="addvideobodycolor text-white sm:text-sm text-xs rounded-2xl  w-full customborder1 mt-1">
    <div class="text-white mt-2">Storage Location</div>
    <select id="sorttype"  name="status" class="addvideobodycolor text-white sm:text-sm text-xs rounded-2xl  w-7/12 customborder1 mt-1">
        <option value="" class="sm:text-sm text-xs">You Tube</option>
        <option value="" class="sm:text-sm text-xs">Google Drive</option>
    </select>
    </div>
    <hr class="mt-5">

</div>
</div>


</div>

</template>
<style scoped>
.addvideobodycolor{
    background-color: #333333;
}
.linecolor{
    background-color: #777777;
}
.linewidth{
    width: 0.05em;
}

.file-area {
        width: 25em;
        position: relative;
        font-size: 18px;
    }
    .file-area input[type=file] {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0;
        cursor: pointer;
    }
    .file-area .file-dummy {
        width: 100%;
        padding: 50px 30px;
        border-width: 1px 0px 1px 0px;
        border-style: dashed;
        border-color: #777777;
        background-color: rgba(55,65,81,255);
        text-align: center;
        transition: background 0.3s ease-in-out;
    }
    .customborder1{
    border: 0.01em solid gainsboro;
    }
    .displaynone{
        display: none;
    }
    .customwidth{
        width: 80%;
    }
</style>
