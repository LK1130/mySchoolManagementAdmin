<template>
  <div class="w-1/6 h-24 rounded-lg customnavcolor shadow-lg text-center">
  <div class="text-5xl font-bold mt-2.5" :class="{customtextcolor1:studenttype=='All Students',
  customtextcolor2:studenttype=='Japanese',customtextcolor3:studenttype=='Web Development',
  customtextcolor4:studenttype=='JAVA SE'}">
    {{studentcount}}
</div>
  <div class="text-white opacity-30">{{studenttype}}</div>

  </div>
</template>

<script>
export default {
      props: {
    studenttype: String,
    studentcount:Number
  }

}
</script>

<style>

</style>