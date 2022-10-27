
<template>
  <div class="fixed headercustomleft min-w-full h-32 customblack z-10">
<div class="grid grid-cols-2">
<div class="ml-5 ">
    <div class="text-white mt-3  sm:text-base text-xs flex flex-row">
      <span>{{year}}/{{month}}/{{date}}</span>
      <span class="ml-1">{{hour}}:{{minute}}:{{seconds}}</span>
      <span class="ml-1">({{day}})</span>
    </div>
    <div class="flex flex-row mt-10" :class="{addclasscss:classaddmode}">
    <div class="text-white  font-bold sm:text-2xl  text-sm" :class="{dpnone:classaddmode}">{{ headername }}</div>
    <button class="hidden mt-2 bg-blue-600 hover:bg-blue-700 active:bg-blue-900 text-white sm:w-1/12 w-14 h-5 text-sm  rounded-md ml-7" :class="{btnblock:classviewmode}">
    Edit
    </button>
    <input type="text" class="classnameinput hidden sm:text-xl text-sm font-bold text-white" :class="{btnblock:classaddmode}" value="Web Developer Batch 9" >
    <button class="hidden mt-2.5 sm:w-6 w-4 sm:h-6 h-4 border-2 sm:text-sm text-xs rounded-full border-solid border-white text-white " :class="{btnblock:classaddmode}">+</button>
    </div>
    
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
        message:"",
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
    headername: String,
    classviewmode:Boolean,
    classaddmode:Boolean,
  },
  mounted() {
    this.gettime();
  }
}
</script>

<style scoped>
.btnblock{
  display: block !important;
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
.classnameinput:focus{
  border: #2B2B2B;
}
.dpnone{
  display: none;
}
@media screen and (max-width: 640px) {
.addclasscss{
  width: 90%;
}
    }
</style>