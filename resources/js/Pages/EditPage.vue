<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Pagination from "../Components/Pagination.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    errors: {
        type: Object
    },
    page: {
        type: Object,
    },
});

const form = useForm({
    page_id: props.page.id,
    page_name: props.page.p_name,
    page_route: props.page.p_route,
});

const submit = () => {
    Inertia.put(route("pageList.update", form.page_id), form, {
        onError: (data) => {
            console.log(data);
        },
    });
};
</script>

<template>
    <NavBar active=6> </NavBar>
    <Header headername="Edit Page" />

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

                <div class="flex justify-around mt-10">
                    <Link
                        :href="route('pageList.destroy', form.page_id)"
                        method="delete"
                        class="py-2 px-5 text-whiteTextColor text-sm bg-redTextColor rounded-xl flex items-center"
                    >
                        <img
                            src="../../../public/img/delete.png"
                            alt=""
                            class="w-5 h-5 pt-0.5"
                        />
                        <span class="mx-2">Delete</span>
                    </Link>
                    <button
                        type="submit"
                        class="py-2 px-5 text-whiteTextColor text-sm bg-blueTextColor rounded-xl flex items-center"
                    >
                        <img
                            src="../../../public/img/plus.png"
                            alt=""
                            class="w-5 h-5 pt-0.5"
                        />
                        <span class="mx-2">Update</span>
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
