<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Pagination from "../Components/Pagination.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";



const props= defineProps(
    {
        roles: {
            type: Object
        },
        errors: {
        type: Object,
    },
    }
)
const form = useForm({
    name:null,
    email:null,
    password:null,
    role: props.roles ? props.roles[0].id :"" ,
})

const submit = () => {
    Inertia.post(route("admin.store"), form, {
        onError: (data) => {
            console.log(data);
        }
    })
}



</script>





<template>
    <NavBar active=5> </NavBar>
    <Header headername="Add Admin" />
    <div
        class="absolute h-5/6 w-5/6 headercustomleft top-32 bg-primaryBackground flex justify-center items-center flex-col"
    >
        <div
            class="lg:w-5/6 md:w-4/6 xl:w-3/6 w-full h-3/5 bg-elementBackground rounded-2xl space-y-9 p-14"
        >
            <form class="w-full mt-10"
            @submit.prevent="submit"
            >
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
                                class="focus:ring-white focus:border-white bg-elementBackground text-sm rounded-xl ml-14 p-2 text-white w-64"
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
                            class="mb-2 text-lgfont-medium text-gray-900 dark:text-white"
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
                                class="focus:ring-white focus:border-white bg-elementBackground text-sm rounded-xl ml-8 p-2 text-white w-64"
                        /></span>
                        <div v-if="errors.password" class="text-red-500">
                            {{ errors.password }}
                        </div>
                    </div>
                </div>
                <div class="flex items-center flex-col w-full mt-5">
                    <div>
                        <label
                            for="name"
                            class="mb-2 text-lg font-medium text-gray-900 dark:text-white "
                            >Role</label
                        >
                        <span
                            ><select
                            v-model="form.role"
                            name="" id=""
                            class="focus:ring-white focus:border-white bg-elementBackground text-sm rounded-xl ml-16 pl-5 text-white w-64">
                                <option v-for="role in roles" :key="role.id" :value="role.id">{{ role.r_name }}</option>
                                
                            </select>
                            </span>
                    </div>
                </div>
                <div class="flex justify-center items-center mt-10">
                <button
                    type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-lg py-2 px-5"
                    
                >
                    Create
                </button>
            </div>
            </form>
            
        </div>
        <div class="w-14 absolute bottom-0 left-10">
                <button>
                    <a href="/admin" class="underline underline-offset-4 hidden md:block text-white text-xl"
                        >BACK</a
                    >
                </button>
            </div>
    </div>
</template>

<style></style>
