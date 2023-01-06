<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import RecentAction from "../Components/RecentAction.vue";
import OnlineStudentCard from "../Components/OnlineStudendCard.vue";
const props=defineProps({
        allstudent : {
        type : Object
    },
        jpstudent: {
        type : Object
    },
        wbstudent: {
        type : Object
    },
        jvstudent: {
        type : Object
    },
        classdata: {
        type : Object
    },
});
const datesplit = (data) => {
  const fullday = [];
  var arrycount = 0;
  for (let index = 0; index < 7; index++) {
    var day = data.charAt(index);
    var output = dateshow(day, index);
    if (output != null) {
      fullday[arrycount++] = output;
    }
  }
  return fullday.toString();
};
const dateshow = (data, count) => {
  switch (count) {
    case 0:
      if (data == 1) {
        return "Sun";
      }
      break;
    case 1:
      if (data == 1) {
        return "Mon";
      }
      break;
    case 2:
      if (data == 1) {
        return "Tue";
      }
      break;
    case 3:
      if (data == 1) {
        return "Wed";
      }
      break;
    case 4:
      if (data == 1) {
        return "Thu";
      }
      break;
    case 5:
      if (data == 1) {
        return "Fri";
      }
      break;
    case 6:
      if (data == 1) {
        return "Sat";
      }
      break;
  }
};
const beforeaftercalculate = (starttime, endtime) => {
  var today = new Date();
  var hour = today.getHours();
  var starthour = starttime.slice(0, 2);
  var endhour = endtime.slice(0, 2);
  if (hour < starthour) {
    if (starthour - hour <= 3) {
      return "Before " + (starthour - hour) + " hours";
    }
  }
  if (hour >= starthour && hour <= endhour) {
    return "Live";
  }
  if (hour > endhour) {
    if (hour - endhour <= 3) {
      return "After " + (hour - endhour) + " hours";
    }
  }
};

const bafcolor = (start, end) => {
  var bafcd = beforeaftercalculate(start, end);
  if (bafcd != null) {
    var bafcondintion = bafcd.slice(0, 1);
    switch (bafcondintion) {
      case "B":
        return "beforecolor";
        break;

      case "L":
        return "livecolor";
        break;

      case "A":
        return "aftercolor";
        break;
    }
  }
};
</script>

