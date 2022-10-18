<template>
  <div class="custombackgroundcolor1 sm:w-56 w-22 h-32 rounded-lg shadow-2xl text-white py-3 px-2">
    <div class="flex flex-row justify-between mb-4">
       <img src="../../../public/img/php-developer.jpg"  alt="" class="sm:w-10 w-6 rounded-full">
       <div>
        <div class="sm:text-sm customfontsize1"> {{ studentname }} </div>
        <div class="sm:text-sm customfontsize1 opacity-70">{{ classname }}</div>
       </div>
       <span class="rounded-full sm:w-4 w-2 sm:h-4 h-2" :class="{custombackgroundcolor2:actcondition =='Active',custombackgroundcolor3:actcondition !=='Active'}"></span>
    </div>
    <hr class="w-5/6 mx-auto">
    <div class="flex flex-row justify-between mt-3">
        <div>
            <div class="sm:text-xs customfontsize opacity-70">{{address}}</div>
            <div class="sm:text-xs customfontsize">{{actcondition}}</div>
        </div>
        <button class="bg-blue-600 w-1/3 rounded-lg hover:bg-blue-700 active:bg-blue-800 sm:text-base text-xs">View</button>
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
  }
  

}
</script>

<style scoped>
@media screen and (max-width: 640px) {
    .customfontsize{
        font-size: 0.5em;
      }
          .customfontsize1{
        font-size: 0.6em;
      }
    }

</style>