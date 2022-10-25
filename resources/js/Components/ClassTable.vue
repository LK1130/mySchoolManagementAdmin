<template>
<div class="text-white text-sm popfont flex justify-between px-4">

<div>
<span>
<input type="checkbox" class="css-checkbox" id="checkbox1"  checked="checked" />
<label for="checkbox1"  class="css-label lite-gray-check">Japanese</label>
</span>
<span class="ml-3">
<input type="checkbox" class="css-checkbox" id="checkbox2"  checked="checked"/>
<label for="checkbox2"  class="css-label lite-gray-check">Web Development</label>
</span>
<span class="ml-3">
<input type="checkbox" class="css-checkbox" id="checkbox3"  checked="checked"/>
<label for="checkbox3"  class="css-label lite-gray-check">Java</label>
</span>
</div>

<div class="dopd">
<select id="sorttype" name="status" class="bg-black text-white border-white rounded-xl">
<option value="status">By status</option>
<option value="name">By Name</option>
<option value="person">By Person</option>
 </select>
</div>

</div>

<div class="px-4 my-6">
<table class="text-white w-full rounded-lg custombackgroundcolor mb-5">
    <tr class=" opacity-70 ">
        <th class="text-start pl-5 pt-4">NAME</th>
        <th class="pt-4">Instructor</th>
        <th class="pt-4">DAY</th>
        <th class="pt-4">TIME</th>
        <th class="pt-4">PERSON</th>
        <th class="pt-4">STATUS</th>
        <th class="pt-4">Fees</th>
        <th class="pt-4">Setting</th>
    </tr>
    <tbody class=" text-sm">
    <tr class="cusborder">
        <td class="text-start pl-4 py-2">JP Batch 8</td>
        <td class="text-center">Linn Ko Ko</td>
        <td class="text-center">Tue,Thur,Sat</td>
        <td class="text-center">18:00 - 20:00</td>
        <td class="text-center">25</td>
        <td class="text-center customtextcolor6">After 3 hours</td>
        <td class="text-center">200,000 Ks</td>
        <td class="text-center customtextcolor7 underline">Edit</td>
    </tr>
    <tr class="cusborder">
        <td class="text-start pl-4 py-2">JP Batch 8</td>
        <td class="text-center">Linn Ko Ko</td>
        <td class="text-center">Tue,Thur,Sat</td>
        <td class="text-center">18:00 - 20:00</td>
        <td class="text-center">25</td>
        <td class="text-center customtextcolor6">After 3 hours</td>
        <td class="text-center">200,000 Ks</td>
        <td class="text-center customtextcolor7 underline">Edit</td>
    </tr>
    <tr class="cusborder">
        <td class="text-start pl-4 py-2">JP Batch 8</td>
        <td class="text-center">Linn Ko Ko</td>
        <td class="text-center">Tue,Thur,Sat</td>
        <td class="text-center">18:00 - 20:00</td>
        <td class="text-center">25</td>
        <td class="text-center customtextcolor6">After 3 hours</td>
        <td class="text-center">200,000 Ks</td>
        <td class="text-center customtextcolor7 underline">Edit</td>
    </tr>
    <tr class="cusborder">
        <td class="text-start pl-4 py-2">JP Batch 8</td>
        <td class="text-center">Linn Ko Ko</td>
        <td class="text-center">Tue,Thur,Sat</td>
        <td class="text-center">18:00 - 20:00</td>
        <td class="text-center">25</td>
        <td class="text-center customtextcolor6">After 3 hours</td>
        <td class="text-center">200,000 Ks</td>
        <td class="text-center customtextcolor7 underline">Edit</td>
    </tr>
    <tr class="cusborder">
        <td class="text-start pl-4 py-2">JP Batch 8</td>
        <td class="text-center">Linn Ko Ko</td>
        <td class="text-center">Tue,Thur,Sat</td>
        <td class="text-center">18:00 - 20:00</td>
        <td class="text-center">25</td>
        <td class="text-center customtextcolor6">After 3 hours</td>
        <td class="text-center">200,000 Ks</td>
        <td class="text-center customtextcolor7 underline">Edit</td>
    </tr>
    <tr class="cusborder">
        <td class="text-start pl-4 py-2">JP Batch 8</td>
        <td class="text-center">Linn Ko Ko</td>
        <td class="text-center">Tue,Thur,Sat</td>
        <td class="text-center">18:00 - 20:00</td>
        <td class="text-center">25</td>
        <td class="text-center customtextcolor6">After 3 hours</td>
        <td class="text-center">200,000 Ks</td>
        <td class="text-center customtextcolor7 underline">Edit</td>
    </tr>
    <tr class="cusborder">
        <td class="text-start pl-4 py-2">JP Batch 8</td>
        <td class="text-center">Linn Ko Ko</td>
        <td class="text-center">Tue,Thur,Sat</td>
        <td class="text-center">18:00 - 20:00</td>
        <td class="text-center">25</td>
        <td class="text-center customtextcolor6">After 3 hours</td>
        <td class="text-center">200,000 Ks</td>
        <td class="text-center customtextcolor7 underline">Edit</td>
    </tr>
    <tr class="cusborder">
        <td class="text-start pl-4 py-2">JP Batch 8</td>
        <td class="text-center">Linn Ko Ko</td>
        <td class="text-center">Tue,Thur,Sat</td>
        <td class="text-center">18:00 - 20:00</td>
        <td class="text-center">25</td>
        <td class="text-center customtextcolor6">After 3 hours</td>
        <td class="text-center">200,000 Ks</td>
        <td class="text-center customtextcolor7 underline">Edit</td>
    </tr>
    <tr class="cusborder">
        <td class="text-start pl-4 py-2">JP Batch 8</td>
        <td class="text-center">Linn Ko Ko</td>
        <td class="text-center">Tue,Thur,Sat</td>
        <td class="text-center">18:00 - 20:00</td>
        <td class="text-center">25</td>
        <td class="text-center customtextcolor6">After 3 hours</td>
        <td class="text-center">200,000 Ks</td>
        <td class="text-center customtextcolor7 underline">Edit</td>
    </tr>
    </tbody>
</table>
<button class="pt-0.5 w-1/12 h-7 text-white rounded-lg flex justify-center bg-blue-600 hover:bg-blue-700 active:bg-blue-900 cusmargin">
<ion-icon name="add-circle-outline"></ion-icon>
<img src="../../../public/img/addlogo.png" alt="" class="w-5 h-5 pt-0.5">
<span class="ml-1">ADD</span>
</button>
</div>
</template>

<script>
export default {

}
</script>

<style scoped>
.popfont{
    font-family:poppins !important;
}
.cusborder{
  border-style: solid;
  border-bottom-width: 0.13em;
  border-color: rgba(255, 255, 255, 0.2);
}
.cusmargin{
    margin-bottom: 5.63em;
} 
</style>