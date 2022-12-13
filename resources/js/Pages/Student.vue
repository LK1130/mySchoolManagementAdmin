<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Pagination from "../Components/Pagination.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import throttle from "lodash/throttle";
import { prop, value } from "dom7";

let props = defineProps({
    allStudents: Object,
    filter: Object,
    categories: Object,
    checkBox: Object,
});

console.log(props);

let search = ref(props.filter);
// console.log(props.checkBox);
let selectedItem = ref(props.checkBox);

let cat = props.categories;

// Watching the search variable and throttling the function to 300ms.
watch(
    search,
    throttle(function (value) {
        // console.log(checkBox);
        Inertia.get(
            "/students",
            { search: value },
            { preserveState: true, replace: true }
        );
    }, 300)
);
watch(
    selectedItem,
    throttle(function (value) {
        console.log(value);
        Inertia.get(
            "/students",
            { selectedItem: value.join("-") },
            { preserveState: true, replace: true }
        );
    }, 200)
);
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
            class="text-white sm:text-sm text-xs popfont flex justify-between px-5"
        >
            <div class="space-x-3">
                <span v-for="category in categories" :key="categories">
                    <input
                        type="checkbox"
                        class="css-checkbox"
                        :id="category.id"
                        checked="checked"
                        v-model="selectedItem"
                        :value="category.id"
                    />
                    <label
                        :for="category.id"
                        class="css-label lite-gray-check sm:text-base text-xs"
                        >{{ category.c_name }}</label
                    >
                </span>
            </div>
            <!-- Search Input Box Section -->
            <div class="flex items-center">
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
                        v-model="search"
                        required
                    />
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="px-4 my-6 w-full">
            <table
                class="text-white w-full bg-elementBackground rounded-lg mb-5"
            >
                <tr class="opacity-70 customfontsize">
                    <th class="text-start pl-5 pt-4">NAME</th>
                    <th class="pt-4">TOTAL CLASS</th>
                    <th class="pt-4">AGE</th>
                    <th class="pt-4 md:block hidden">PHONE</th>
                    <th class="pt-4">ADDRESS</th>
                    <th class="pt-4">DETAILS</th>
                </tr>
                <tbody class="text-sm customfontsize">
                    <tr
                        class="cusborder"
                        v-for="student in allStudents.data"
                        :key="allStudents.data"
                    >
                        <td class="text-start pl-4 py-2">{{ student.name }}</td>
                        <td class="text-center">{{ student.Class }}</td>
                        <td class="text-center">{{ student.age }}</td>
                        <td class="text-center">
                            {{ student.phone }}
                        </td>
                        <td class="text-center">{{ student.address }}</td>
                        <td class="text-center text-yellowTextColor underline">
                            <Link :href="route('students.show', student.id)"
                                >View</Link
                            >
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
                    <a class="underline underline-offset-4 hidden md:block"
                        >BACK</a
                    >
                </button>
            </div>
            <div class="flex justify-center items-center mb-10">
                <Pagination :links="allStudents.links"></Pagination>
            </div>
            <div
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
            >
                <Link
                    :href="route('students.create')"
                    class="flex flex-row justify-center items-center space-x-3"
                >
                    <img
                        src="../../../public/img/addlogo.png"
                        alt=""
                        class="w-5 h-5 pt-0.5"
                    />

                    <button type="button" id="createBtn">
                        <span>Add Student</span>
                    </button>
                </Link>
            </div>
        </div>
    </div>
</template>