<template>
  <!-------------------- Navbar&header -------------------->
  <NavBar active=1> </NavBar>
  <Header headername="Student" />
  <!---------------- body ----------------------->
  <div
    class="
      absolute
      flex flex-col
      h-full
      w-5/6
      headercustomleft
      top-32
      customblack
    "
  >
    <!--------------- 4 Student Coubt Box ---------------->
    <div
      class="
        grid
        md:grid-cols-4
        grid-cols-2
        md:place-content-evenly
        w-12/12
        place-items-center
      "
    >
      <div
        class="
          sm:w-44
          xl:w-52
          2xl:w-56
          w-28
          sm:h-24
          h-16
          rounded-lg
          customnavcolor
          shadow-lg
          text-center
          mt-2 
          order-1
        "
      >
        <div
          class="
            sm:text-5xl
            text-2xl
            font-bold
            sm:mt-2.5
            mt-1.5
            customtextcolor1
          "
        >
          {{ props.allstudent.length }}
        </div>
        <div class="text-white opacity-30 sm:text-base text-xs">
          All Students
        </div>
      </div>

      <div
        class="
          sm:w-44
          xl:w-52
          2xl:w-56
          w-28
          sm:h-24
          h-16
          rounded-lg
          customnavcolor
          shadow-lg
          text-center
          mt-2 
          order-2
        "
      >
        <div
          class="
            sm:text-5xl
            text-2xl
            font-bold
            sm:mt-2.5
            mt-1.5
            customtextcolor2
          "
        >
          {{ props.jpstudent.length }}
        </div>
        <div class="text-white opacity-30 sm:text-base text-xs">Japanese</div>
      </div>

      <div
        class="
          sm:w-44
          xl:w-52
          2xl:w-56
          w-28
          sm:h-24
          h-16
          rounded-lg
          customnavcolor
          shadow-lg
          text-center
          mt-2 
          order-3
        "
      >
        <div
          class="
            sm:text-5xl
            text-2xl
            font-bold
            sm:mt-2.5
            mt-1.5
            customtextcolor3
          "
        >
          {{ props.wbstudent.length }}
        </div>
        <div class="text-white opacity-30 sm:text-base text-xs">
          Web Development
        </div>
      </div>

      <div
        class="
          sm:w-44
          xl:w-52
          2xl:w-56
          w-28
          sm:h-24
          h-16
          rounded-lg
          customnavcolor
          shadow-lg
          text-center
          mt-2 
          order-4
        "
      >
        <div
          class="
            sm:text-5xl
            text-2xl
            font-bold
            sm:mt-2.5
            mt-1.5
            customtextcolor4
          "
        >
          {{ props.jvstudent.length }}
        </div>
        <div class="text-white opacity-30 sm:text-base text-xs">JAVA SE</div>
      </div>
    </div>

    <div class="sm:ml-12 ml-5 mt-7 flex md:flex-row flex-col">
      <!------------------- Active class table --------------------------------->
      <div class="md:w-6/12 w-11/12 overflow-hidden">
  <div class="flex flex-row justify-between ">
     <h3 class="text-white ">Active Class</h3>
     <div class="text-white text-xs ml-1 pt-1">SEE ALL</div>
  </div>
  <div class="custombackgroundcolor w-full max-h-max rounded-lg ml-0.5 mt-3  pl-3 py-4">
  <table  class="text-white w-11/12 ">
    <thead>
    <tr class="opacity-70 sm:text-sm customfontsize">
        <th class="text-start sm:pl-7 pl-0">NAME</th>
        <th >DAY</th>
        <th >TIME</th>
        <th >PERSON</th>
        <th >STATUS</th>
    </tr>
    </thead>
    <tbody class="lg:text-sm text-xs customfontsize">
    <tr class="customborder" v-for="(data,index) in classdata" :key="index" >
        <td class="text-start sm:pl-7 pl-0 py-1" v-if="index<5">{{data.c_name}}</td>
        <td  class="text-center py-1" v-if="index<5">{{datesplit(data.c_day)}}</td>
        <td  class="text-center py-1" v-if="index<5">{{data.c_start_time}} - {{data.c_end_time}} </td>
        <td  class="text-center py-1" v-if="index<5">{{data.StudenyCount}}</td>
        <td  class="text-center py-1" v-if="index<5" :class="bafcolor(data.c_start_time,data.c_end_time)">{{beforeaftercalculate(data.c_start_time,data.c_end_time)}}</td>
    </tr>
    </tbody>
  </table>
  </div>
  </div>
      <!--------------------- Recent Action ----------------------------->
      <RecentAction class="sm:ml-12 mx-auto" />
    </div>

    <!-- Online student -->
    <h3 class="text-white ml-20 mt-5">Online Students</h3>
    <div
      class="
        grid
        lg:grid-cols-4
        grid-cols-2
        lg:place-content-evenly
        w-12/12
        place-items-center
        mt-3.5
        mb-3.5
        customalign
      "
    >
      <OnlineStudentCard
        studentname="Thazin Aung"
        classname="SEJ"
        address="Taung Ngu,Bago"
        actcondition="Active"
      />
      <OnlineStudentCard
        studentname="Thazin Aung"
        classname="SEJ"
        address="Taung Ngu,Bago"
        actcondition="3 min ago"
        class="lg:ml-0 ml-3"
      />
      <OnlineStudentCard
        studentname="Thazin Aung"
        classname="SEJ"
        address="Taung Ngu,Bago"
        actcondition="Active"
        class="lg:mt-0 mt-3"
      />
      <OnlineStudentCard
        studentname="Thazin Aung"
        classname="SEJ"
        address="Taung Ngu,Bago"
        actcondition="1 hour ago"
        class="lg:mt-0 mt-3 lg:ml-0 ml-3"
      />
    </div>
  </div>
</template>
<style scoped>
.customalign {
  margin-bottom: 1.3em;
}
.beforecolor {
  color: #ffc652;
}
.livecolor {
  color: #33a02c;
}
.aftercolor {
  color: #ff6551;
}
@media screen and (max-width: 640px) {
    .customfontsize{
        font-size: 0.6em;
      }
    }
</style>
