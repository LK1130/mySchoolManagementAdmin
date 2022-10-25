<template>
  <div class="customnavcolor w-full text-white p-4 rounded-lg">
   <h3 class="text-lg">Class Information</h3>
   <div class="float-right">
   <img src="../../../public/img/php-developer.jpg" alt="" class="rounded-full w-20 border-white border-2">
   <button class=" w-20 bg-blue-700 rounded-lg p-1 mt-4">Upload</button>
   </div>
   <div class="text-2xl font-bold mt-2">Web Developer Batch 9</div>
   <textarea name="" id=""  class="text-white w-10/12 mt-2 text-sm customnavcolor rounded-xl customborder"></textarea>
   <div class="flex flex-row justify-between w-10/12 text-sm mt-3">
  
    <div>
        <div>Date : 
            <span>
            <input type="text" class="customnavcolor text-white text-sm rounded-lg w-1/4 customborder">
            </span>
            -
            <span>
            <input type="text" class="customnavcolor text-white text-sm rounded-lg w-1/4 customborder">
            </span> 
        </div>
        <div class="mt-3 flex flex-row text-sm">Day : 
       <input type="checkbox" name="checkbox" class="mt-0.5 ml-2"/>
       <label for="" class="ml-2">SUN</label>

       <input type="checkbox" name="checkbox" class="mt-0.5 ml-3"/>
       <label for="" class="ml-2">Mon</label>

       <input type="checkbox" name="checkbox" class="mt-0.5 ml-3"/>
       <label for="" class="ml-2">TUE</label>

       <input type="checkbox" name="checkbox" class="mt-0.5 ml-3"/>
       <label for="" class="ml-2">WED</label>

       <input type="checkbox" name="checkbox" class="mt-0.5 ml-3"/>
       <label for="" class="ml-2">THU</label>

       <input type="checkbox" name="checkbox" class="mt-0.5 ml-3"/>
       <label for="" class="ml-2">FRI</label>

       <input type="checkbox" name="checkbox" class="mt-0.5 ml-3"/>
       <label for="" class="ml-2">SAT</label>
        </div>
        <div class="mt-3">Time : 
           <span>
            <input type="text" class="customnavcolor text-white text-sm rounded-lg w-1/4 customborder">
            </span>
            -
            <span>
            <input type="text" class="customnavcolor text-white text-sm rounded-lg w-1/4 customborder">
            </span>
        </div>
        <div class="mt-3">Person : <span>20</span></div>
    </div>
    <div>
        <div>Instructor : 
        <span class="text-sm">
        <select id="sorttype" name="status" class="customnavcolor text-white border-white rounded-xl">
        <option value="status">Linn Ko Ko</option>
        <option value="name">Thein Naing</option>
        <option value="person">Pyi Soe</option>
        </select>
        </span>
        </div>
        <div class="mt-3">Category :
        <span class="text-sm">
        <select id="sorttype" name="status" class="customnavcolor text-white border-white rounded-xl">
        <option value="status">Web Developement</option>
        <option value="name">Japanese</option>
        <option value="person">Java</option>
        </select>
        </span>
        </div>
        <div class="mt-3">Fees : <span class="pl-7"><input type="text" class="customnavcolor text-white text-sm rounded-lg w-2/4 customborder"></span></div>
    </div>
   </div>
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
input[type="checkbox"] {
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
input[type="checkbox"]::before {
  content: "";
  width: 1.15em;
  height: 1.15em;
  border-radius: 50%;
  transform: scale(0);
  transition: 120ms transform ease-in-out;
  box-shadow: inset 1em 1em #304BFC;
}

input[type="checkbox"]:checked::before {
  transform: scale(1);
}
.customborder{
    border: 0.01em solid white;

}
</style>