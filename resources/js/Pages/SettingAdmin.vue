<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Pagination from "../Components/Pagination.vue";
import SettingSection from "../Components/SettingSection.vue"
import { ref } from "vue";

let openTab = ref(1);



</script>

<template>
    <!-------------------- Navbar&header -------------------->
    <NavBar />
    <Header headername="Settings" />


    <div class="absolute top-32  headercustomleft w-5/6 h-full bg-primaryBackground items-center flex flex-col ">
      

                   <div class="flex items-center w-11/12 mt-10 bg-primaryBackground flex-row justify-center">
            <div class="w-4/6 items-center text-center rounded-tl-xl bg-primaryBackground text-white p-4 cursor-pointer tab" id="tab-1" @click='openTab =1' 
            :class="{
                'bg-primaryBackground':(openTab !=1) ,
                'bg-elementBackground':(openTab ==1)
                }">SiteMaster</div>
            <div class="w-4/6 items-center  text-center rounded-tr-xl  bg-primaryBackground hover:bg-elementBackground text-white p-4 cursor-pointer tab" id="tab-2" 
            @click='openTab =2' v-bind:class="{'bg-primaryBackground':openTab !=2,'bg-elementBackground':openTab 
            ==2}">SiteMaster Public</div>
            
        </div>
        <div class="w-11/12 h-auto bg-elementBackground text-white tab-pannel-2" id="tab-pannel-1" v-bind:class="{'hidden': openTab != 1, 'block': openTab == 1}">
        
<form class="mt-6">
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <!-- LOGO -->
        <div class="ml-10 sm:w-full">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Logo</label>
            <input class="block w-5/6 h-9 border rounded-xl cursor-pointer file:h-full file:rounded-l-sm file:border-0 file:mr-1.5" id="file_input" type="file">
        </div>
        <!-- FaceBook -->
        <div class="ml-10 sm:w-full sm:ml-4">
            <label for="facebook" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">FaceBook</label>
            <input type="url" id="facebook" class="focus:ring-white focus:border-white border-white text-gray-900 text-sm rounded-xl block w-5/6 bg-elementBackground p-2" placeholder="" required>
        </div>
        <!-- Fav Icon -->
        <div class="ml-10 sm:w-full">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Fav Icon</label>
            <input class="block w-5/6 h-9 border rounded-xl cursor-pointer file:h-full file:rounded-l-sm file:border-0 file:mr-1.5" id="file_input" type="file">
        </div>  
        <div class="absolute left-1/2  sm:w-0 md:w-0.5 h-2/5  bg-white"></div>
        <!-- Messenger -->
        <div class="ml-10 sm:w-full sm:ml-4">
            <label for="Messenger" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Messenger</label>
            <input type="url" id="Messenger" class="focus:ring-white focus:border-white border-white text-gray-900 text-sm rounded-xl block w-5/6 bg-elementBackground p-2" placeholder="" required>
        </div>
        <!-- Site Name -->
        <div class="ml-10 sm:w-full">
            <label for="Site_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site Name</label>
            <input type="text" id="Site_name" class="focus:ring-white focus:border-white border-white text-gray-900 text-sm rounded-xl block w-5/6 bg-elementBackground" placeholder="" required>
        </div>
        <!-- YouTube1 -->
        <div class="ml-10 sm:w-full sm:ml-4">
            <label for="youtube1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">YouTube 1</label>
            <input type="url" id="youtube1" class="focus:ring-white focus:border-white border-white text-gray-900 text-sm rounded-xl block w-5/6 bg-elementBackground p-2" placeholder="" required>
        </div>
        <div></div>
        <!-- Youtube2 -->
        <div class="ml-10 sm:w-full sm:ml-4">
            <label for="youtube3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">YouTube 2</label>
            <input type="url" id="youtube3" class="focus:ring-white focus:border-white border-white text-gray-900 text-sm rounded-xl block w-5/6 bg-elementBackground p-2" placeholder="" required>
        </div>
    </div>
    
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-5/6 sm:w-auto px-5 py-2.5 text-center m-5 flex float-right ">Upload</button>
</form>
  
