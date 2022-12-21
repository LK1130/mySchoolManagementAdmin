<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Toolsbar from "../Components/Toolsbar.vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    errors: {
        type: Object
    }
})

const form = useForm({
    blog_title: null,
    blog_description: null,
    blog_file: null
});

const submit = () => {
    Inertia.post(route("blogTool.store"), form, {
        onError: (data) => {
            console.log(data);
        }
    })
}
</script>

<template>
    <NavBar />

    <Head title="Add Blog"></Head>
    <Header headername="Tools" />

    <div class="absolute h-full w-5/6 p-5 headercustomleft top-32 customblack">
        <Toolsbar active="3" />

        <form @submit.prevent="submit">
            <div class="w-full h-auto py-8 bg-secondaryBackground rounded-b-xl flex flex-col items-center">
                <div class="w-full px-20 flex flex-col space-y-4">
                    <label for="" class="text-whiteTextColor">Title</label>
                    <input type="text"
                        class="w-full rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0"
                        v-model="form.blog_title">
                    <div v-if="errors.blog_title" class="text-red-500 font-bold text-md">
                        {{ errors.blog_title }}
                    </div>

                    <label for="" class="text-whiteTextColor">Description</label>
                    <textarea
                        class="h-32 resize-none rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0"
                        v-model="form.blog_description"></textarea>
                    <div v-if="errors.blog_description" class="text-red-500 font-bold text-md">
                        {{ errors.blog_description }}
                    </div>
                    <label for="" class="text-whiteTextColor">File</label>
                    <div class="flex items-center justify-center w-full">

                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-48 border-2 cursor-pointer
                             bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600
                              dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="relative flex flex-col items-center justify-center py-14 overflow-hidden">
                                <div class="flex absolute w-full ">
                                    <img :src="imageFile" alt="" class="w-full   items-center">
                                </div>
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
                            <input id="dropzone-file" type="file" @input="form.blog_file = $event.target.files[0]"
                                @change="showImagePreview($event)" accept="image/*" class="hidden" />
                        </label>
                    </div>
                    <div v-if="errors.blog_file" class="text-red-500 font-bold text-md">
                        {{ errors.blog_file }}
                    </div>
                    <div class="flex justify-end py-8">
                        <!-- <Link href="/blogTool"
                            class="py-2 px-5 text-whiteTextColor text-sm bg-redTextColor rounded-xl flex items-center">
                        <img src="../../../public/img/delete.png" alt="" class="w-5 h-5 pt-0.5" />
                        <span class="mx-2">Cancel</span>
                        </Link> -->

                        <button type="submit"
                            class="py-2 px-5 text-whiteTextColor text-sm bg-blueTextColor rounded-xl flex  items-center">
                            <img src="../../../public/img/save.png" alt="" class="w-5 h-5 pt-0.5" />
                            <span class="mx-1 font-bold text-base">Save</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <div class="py-5">
            <button>
                <a href="/blogTool" class="underline underline-offset-4 hidden md:block text-whiteTextColor">back</a>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "ImageUploader",
    data() {
        return {
            imageFile: null,
            input: null,
            isImageUploading: false,
        };
    },
    methods: {
        showImagePreview(event) {
            this.input = event.target;
            if (this.input.files && this.input.files[0]) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.imageFile = e.target.result;
                };
                reader.readAsDataURL(this.input.files[0]);
            }
        },
    },
};

</script>