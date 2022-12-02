<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import { ref } from "vue";
</script>

<template>
    <!-------------------- Navbar&header -------------------->
    <NavBar />
    <Header headername="Add Student" />
    <!---------------- body ----------------------->
    <div
        class="absolute h-5/6 w-5/6 headercustomleft top-32 bg-primaryBackground flex justify-center items-center"
    >
        <div
            class="lg:w-5/6 md:w-4/6 xl:w-3/6 w-full h-4/6 bg-elementBackground rounded-2xl space-y-9 p-14"
        >
            <div class="">
                <label
                    for="first_name"
                    class="block mb-2 text-lg font-medium text-white md:text-xl"
                    >Name</label
                >
                <input
                    type="text"
                    id="first_name"
                    class="w-full border border-white text-sm rounded-lg focus:ring-white focus:border-0 block p-2.5 bg-gray-700 text-white"
                    placeholder="John"
                    required
                />
            </div>
            <div class="">
                <label
                    for="email"
                    class="block mb-2 text-lg md:text-xl font-medium text-gray-900 dark:text-white"
                    >Email address</label
                >
                <input
                    type="email"
                    id="email"
                    class="w-full border border-white text-sm rounded-lg focus:ring-white focus:border-0 block p-2.5 bg-gray-700 text-white"
                    placeholder="john.doe@gmail.com"
                    required
                />
            </div>
            <div class="">
                <label
                    for="password"
                    class="block mb-2 text-lg md:text-xl font-medium text-gray-900 dark:text-white"
                    >Password</label
                >
                <div
                    class="flex sm:flex-row flex-col space-y-5 sm:space-y-0 w-full"
                >
                    <input
                        type="password"
                        id="password"
                        class="w-5/6 border border-white focus:ring-white focus:border-0 text-sm rounded-l-lg block p-2.5 bg-gray-700 text-white"
                        placeholder="•••••••••"
                        required
                    /><span
                        class="inline-flex items-center px-3 text-sm border bg-gray-700 border-white text-white hover:bg-gray-400 focus:ring-2 cursor-pointer"
                    >
                        <button class="h-8 w-7 text-white">
                            <img
                                src="../../../public/img/clipboard.svg"
                                alt=""
                                srcset=""
                            />
                        </button>
                    </span>

                    <span
                        ><button
                            type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 border-white border focus:ring-blue-300 font-medium rounded-r-lg text-lg sm:px-6 sm:py-2 px-5 py-1"
                        >
                            Generate
                        </button></span
                    >
                </div>
            </div>
            <div class="flex justify-center items-center">
                <button
                    type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-lg px-16 py-2"
                >
                    Create
                </button>
            </div>
        </div>
    </div>
</template>
