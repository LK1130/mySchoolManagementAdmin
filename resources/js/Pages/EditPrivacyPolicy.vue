<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Toolsbar from "../Components/Toolsbar.vue";

const props = defineProps({
    privacypolicysInfo: {
        type: Object
    }
});

</script>

<template>
    <NavBar />
    <Header headername="Tools" />

    <div class="absolute h-full w-5/6 p-5 headercustomleft top-32 customblack">
        <Toolsbar active="2" />
        <div class="w-full h-full py-8 bg-secondaryBackground rounded-b-xl flex flex-col items-center">
            <form :action="route('privacypolicyTool.update', privacypolicysInfo.id)" method="POST">
                <div class="w-96 flex flex-col space-y-4">
                    <label for="" class="text-whiteTextColor">Title</label>
                    <input type="text"
                        class="w-72 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0"
                        name="privacypolicys_title" :value="privacypolicysInfo.p_title">

                    <label for="" class="text-whiteTextColor">Description</label>
                    <textarea
                        class="h-32 resize-none rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0"
                        name="privacypolicys_description" :value="privacypolicysInfo.p_description"></textarea>

                    <div class="flex justify-between py-8">
                        <button
                            class="py-2 px-5 text-whiteTextColor text-sm bg-redTextColor rounded-xl flex items-center">
                            <img src="../../../public/img/delete.png" alt="" class="w-5 h-5 pt-0.5" />
                            <span class="mx-2">Delete</span>
                        </button>
                        <button type="submit"
                            class="py-2 px-5 text-whiteTextColor text-sm bg-blueTextColor rounded-xl flex items-center">
                            <img src="../../../public/img/save.png" alt="" class="w-5 h-5 pt-0.5" />
                            <span class="mx-2">Save</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="py-5">
            <button>
                <a href="/privacypolicytool"
                    class="underline underline-offset-4 hidden md:block text-whiteTextColor">BACK</a>
            </button>
        </div>
    </div>
</template>