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
    privacypolicysInfo: {
        type: Object,
    },
    categories: {
        type: Object,
    },
});

// console.log(props.categories);

const form = useForm({
    id: props.privacypolicysInfo.id,
    privacypolicys_title: props.privacypolicysInfo.p_title,
    privacypolicys_description: props.privacypolicysInfo.p_description,
    category: props.privacypolicysInfo.category_id,
});

// console.log(props.privacypolicysInfo.p_title);

const submit = () => {
    Inertia.put(
        route("privacypolicyTool.update", props.privacypolicysInfo.id),
        form,
        {
            onError: (data) => {
                console.log(data);
            },
        }
    );
};
</script>

<template>
    <NavBar active=8> </NavBar>
    <Header headername="Tools" />

    <div class="absolute h-full w-5/6 p-5 headercustomleft top-32 customblack">
        <Toolsbar active="2" />
        <div
            class="w-full h-full py-8 bg-secondaryBackground rounded-b-xl flex flex-col items-center"
        >
            <form @submit.prevent="submit">
                <div class="w-96 flex flex-col space-y-4">
                    <label for="" class="text-whiteTextColor">Title</label>
                    <input
                        type="text"
                        class="w-72 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0"
                        v-model="form.privacypolicys_title"
                    />
                    <div
                        v-if="errors.privacypolicys_title"
                        class="text-red-500 font-bold text-md"
                    >
                        {{ errors.privacypolicys_title }}
                    </div>

                    <label for="" class="text-whiteTextColor"
                        >Description</label
                    >
                    <textarea
                        class="h-32 resize-none rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0"
                        v-model="form.privacypolicys_description"
                    ></textarea>
                    <div
                        v-if="errors.privacypolicys_description"
                        class="text-red-500 font-bold text-md"
                    >
                        {{ errors.privacypolicys_description }}
                    </div>

                    <label for="" class="text-whiteTextColor">Categories</label>
                    <select
                        name=""
                        id=""
                        v-model="form.category"
                        class="w-72 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0"
                    >
                        <option
                            :value="cat.id"
                            v-for="cat in categories"
                            :key="cat.id"
                        >
                            {{ cat.c_name }}
                        </option>
                    </select>
                    <div
                        v-if="errors.category"
                        class="text-red-500 font-bold text-md"
                    >
                        {{ errors.category }}
                    </div>

                    <div class="flex justify-between py-8">
                        <Link
                            :href="route('privacypolicyTool.destroy', form.id)"
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
                    href="/privacypolicyTool"
                    class="underline underline-offset-4 hidden md:block text-whiteTextColor"
                    >BACK</a
                >
            </button>
        </div>
    </div>
</template>
