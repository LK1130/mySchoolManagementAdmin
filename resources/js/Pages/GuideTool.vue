<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Toolsbar from "../Components/Toolsbar.vue";

</script>

<template>
    <NavBar />
    <Header headername="Tools" />

    <div class="absolute h-full w-5/6 p-5 headercustomleft top-32 customblack">
        <Toolsbar active="5"/>
        <div class="w-full h-full p-8 relative bg-secondaryBackground rounded-b-xl flex flex-col items-center">
            <!-- Table Section -->
            <div class="p-4 w-full  rounded-xl">
                <table class="text-white w-full rounded-lg ">
                    <tr class="opacity-70 customfontsize">
                        <th class="text-center py-3">GUIDE TITLE</th>
                        <th class="py-3">STEP</th>
                        <th class="py-3">DATE</th>
                        <th class="py-3">SETTINGS</th>
                    </tr>
                    <tbody class="text-sm mt-3">
                        <tr class="border-b" v-for="n in 8" :key="n">
                            <td class="text-left py-3">How to login to our sys...</td>
                            <td class="text-center py-3">2</td>
                            <td class="text-center py-3">2022/09/23</td>
                            <td class="text-center customtextcolor7 underline">
                                <a href="#">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex flex-col mt-10 md:flex-row w-full px-5 items-center justify-center text-white">

                <nav aria-label="Page navigation example hidden md:block">
                    <ul class="inline-flex -space-x-px">
                        <li>
                            <a href="#"
                                class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
                        </li>
                        <li>
                            <a href="#"
                                class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                        </li>
                        <li>
                            <a href="#"
                                class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
                        </li>
                        <li>
                            <a href="#" aria-current="page"
                                class="px-3 py-2 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700">3</a>
                        </li>
                        <li>
                            <a href="#"
                                class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">4</a>
                        </li>
                        <li>
                            <a href="#"
                                class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">5</a>
                        </li>
                        <li>
                            <a href="#"
                                class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">Next</a>
                        </li>
                    </ul>
                </nav>

                <!-- <Pagination/> -->

                <div
                    class="absolute text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 mr-2 mb-2 bottom-5 right-3 focus:outline-none">
                    <a :href="route('Addstudent.view')" class="flex flex-row justify-center items-center space-x-3">
                        <img src="../../../public/img/addlogo.png" alt="" class="w-5 h-5 pt-0.5" />

                        <button type="button">
                            <span>Add</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>