</div>

<!-- Public -->
      <div class="w-11/12 h-auto bg-elementBackground text-white tab-pannel-2" id="tab-pannel-2" v-bind:class="{'hidden': openTab !== 2, 'block': openTab === 2}">
        
<form class="mt-6">
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <!-- LOGO -->
        <div class="ml-10 sm:w-full">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Logo</label>
            <input class="block w-5/6 h-9 border rounded-xl cursor-pointer file:h-full file:rounded-l-sm file:border-0 file:mr-1.5" id="file_input" type="file">
        </div>
        <!-- FaceBook -->
        <div class="ml-10 sm:w-full sm:ml-4">
            <label for="facebook" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">FaceBook</label>
            <input type="url" id="facebook" class="focus:ring-white focus:border-white border-white text-gray-900 text-sm rounded-xl block w-5/6 bg-elementBackground p-2" placeholder="" required>
        </div>
        <!-- Fav Icon -->
        <div class="ml-10 sm:w-full">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Fav Icon</label>
            <input class="block w-5/6 h-9 border rounded-xl cursor-pointer file:h-full file:rounded-l-sm file:border-0 file:mr-1.5" id="file_input" type="file">
        </div>  
        <div class="absolute left-1/2  sm:w-0 md:w-0.5 h-3/6  bg-white"></div>
        <!-- Messenger -->
        <div class="ml-10 sm:w-full sm:ml-4">
            <label for="Messenger" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Messenger</label>
            <input type="url" id="Messenger" class="focus:ring-white focus:border-white border-white text-gray-900 text-sm rounded-xl block w-5/6 bg-elementBackground p-2" placeholder="" required>
        </div>
        <!-- Site Name -->
        <div class="ml-10 sm:w-full">
            <label for="Site_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site Name</label>
            <input type="text" id="Site_name" class="focus:ring-white focus:border-white border-white text-gray-900 text-sm rounded-xl block w-5/6 bg-elementBackground" placeholder="" required>
        </div>
        <!-- YouTube1 -->
        <div class="ml-10 sm:w-full sm:ml-4">
            <label for="youtube1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">YouTube 1</label>
            <input type="url" id="youtube1" class="focus:ring-white focus:border-white border-white text-gray-900 text-sm rounded-xl block w-5/6 bg-elementBackground p-2" placeholder="" required>
        </div>
        <!-- Phone No -->
        <div class="ml-10 sm:w-full">
            <label for="phone_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone No</label>
            <input type="text" id="phone_no" class="focus:ring-white focus:border-white border-white text-gray-900 text-sm rounded-xl block w-5/6 bg-elementBackground" placeholder="" required>
        </div>
        <!-- Youtube2 -->
        <div class="ml-10 sm:w-full sm:ml-4">
            <label for="youtube2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">YouTube 2</label>
            <input type="url" id="youtube2" class="focus:ring-white focus:border-white border-white text-gray-900 text-sm rounded-xl block w-5/6 bg-elementBackground p-2" placeholder="" required>
        </div>
         <!-- Phone No -->
        <div class="ml-10 sm:w-full">
            <label for="copyright" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Copy Right</label>
            <input type="text" id="copyright" class="focus:ring-white focus:border-white border-white text-gray-900 text-sm rounded-xl block w-5/6 bg-elementBackground" placeholder="" required>
        </div>
        <!-- Youtube3 -->
        <div class="ml-10 sm:w-full sm:ml-4">
            <label for="youtube3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">YouTube 3</label>
            <input type="url" id="youtube3" class="focus:ring-white focus:border-white border-white text-gray-900 text-sm rounded-xl block w-5/6 bg-elementBackground p-2" placeholder="" required>
        </div>
    </div>
    
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-5/6 sm:w-auto px-5 py-2.5 text-center m-5 flex float-right ">Upload2</button>
</form>
  
</div>

        
    </div>
    
    
</template>
