<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
// import Pagination from "../Components/Pagination.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    role_page: {
        type: Object,
    },
    pages: {
        type: Object,
    },
});

// console.log(props.role_page);

for (const role of props.role_page) {
    if (role.page.length >= 1) {
        console.log(role.page);
    }
}

const form = useForm({});

const submit = () => {
    Inertia.post(route("adminPermission.store"), form, {
        onError: (data) => {
            console.log(data);
        },
    });
};

// console.log(props.roles);
</script>

<template>
    <NavBar />
    <Header headername="Admin Permission" />

    <div class="absolute h-full w-5/6 p-5 headercustomleft top-32 customblack">
        <form @submit.prevent="submit">
            <div
                class="w-full h-auto p-8 relative bg-secondaryBackground rounded-xl flex flex-col space-y-5"
            >
                <div
                    class="w-full flex flex-start border border-white rounded-md overflow-hidden"
                    v-for="role in props.role_page"
                    :key="role.id"
                >
                    <div
                        class="flex items-center justify-center border-r border-white py-5 w-32"
                    >
                        <p class="text-white text-xl">
                            {{ role.r_name }}
                        </p>
                    </div>
                    <div
                        class="flex items-center px-7 py-2"
                        v-for="page in props.pages"
                        :key="page"
                    >
                        <div class="flex flex-col items-center mx-5">
                            <p class="text-white">{{ page.p_name }}</p>

                            <div v-for="rpage in role.page">
                                <input
                                    type="checkbox"
                                    class="mt-1"
                                    :checked="rpage.id == page.id"
                                /> 
                            </div>
                        
                            <input type="checkbox" class="mt-1" v-if="role.page.length==0" />

                        </div>
                    </div>
                </div>

                <!-- <div class="flex justify-center items-center my-10">
                    <Pagination :links="role_page.links"> </Pagination>
                </div> -->

                <div class="flex justify-between mt-5">
                    <div class="flex space-x-5">
                        <Link
                            href="/addPage"
                            class="py-2 px-5 text-whiteTextColor text-sm bg-blueTextColor rounded-xl flex items-center"
                        >
                            <img
                                src="../../../public/img/plus.png"
                                alt=""
                                class="w-5 h-5 pt-0.5"
                            />
                            <span class="mx-2">Add Page</span>
                        </Link>
                        <Link
                            href="/addRole"
                            class="py-2 px-5 text-whiteTextColor text-sm bg-blueTextColor rounded-xl flex items-center"
                        >
                            <img
                                src="../../../public/img/plus.png"
                                alt=""
                                class="w-5 h-5 pt-0.5"
                            />
                            <span class="mx-2">Add Role</span>
                        </Link>
                    </div>
                    <button
                        type="submit"
                        class="py-2 px-5 text-whiteTextColor text-sm bg-blueTextColor rounded-xl flex items-center"
                    >
                        <img
                            src="../../../public/img/save.png"
                            alt=""
                            class="w-5 h-5 pt-0.5"
                        />
                        <span class="mx-2">Save</span>
                    </button>
                </div>
            </div>
        </form>

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

<style></style>
