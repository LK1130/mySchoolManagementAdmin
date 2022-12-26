<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Pagination from "../Components/Pagination.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    adminInfo: {
        type: Object,
    },
    roles: {
        type: Object,
    },
    errors: {
        type: Object,
    },
});
const form = useForm({
    id: props.adminInfo.id,
    name: props.adminInfo.name,
    email: props.adminInfo.email,
    password: null,
    roles: props.adminInfo.role_id,
});
console.log(props.adminInfo.role_id);
const submit = () => {
    Inertia.put(route("admin.update", form.id), form, {
        onError: (data) => {
            console.log(data);
        },
    });
};
</script>

<template>
    <NavBar />
    <Header headername="Edit Admin" />
    <div
        class="absolute h-5/6 w-5/6 headercustomleft top-32 bg-primaryBackground flex justify-center items-center flex-col"
    >
        <div
            class="lg:w-5/6 md:w-4/6 xl:w-3/6 w-full h-3/5 bg-elementBackground rounded-2xl space-y-9 p-14"
        >
            <form class="w-full mt-10" @submit.prevent="submit">
                <div class="flex items-center flex-col w-full">
                    <div>
                        <label
                            for="name"
                            class="mb-2 text-lg font-medium text-gray-900 dark:text-white"
                            >Name</label
                        >
                        <span
                            ><input
                                v-model="form.name"
                                type="text"
                                class="focus:ring-white focus:border-white bg-elementBackground text-sm rounded-xl ml-16 p-2 text-white w-64"
                        /></span>
                        <div v-if="errors.name" class="text-red-500">
                            {{ errors.name }}
                        </div>
                    </div>
                </div>
                <div class="flex items-center flex-col w-full mt-5">
                    <div>
                        <label
                            for="name"
                            class="mb-2 text-lg font-medium text-gray-900 dark:text-white"
                            >Email</label
                        >
                        <span
                            ><input
                                v-model="form.email"
                                type="text"
                                class="focus:ring-white focus:border-white bg-elementBackground text-sm rounded-xl ml-16 p-2 text-white w-64"
                        /></span>
                        <div v-if="errors.email" class="text-red-500">
                            {{ errors.email }}
                        </div>
                    </div>
                </div>
                <div class="flex items-center flex-col w-full mt-5">
                    <div>
                        <label
                            for="name"
                            class="mb-2 text-lgfont-medium text-gray-900 dark:text-white"
                            >Password</label
                        >
                        <span
                            ><input
                                v-model="form.password"
                                type="password"
                                class="focus:ring-white focus:border-white bg-elementBackground text-md rounded-xl ml-8 p-2 text-white w-64"
                        /></span>
                    </div>
                </div>
                <div class="flex items-center flex-col w-full mt-5">
                    <div>
                        <label
                            for="name"
                            class="mb-2 text-lg font-medium text-gray-900 dark:text-white"
                            >Role</label
                        >
                        <span
                            ><select
                                v-model="form.roles"
                                name=""
                                id=""
                                class="focus:ring-white focus:border-white bg-elementBackground text-sm rounded-xl ml-16 pl-5 text-white w-64"
                            >
                                <option
                                    v-for="role in roles"
                                    :key="role.id"
                                    :value="role.id"
                                >
                                    {{ role.r_name }}
                                </option>
                            </select>
                        </span>
                    </div>
                </div>
                <div class="flex justify-between py-8">
                    <Link :href="route('admin.destroy',form.id)"  method="delete"> 
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
                    
                    </Link>

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
        <div>
            <div class="w-14 absolute bottom-0 left-10">
                <button>
                    <a
                        href="/admin"
                        class="underline underline-offset-4 hidden md:block text-white text-xl"
                        >BACK</a
                    >
                </button>
            </div>
        </div>
    </div>
</template>

<style></style>
