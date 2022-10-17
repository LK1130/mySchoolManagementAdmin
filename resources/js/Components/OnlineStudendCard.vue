<template>
  <div class="custombackgroundcolor1 w-1/5 h-32 rounded-lg shadow-2xl text-white py-3 px-2">
    <div class="flex flex-row justify-between mb-4">
       <img  src="../../../public/img/php-developer.jpg"  alt="" class="w-10 rounded-full">
       <div>
        <div class="text-sm"> {{ studentname }} </div>
        <div class="text-sm opacity-70">{{ classname }}</div>
       </div>
       <span class="rounded-full w-4 h-4" :class="{custombackgroundcolor2:actcondition =='Active',custombackgroundcolor3:actcondition !=='Active'}"></span>
    </div>
    <hr class="w-5/6 mx-auto">
    <div class="flex flex-row justify-between mt-3">
        <div>
            <div class="text-xs opacity-70">{{address}}</div>
            <div class="text-xs">{{actcondition}}</div>
        </div>
        <button class="bg-blue-600 w-1/3 rounded-lg hover:bg-blue-700 active:bg-blue-800">View</button>
    </div>
  </div>
</template>

<script>
export default {
    props: {
    studentname: String,
    classname:String,
    address:String,
    actcondition:String,
    pfiamge:String,
  }
  

}
</script>

<style>

</style>