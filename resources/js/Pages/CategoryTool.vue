<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Toolsbar from "../Components/Toolsbar.vue";
import moment from "moment";

const props = defineProps({
    categories: {
        type: Object
    }
});

</script>

<template>
    <NavBar />
    <Header headername="Tools" />

    <div class="absolute h-full w-5/6 p-5 headercustomleft top-32 customblack">
        <Toolsbar active="4"/>
        <div class="w-full h-auto p-8 relative bg-secondaryBackground rounded-b-xl flex flex-col items-center">
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

                        <tr class="border-b" v-for="result in props.categories.data" :key="result">
                            <td class="text-left py-3 text-base">{{ result.c_name }}</td>
                            <td class="text-center py-3 text-base">{{ result.c_description.substring(0, 10) + "..." }}</td>
                            <td class="text-center py-3 text-base">{{  moment(result.created_at).calendar() }}</td>
                            <td class="text-center customtextcolor7 underline text-base">
                                <Link :href="route('categoryTool.edit', result.id)" :id="result.id">Edit</Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>