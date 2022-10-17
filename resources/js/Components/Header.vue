
<template>
  <div class="fixed headercustomleft min-w-full h-32 customblack z-10">
<div class="grid grid-cols-2">
<div class="ml-5 ">
    <div class="text-white mt-3  sm:text-base text-xs flex flex-row">
      <span>{{year}}/{{month}}/{{date}}</span>
      <span class="ml-1">{{hour}}:{{minute}}:{{seconds}}</span>
      <span class="ml-1">({{day}})</span>
    </div>
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
        year:0,
        month:0,
        date:0,
        day:"",
        hour:0,
        minute:0,
        seconds:0,
    }
  },
  methods: {
    gettime(){
    setInterval(() => {
    var today = new Date()
    this.seconds =today.getSeconds()+1;
    this.minute=today.getMinutes()+1;
    this.hour=today.getHours();
    this.year=today.getFullYear();
    this.month=today.getMonth()+1;
    this.date=today.getDate();
    var days=today.getDay();
    switch (days) {
      case 0:
        this.day="SUN";
      break;

      case 1:
        this.day="MON";
      break;

      case 2:
        this.day="TUE";
      break;

      case 3:
        this.day="WED";
      break;

      case 4:
        this.day="THU";
      break;

      case 5:
        this.day="FRI";
      break;

      case 6:
        this.day="SAT";
      break;
    }
    }, 10);
    },
  
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