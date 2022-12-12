<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Toolsbar from "../Components/Toolsbar.vue";
import { Inertia } from "@inertiajs/inertia";

const form = useForm({
    blog_title: null,
    blog_description: null,
    blog_file: null
});

const submit = () => {
    Inertia.post(route("blogTool.store"),form,{
        onError: (data) => {
            console.log(data);
        }
    })
}

</script>

<template>
    <NavBar />
    <Header headername="Tools" />

    <div class="absolute h-full w-5/6 p-5 headercustomleft top-32 customblack">
        <Toolsbar active="3" />

        <form @submit.prevent="prevent">
            <div class="w-full h-full py-8 bg-secondaryBackground rounded-b-xl flex flex-col items-center">
                <div class="w-96 flex flex-col space-y-4">
                    <label for="" class="text-whiteTextColor">Title</label>
                    <input type="text"
                        class="w-72 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0"
                        v-model="form.blog_title">

                    <label for="" class="text-whiteTextColor">Description</label>
                    <textarea
                        class="h-32 resize-none rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0"
                        v-model="form.blog_description"></textarea>

                    <label for="" class="text-whiteTextColor">File</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-32 border-2 cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click
                                        to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                    800x400px)
                                </p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" @change="onFile($event)"/>
                        </label>
                    </div>

                    <div class="flex justify-between py-8">
                        <Link href="/blogTool"
                            class="py-2 px-5 text-whiteTextColor text-sm bg-redTextColor rounded-xl flex items-center">
                        <img src="../../../public/img/delete.png" alt="" class="w-5 h-5 pt-0.5" />
                        <span class="mx-2">Cancel</span>
                        </Link>
                        <Link
                            class="py-2 px-5 text-whiteTextColor text-sm bg-blueTextColor rounded-xl flex items-center">
                        <img src="../../../public/img/save.png" alt="" class="w-5 h-5 pt-0.5" />
                        <span class="mx-2">Save</span>
                        </Link>
                    </div>
                </div>
            </div>
        </form>

        <div class="py-5">
            <button>
                <a href="/blogTool" class="underline underline-offset-4 hidden md:block text-whiteTextColor">BACK</a>
            </button>
        </div>
    </div>
</template>