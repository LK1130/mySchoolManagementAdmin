<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Pagination from "../Components/Pagination.vue";
</script>

<template>
    <!-------------------- Navbar&header -------------------->
    <NavBar />
    <Header headername="Settings" />


    <div class="absolute top-32  headercustomleft w-5/6 h-full bg-primaryBackground items-center flex flex-col ">
      


        <div class="flex items-center w-11/12 mt-10 bg-primaryBackground flex-row justify-center">
            <div class="w-4/6 items-center text-center rounded-tl-xl bg-elementBackground text-white p-4">SiteMaster</div>
            <div class="w-4/6 items-center  text-center rounded-tr-xl  bg-primaryBackground hover:bg-elementBackground text-white p-4">SiteMaster Public</div>
            
        </div>
        <div class="w-11/12 h-auto bg-elementBackground text-white">
        
<form class="mt-6">
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <!-- LOGO -->
        <div class="ml-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Logo</label>
            <input class="block w-full border rounded-lg cursor-pointer " id="file_input" type="file">
        </div>
        <!-- FaceBook -->
        <div class="mr-4">
            <label for="facebook" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">FaceBook</label>
            <input type="url" id="facebook" class="focus:ring-white focus:border-white border-white text-gray-900 text-sm rounded-lg block w-full bg-elementBackground p-2" placeholder="" required>
        </div>
        <!-- Fav Icon -->
        <div class="ml-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Fav Icon</label>
            <input class="block w-full border rounded-lg cursor-pointer" id="file_input" type="file">
        </div>  
        <!-- Messenger -->
        <div class="mr-4">
            <label for="Messenger" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Messenger</label>
            <input type="url" id="Messenger" class="focus:ring-white focus:border-white border-white text-gray-900 text-sm rounded-lg block w-full bg-elementBackground p-2" placeholder="" required>
        </div>
        <!-- Site Name -->
        <div class="ml-4">
            <label for="Site_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site Name</label>
            <input type="text" id="Site_name" class="focus:ring-white focus:border-white border-white text-gray-900 text-sm rounded-lg block w-full bg-elementBackground" placeholder="" required>
        </div>
        <!-- YouTube1 -->
        <div class="mr-4">
            <label for="youtube1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">YouTube 1</label>
            <input type="url" id="youtube1" class="focus:ring-white focus:border-white border-white text-gray-900 text-sm rounded-lg block w-full bg-elementBackground p-2" placeholder="" required>
        </div>
        <div></div>
        <!-- Youtube2 -->
        <div class="mr-4">
            <label for="youtube3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">YouTube 2</label>
            <input type="url" id="youtube3" class="focus:ring-white focus:border-white border-white text-gray-900 text-sm rounded-lg block w-full bg-elementBackground p-2" placeholder="" required>
        </div>
    </div>
    
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center m-5 flex float-right">Upload</button>
</form>
  
</div>

        
    </div>
    
    
</template>
