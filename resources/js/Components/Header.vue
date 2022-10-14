
<template>
  <div class="fixed headercustomleft min-w-full h-32 customblack z-10">
<div class="grid grid-cols-2">
<div class="ml-5 ">
    <div class="text-white mt-3  sm:text-base text-xs"> {{hour}}</div>
    <div class="text-white font-bold sm:text-2xl mt-10 text-base">{{ headername }}</div>
</div>
<div class="flex flex-row text-white 2xl:ml-80 xl:ml-60 lg:ml-40 md:ml-20 ml-0 sm:mt-7 mt-10">
    <div class="mt-1.5 sm:mr-3 mr-1 sm:ml-5 ml-0">
        <div class="sm:text-base text-xs" >Linn Ko Ko</div>
        <div class="opacity-80 text-right sm:text-base text-xs">Admin</div>
    </div>
    <img src="../../../public/img/php-developer.jpg" alt="" class="sm:w-16 w-10 sm:h-16 h-10 rounded-full ">
</div>
</div>
</div>

</template>

<script>
export default {
data() {
    return {
        condition:true,
        hour:0
    }
  },
  methods: {
    calculate(second){
        this.hour=second;
    },
    gettime(){
    var today = new Date()
    var second =today.getSeconds();

    }
  
  },
  props: {
    headername: String
  },
  mounted() {
            this.gettime();
  }
}
</script>

<style>

</style>