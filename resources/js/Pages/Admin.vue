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
    },
});
console.log(props.admins);
</script>

<template>
    <NavBar active="5"> </NavBar>
    <Header headername="Admin" />

    <div
        class="absolute top-32 headercustomleft w-5/6 h-auto bg-elementBackground items-center flex flex-col rounded-lg"
    >
        <div class="px-4 w-5/6">
            <table class="text-white w-full bg-elementBackground rounded-lg">
                <tr class="opacity-70 customfontsize">
                    <th class="text-start pt-4 pl-10">NAME</th>
                    <th class="pt-4">EMAIL</th>
                    <th class="pt-4">ROLE</th>
                    <th class="pt-4">SETTING</th>
                </tr>
                <tbody class="text-sm customfontsize">
                    <tr
                        class="cusborder"
                        v-for="admin in props.admins.data"
                        :key="admin"
                    >
                        <td class="text-start pl-10 py-2">{{ admin.name }}</td>
                        <td class="text-center text-yellowTextColor">
                            {{ admin.email }}
                        </td>
                        <td class="text-center">{{ admin.r_name }}</td>

                        <td class="text-center text-yellowTextColor underline">
                            <Link :href="route('admin.edit', admin.id)">
                                Edit
                            </Link>
                        </td>
                    </tr>
                </tbody>
                <div class="flex justify-center items-center my-">
                <Pagination :links="admins.links"> </Pagination>
            </div>
            </table>
            
            <div class="flex py-8 justify-end w-full">
            <div class="px-5">
                <Link href="/adminPermission">
                    <button
                        class="py-2 px-5 text-whiteTextColor text-md bg-blueTextColor rounded-xl flex items-center"
                    >
                        <img
                            src="../../../public/img/fluent-mdl2_permissions-solid.png"
                            alt=""
                            class="w-5 h-5 pt-0.5"
                        />
                        <span class="mx-2">Permission</span>
                    </button>
                </Link>
            </div>
            <div class="px-5">
                <Link :href="route('admin.create')">
                    <button
                        class="py-2 px-5 text-whiteTextColor text-md bg-blueTextColor rounded-xl flex items-center"
                        type="button"
                    >
                        <img
                            src="../../../public/img/addlogo.png"
                            alt=""
                            class="w-5 h-5 pt-0.5"
                        />

                        <span>Add Admin</span>
                    </button>
                </Link>
            </div>
        </div>
        </div>
        
    </div>
</template>

<style></style>
