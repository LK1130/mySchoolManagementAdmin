<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Pagination from "../Components/Pagination.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    errors: {
        type: Object,
    },
});

const form = useForm({
    role_name: null,
});

const submit = () => {
    Inertia.post(route("addRole.store"), form, {
        onError: (data) => {
            console.log(data);
        },
    });
};
</script>

<template>
    <NavBar active=8> </NavBar>
    <Header headername="Admin Permission" />

    <div
        class="absolute h-full w-5/6 p-5 headercustomleft top-32 customblack bg-white"
    >
        <form @submit.prevent="submit">
            <div
                class="w-4/5 h-auto p-10 mx-auto relative bg-secondaryBackground rounded-xl flex flex-col"
            >
                <div class="mx-auto mt-3">
                    <label for="" class="text-whiteTextColor mr-5"
                        >Role Name</label
                    >
                    <input
                        type="text"
                        class="w-96 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0"
                        v-model="form.role_name"
                    />
                    <div
                        v-if="errors.role_name"
                        class="text-red-500 font-bold text-md mt-5"
                    >
                        {{ errors.role_name }}
                    </div>
                </div>

                <div class="flex justify-end mt-5">
                    <button
                        type="submit"
                        class="py-2 px-5 text-whiteTextColor text-sm bg-blueTextColor rounded-xl flex items-center"
                    >
                        <img
                            src="../../../public/img/plus.png"
                            alt=""
                            class="w-5 h-5 pt-0.5"
                        />
                        <span class="mx-2">Add Role</span>
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
