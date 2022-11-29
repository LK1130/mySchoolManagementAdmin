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
        <Toolsbar active="4"/>
        <div class="w-full h-full p-8 relative bg-secondaryBackground rounded-b-xl flex flex-col items-center">
            <!-- Table Section -->
            <div class="p-4 w-full  rounded-xl">
                <table class="text-white w-full rounded-lg ">
                    <tr class="opacity-70 customfontsize">
                        <th class="text-center py-3">Name</th>
                        <th class="py-3">DESCRIPTION</th>
                        <th class="py-3">DATE</th>
                        <th class="py-3">SETTINGS</th>
                    </tr>
                    <tbody class="text-sm mt-3">
                        <tr class="border-b">
                            <td class="text-center py-3">JP</td>
                            <td class="text-center py-3">JP</td>
                            <td class="text-center py-3">2022/09/23</td>
                            <td class="text-center customtextcolor7 underline">
                                <a href="/editcategory">Edit</a>
                            </td>
                        </tr>

                        <tr class="border-b">
                            <td class="text-center py-3">JVS</td>
                            <td class="text-center py-3">JP</td>
                            <td class="text-center py-3">2022/09/23</td>
                            <td class="text-center customtextcolor7 underline">
                                <a href="/editcategory">Edit</a>
                            </td>
                        </tr>

                        <tr class="border-b">
                            <td class="text-center py-3">JW</td>
                            <td class="text-center py-3">JP</td>
                            <td class="text-center py-3">2022/09/23</td>
                            <td class="text-center customtextcolor7 underline">
                                <a href="/editcategory">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>