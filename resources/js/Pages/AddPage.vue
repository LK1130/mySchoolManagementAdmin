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
    page_name: null,
    page_route: null,
});

const submit = () => {
    Inertia.post(route("pageList.store"), form, {
        onError: (data) => {
            console.log(data);
        },
    });
};
</script>

<template>
    <NavBar />
    <Header headername="Add Page" />

    <div
        class="absolute h-full w-5/6 p-5 headercustomleft top-32 customblack bg-white"
    >
        <form @submit.prevent="submit">
            <div
                class="w-4/5 h-auto p-10 mx-auto relative bg-secondaryBackground rounded-xl flex flex-col"
            >
                <div class="mx-auto mt-3">
                    <div class="flex flex-col space-y-6">
                        <div class="flex items-center">
                            <label for="" class="text-whiteTextColor mr-5"
                                >Page Name</label
                            >
                            <input
                                type="text"
                                class="w-96 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0"
                                v-model="form.page_name"
                            />
                        </div>
                        <div
                            v-if="errors.page_name"
                            class="text-red-500 font-bold text-md"
                        >
                            {{ errors.page_name }}
                        </div>

                        <div class="flex items-center">
                            <label for="" class="text-whiteTextColor mr-5"
                                >Page Route</label
                            >
                            <input
                                type="text"
                                class="w-96 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0"
                                v-model="form.page_route"
                            />
                        </div>
                        <div
                            v-if="errors.page_route"
                            class="text-red-500 font-bold text-md"
                        >
                            {{ errors.page_route }}
                        </div>
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
                        <span class="mx-2">Add Page</span>
                    </button>
                </div>
            </div>
        </form>

        <div class="fixed left-42 bottom-5">
            <button>
                <a
                    href="/pageList"
                    class="underline underline-offset-4 hidden md:block text-whiteTextColor"
                    >BACK</a
                >
            </button>
        </div>
    </div>
</template>

<style></style>
