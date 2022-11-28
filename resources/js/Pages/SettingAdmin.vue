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
      <input type="text" id="Site_name" class="focus:ring-0 focus:border-white focus:border-0 focus:ring-white focus:outline-none  border border-white text-gray-900 text-sm rounded-lg block w-full bg-elementBackground" placeholder="" required>


        <div class="flex items-center w-11/12 mt-10 bg-primaryBackground flex-row justify-center">
            <div class="w-4/6 items-center text-center rounded-tl-xl bg-elementBackground text-white p-4">SiteMaster</div>
            <div class="w-4/6 items-center  text-center rounded-tr-xl  bg-primaryBackground text-white p-4">SiteMaster Public</div>
            
        </div>
        <div class="w-11/12 h-96 bg-elementBackground text-white">
        
<form class="mt-6">
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div class="ml-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Logo</label>
            <input class="block w-full border-2 rounded-lg cursor-pointer" id="file_input" type="file">
        </div>
        <div class="">
            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
            <input type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
        </div>
        <div class="ml-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Fav Icon</label>
            <input class="block w-full border-2 rounded-lg cursor-pointer" id="file_input" type="file">
        </div>  
        <div>
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
            <input type="tel" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
        </div>
        <div class="ml-4">
            <label for="Site_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site Name</label>
                 </div>
        <div>
            <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unique visitors (per month)</label>
            <input type="number" id="visitors" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
        </div>
    </div>
    
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
  
</div>

        
    </div>
    
    <!---------------- body ----------------------->
    <!-- <div class="absolute h-full w-5/6 headercustomleft top-32 bg-primaryBackground"> -->
            
                <!-- <button @click="hello()">Tabe change</button> -->
                <!-- <div
                    class="flex flex-row md:w-5/6 w-full h- items-center justify-center bg-white"
                >
                    <li class=" ">  
                        <a
                            href="#"
                            class="p-4 text-gray-900 bg-red-300 rounded-l-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none"
                            aria-current="page"
                            >Profile</a
                        >
                    </li>
                    <li class=" ">
                        <a
                            href="#"
                            class="p-4 text-gray-900 bg-green-300 rounded-l-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none"
                            aria-current="page"
                            >Profile</a
                        >
                    </li>
                </div> -->
                <!-- <div class="flex flex-row w-5/6 items-center">
                    <div class="bg-white w-4/6 justify-center flex h-full ">
                    <ul class="list-none flex flex-row">
                     <li>
                        <a
                            href="#"
                            class="list-none p-4 text-gray-900 bg-blue-300 rounded-l-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none"
                            aria-current="page"
                            >Profilse</a
                        >
                    </li>
                    <li >
                        <a
                            href="#"
                            class="p-4 text-gray-900 bg-green-700 rounded-l-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none"
                            aria-current="page"
                            >Profile</a
                        >
                    </li>
                    </ul>
                    </div>
                </div>
            </div> -->
    <!-- </div> -->
   
</template>
