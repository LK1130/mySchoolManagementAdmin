<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Pagination from "../Components/Pagination.vue";
import { Inertia } from "@inertiajs/inertia";
import { createVNode, ref , h } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import Toolsbar from "../Components/Toolsbar.vue";

const props = defineProps({
    admins: {
        type: Object,
    },
});


const click = () => {
    return h('div',{id:"asd",class:'bg-black w-1/6 h-2/6'})

    
}
const step = document.getElementById('step');


</script>

<template>
    <NavBar />
    <Header headername="Guide" />

    <div class="absolute h-full w-5/6 p-5 headercustomleft top-32 customblack">
        <Toolsbar active="5" />
        <div
            class="w-full h-auto p-8 relative bg-secondaryBackground rounded-b-xl flex flex-col items-center"
        >
            <form action="" class="w-full pl-40">
                <!-- guide title -->
                <div class="w-full">
                    <label for="Guidetitle" class="text-white text-lg block">
                        Guide Title</label
                    >
                    <input
                        type="text"
                        id="Guidetitle"
                        class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-11/12 bg-elementBackground p-2"
                    />
                </div>

                
                <!-- Step  -->
                <div id="step" >
                <div>   
                    <p class="text-xl text-white pt-6 font-bold pr-80">
                        Step 1
                    </p>
                </div>

                <div class="pt-8 w-full">
                    <label for="steptitle" class="text-white text-lg block">
                        Step Title</label
                    >
                    <input
                        type="text"
                        id="steptitle"
                        class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-11/12 bg-elementBackground p-2"
                    />
                </div>
                <!-- textarea  -->
                <div class="pt-5 w-full">
                    <label for="Description" class="text-white text-lg block">
                        Description</label
                    ><textarea
                        name=""
                        id="Description"
                        class="h-48 w-11/12 resize-none rounded-xl bg-secondaryBackground text-whiteTextColor focus:outline-0 focus:ring-white focus:border-white border-white"
                    >
                    </textarea>
                </div>
                <!-- Dropzone -->
                <div class="mt-5">
                    <label for="" class="text-white text-lg">File</label>
                </div>

                <div class="flex items-center justify-center w-11/12 mt-5">
                    <label
                        for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                    >
                        <div
                            class="flex flex-col items-center justify-center pt-5 pb-6"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-10 h-10 mb-3 text-gray-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                                ></path>
                            </svg>
                            <p
                                class="mb-2 text-sm text-gray-500 dark:text-gray-400"
                            >
                                <span class="font-semibold"
                                    >Click to upload</span
                                >
                                or drag and drop
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                SVG, PNG, JPG or GIF (MAX. 800x400px)
                            </p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div>

                <!-- line -->
                <hr class="mt-14 h-px w-11/12 bg-gray-200 border-0" />
                </div>

                <div class="text-white bg-blue-700 w-1/6 rounded-xl text-sm px-5 py-2.5 mt-9 flex flex-row justify-center items-center space-x-3" @click="click">
                  
                        <img src="../../../public/img/addlogo.png" alt="" class="w-5 h-5 pt-0.5" />
                        <button> Create New Step</button>
                
                </div>

                <div class="flex justify-between py-8">
                    <button
                        class="py-2 px-5 text-whiteTextColor text-md bg-redTextColor rounded-xl flex items-center"
                    >
                        <img
                            src="../../../public/img/delete.png"
                            alt=""
                            class="w-5 h-5 pt-0.5"
                        />
                        <span class="mx-2">Delete</span>
                    </button>
                    <button
                        class="py-2 px-5 text-whiteTextColor text-md bg-blueTextColor rounded-xl flex items-center"
                    >
                        <img
                            src="../../../public/img/save.png"
                            alt=""
                            class="w-5 h-5 pt-0.5"
                        />
                        <span class="mx-2">Save</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<style></style>
