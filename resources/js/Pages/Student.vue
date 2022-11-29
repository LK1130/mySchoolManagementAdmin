<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Pagination from "../Components/Pagination.vue";
</script>

<template>
    <!-------------------- Navbar&header -------------------->
    <NavBar />
    <Header headername="Student" />
    <!---------------- body ----------------------->
    <div
        class="absolute h-screen w-full md:w-5/6 headercustomleft top-32 customblack"
    >
        <!-- Radio and Search Box Div -->
        <div
            class="text-white sm:text-sm text-xs popfont flex justify-between px-4"
        >
            <div>
                <span>
                    <input
                        type="checkbox"
                        class="css-checkbox"
                        id="checkbox1"
                        checked="checked"
                    />
                    <label
                        for="checkbox1"
                        class="css-label lite-gray-check sm:text-base text-xs"
                        >Japanese</label
                    >
                </span>
                <span class="sm:ml-3 ml-0 sm:mt-0 mt-2">
                    <input
                        type="checkbox"
                        class="css-checkbox"
                        id="checkbox2"
                        checked="checked"
                    />
                    <label
                        for="checkbox2"
                        class="css-label lite-gray-check sm:text-base text-xs"
                        >Web Development</label
                    >
                </span>
                <br class="sm:hidden block" />
                <span class="sm:ml-3 ml-0 sm:mt-0 mt-2">
                    <input
                        type="checkbox"
                        class="css-checkbox"
                        id="checkbox3"
                        checked="checked"
                    />
                    <label
                        for="checkbox3"
                        class="css-label lite-gray-check sm:text-base text-xs"
                        >Java</label
                    >
                </span>
            </div>
            <!-- Search Input Box Section -->
            <form class="flex items-center">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div
                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                    >
                        <svg
                            aria-hidden="true"
                            class="w-5 h-5 text-gray-500 dark:text-gray-400"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="simple-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                        placeholder="Search"
                        required
                    />
                </div>
                <button
                    type="submit"
                    class="p-2.5 ml-2 text-sm text-black font-bold bg-white rounded-lg border border-gray-300 hover:border-blue-500 focus:ring-3 focus:outline-none focus:ring-blue-300"
                >
                    <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                        ></path>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>

        <!-- Table Section -->
        <div class="px-4 my-6 w-full">
            <table
                class="text-white w-full rounded-lg custombackgroundcolor mb-5"
            >
                <tr class="opacity-70 customfontsize">
                    <th class="text-start pl-5 pt-4">NAME</th>
                    <th class="pt-4">CLASS</th>
                    <th class="pt-4">AGE</th>
                    <th class="pt-4 md:block hidden">PHONE</th>
                    <th class="pt-4">ADDRESS</th>
                    <th class="pt-4">DETAILS</th>
                </tr>
                <tbody class="text-sm customfontsize">
                    <tr class="cusborder" v-for="n in 15" :key="n">
                        <td class="text-start pl-4 py-2">Zar Ni Win Lwin</td>
                        <td class="text-center">3</td>
                        <td class="text-center">24</td>
                        <td class="text-center md:block hidden">09795606618</td>
                        <td class="text-center">North Dagon</td>
                        <td class="text-center customtextcolor7 underline">
                            <a href="">View</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Footer Section -->
        <div
            class="flex flex-col space-y-7 md:flex-row w-full md:justify-between px-5 items-start md:items-center text-white"
        >
            <div class="w-14">
                <button>
                    <a
                        href=""
                        class="underline underline-offset-4 hidden md:block"
                        >BACK</a
                    >
                </button>
            </div>
            <!-- <div class="flex justify-center items-center mb-10">
                    <Pagination :links="">
                    </Pagination>
                </div>-->
            <!-- //TEST Pagination START -->
            <nav aria-label="Page navigation example hidden md:block">
                <ul class="inline-flex -space-x-px">
                    <li>
                        <a
                            href="#"
                            class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700"
                            >Previous</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
                            >1</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
                            >2</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            aria-current="page"
                            class="px-3 py-2 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700"
                            >3</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
                            >4</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
                            >5</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700"
                            >Next</a
                        >
                    </li>
                </ul>
            </nav>

            <!-- //Test Pagination End -->

            <div
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
            >
                <a
                    :href="route('Addstudent.view')"
                    class="flex flex-row justify-center items-center space-x-3"
                >
                    <img
                        src="../../../public/img/addlogo.png"
                        alt=""
                        class="w-5 h-5 pt-0.5"
                    />

                    <button type="button">
                        <span>Add Student</span>
                    </button>
                </a>
            </div>
        </div>
    </div>
</template>
