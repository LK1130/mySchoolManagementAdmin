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
        class="absolute h-auto w-4/5 headercustomleft top-32 bg-elementBackground rounded-lg mt-16 ml-5"
    >
        
        <div class="px-4 w-full">
            <table class="text-white w-full bg-elementBackground rounded-lg mt-5">
                <tr class="opacity-70 customfontsize">
                    <th class="text-start pt-4 pl-10">NAME</th>
                    <th class="pt-4">EMAIL</th>
                    <th class="pt-4">ROLE</th>
                    <th class="pt-4">STATUS</th>
                    <th class="pt-4">SETTING</th>
                </tr>
                <tbody class="text-sm customfontsize mt-3">
                    <tr
                        class="border-b"
                        v-for="admin in props.admins.data"
                        :key="admin"
                    >
                        <td class="text-start pl-10 py-4">{{ admin.name }}</td>
                        <td class="text-center text-yellowTextColor py-4">
                            {{ admin.email }}
                        </td>
                        <td class="text-center py-4">{{ admin.r_name }}</td>
                        <td class="text-center py-4 text-green-600" v-if="admin.del_flg == 0">Active</td>
                        <td class="text-center py-4 text-redTextColor" v-else>Suspended</td>
                        <td class="text-center text-yellowTextColor underline py-4">
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
