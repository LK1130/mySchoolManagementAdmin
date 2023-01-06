<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Toolsbar from "../Components/Toolsbar.vue";
import Pagination from "../Components/Pagination.vue";
import { DOMDirectiveTransforms } from "@vue/compiler-dom";
import moment from "moment";

const props = defineProps({
    pages: {
        type: Object,
    },
});

console.log(props.pages);


</script>

<template>
    <NavBar active=6> </NavBar>
    <Header headername="Page List" />

    <div class="absolute h-full w-5/6 p-5 headercustomleft top-32 customblack">
        <div
            class="w-full h-auto p-8 relative bg-secondaryBackground rounded-xl flex flex-col items-center"
        >
            <!-- Table Section -->
            <div class="p-4 w-full rounded-xl">
                <table class="text-white w-full rounded-lg">
                    <tr class="opacity-70 customfontsize">
                        <th class="text-center py-4">PAGE NAME</th>
                        <th class="py-4">PAGE ROUTE</th>
                        <th class="py-4">PERMISSION</th>
                        <th class="py-4">SETTING</th>
                    </tr>
                    <tbody class="text-sm mt-3">
                        <tr
                            class="border-b"
                            v-for="result in props.pages.data"
                            :key="result"
                        >
                            <td class="text-left py-4">{{ result.p_name }}</td>
                            <td class="text-center py-4">
                                {{ result.p_route }}
                            </td>
                            <td class="text-center py-4 customtextcolor7 font-bold text-md">
                                {{ result.role.length >0 ? result.role.map(item => item.r_name).join(" / ") : "Not Set" }}
                            </td>
                            <td
                                class="text-center py-4 customtextcolor7 underline"
                            >
                                <Link :href="route('pageList.edit', result.id)"
                                    >Edit</Link
                                >
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="flex justify-center items-center my-10">
                    <Pagination class="z-10" :links="pages.links">
                    </Pagination>
                </div>
            </div>

            <div
                class="flex flex-col mt-10 md:flex-row w-full px-5 items-center justify-center text-white"
            >
                <div
                    class="absolute text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 mr-2 mb-2 bottom-5 right-3 focus:outline-none"
                >
                    <Link
                        :href="route('pageList.create')"
                        class="flex flex-row justify-center items-center space-x-3"
                    >
                        <img
                            src="../../../public/img/addlogo.png"
                            alt=""
                            class="w-5 h-5 pt-0.5"
                        />

                        <button type="button">
                            <span>Add</span>
                        </button>
                    </Link>
                </div>
            </div>
        </div>

        <div class="fixed left-42 bottom-5">
            <button>
                <a
                    href="/adminPermission"
                    class="underline underline-offset-4 hidden md:block text-whiteTextColor"
                    >BACK</a
                >
            </button>
        </div>
    </div>
</template>
