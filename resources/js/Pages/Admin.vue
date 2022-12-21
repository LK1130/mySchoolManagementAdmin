<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Pagination from "../Components/Pagination.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    admins: {
        type: Object,
    }
});
</script>

<template>
    <NavBar />
    <Header headername="Admin" />

    <div
        class="absolute top-32 headercustomleft w-5/6 h-full bg-primaryBackground items-center flex flex-col"
    >
        <div class="px-4 w-full">
            <table class="text-white w-full bg-elementBackground rounded-lg">
                <tr class="opacity-70 customfontsize">
                    <th class="text-start pt-4 pl-10">NAME</th>
                    <th class="pt-4">EMAIL</th>
                    <th class="pt-4">ROLE</th>
                    <th class="pt-4">SETTING</th>
                </tr>
                <tbody class="text-sm customfontsize">
                    <tr class="cusborder" v-for="admin in props.admins.data" :key="admin">
                        <td class="text-start pl-10 py-2">{{admin.name}}</td>
                        <td class="text-center">{{ admin.email }}</td>
                        <td class="text-center" >{{ admin.r_name}}</td>
                        
                        <td class="text-center text-yellowTextColor underline">
                            <Link :href="route('admin.edit',admin.id)">
                        Edit
                        </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
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
            <div class="flex justify-center items-center mb-10"></div>
            <Link :href="route('admin.create')">
                <div
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                >
                    <a
                        class="flex flex-row justify-center items-center space-x-3"
                    >
                        <img
                            src="../../../public/img/addlogo.png"
                            alt=""
                            class="w-5 h-5 pt-0.5"
                        />

                        <button type="button" id="createBtn">
                            <span>Add Admin</span>
                        </button>
                    </a>
                </div>
            </Link>
        </div>
    </div>
</template>

<style></style>
