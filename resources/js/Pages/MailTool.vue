<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Toolsbar from "../Components/Toolsbar.vue";

</script>

<template>
    <NavBar />
    <Header headername="Tools" />

    <div class="absolute h-full w-5/6 p-5 headercustomleft top-32 customblack">
        <Toolsbar active="1"/>
        <div class="w-full h-full py-8 bg-secondaryBackground rounded-b-xl flex flex-col items-center">
            <div class="flex h-36 space-x-16">
                <div class="flex flex-col items-end justify-around text-whiteTextColor">
                    <label for="">Students :</label>
                    <label for="">Class :</label>
                </div>
                <div class="flex flex-col items-center justify-around">
                    <select name="" id=""
                        class="w-72 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0">
                        <option value="hello">hello</option>
                        <option value="hello">hello</option>
                        <option value="hello">hello</option>
                        <option value="hello">hello</option>
                        <option value="hello">hello</option>
                    </select>
                    <select name="" id=""
                        class="w-72 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0">
                        <option value="hello">hello</option>
                        <option value="hello">hello</option>
                        <option value="hello">hello</option>
                        <option value="hello">hello</option>
                        <option value="hello">hello</option>
                    </select>
                </div>
                <div class="flex flex-col items-center justify-around">
                    <input type="radio" value="check" name="check">
                    <input type="radio" value="check" name="check">
                </div>
            </div>
            <div class="flex my-10">
                <div class="flex flex-col items-center mx-10">
                    <input type="checkbox" class="rounded-full">
                    <label for="" class="mt-3 text-blueTextColor">Information</label>
                </div>
                <div class="flex flex-col items-center mx-10">
                    <input type="checkbox" class="rounded-full">
                    <label for="" class="mt-3 text-tertiaryBackground">Information</label>
                </div>
                <div class="flex flex-col items-center mx-10">
                    <input type="checkbox" class="rounded-full">
                    <label for="" class="mt-3 text-yellowTextColor">Information</label>
                </div>
            </div>
            <div class="flex flex-col space-y-3">
                <div class="flex flex-col">
                    <label for="" class="text-whiteTextColor">Title</label>
                    <input type="text" class="w-96 mt-2 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor">
                </div>

                <div class="flex flex-col">
                    <label for="" class="text-whiteTextColor">Description</label>
                    <textarea class="w-96 h-32 mt-2 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor resize-none"></textarea>
                </div>
            </div>
            <div class="flex w-2/3 mt-3 flex-row-reverse">
                <button class="py-2 px-8 bg-blueTextColor text-whiteTextColor rounded-xl">Send</button>
            </div>
        </div>
    </div>
</template>