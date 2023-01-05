<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Toolsbar from "../Components/Toolsbar.vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    errors: {
        type: Object,
    },
    categoriesInfo: {
        type: Object,
    },
});

const form = useForm({
    id: props.categoriesInfo.id,
    category_name: props.categoriesInfo.c_name,
});

const submit = () => {
    Inertia.put(route("categoryTool.update", props.categoriesInfo.id), form, {
        onError: (data) => {
            console.log(data);
        },
    });
};
</script>

<template>
    <NavBar />
    <Header headername="Tools" />

    <div class="absolute h-full w-5/6 p-5 headercustomleft top-32 customblack">
        <Toolsbar active="4" />
        <div
            class="w-full h-full py-8 bg-secondaryBackground rounded-b-xl flex flex-col items-center"
        >
            <form @submit.prevent="submit">
                <div class="w-96 flex flex-col space-y-4">
                    <div class="flex items-center mt-5 w-full justify-between">
                        <label for="" class="text-whiteTextColor text-md"
                            >Name :
                        </label>
                        <input
                            type="text"
                            v-model="form.category_name"
                            class="w-72 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0"
                        />
                    </div>
                    <div
                        v-if="errors.category_name"
                        class="text-red-500 font-bold text-md"
                    >
                        {{ errors.category_name }}
                    </div>

                    <div class="flex justify-end py-8">
                        <button
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
        </div>

        <div class="py-5">
            <button>
                <a
                    href="/categoryTool"
                    class="underline underline-offset-4 hidden md:block text-whiteTextColor"
                    >BACK</a
                >
            </button>
        </div>
    </div>
</template>
