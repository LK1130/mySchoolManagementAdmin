<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Pagination from "../Components/Pagination.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
</script>

<template>
    <NavBar />
    <Header headername="Admin Permission" />

    <div class="absolute h-full w-5/6 p-5 headercustomleft top-32 customblack">
        <div
            class="w-full h-auto p-8 relative bg-secondaryBackground rounded-xl flex flex-col space-y-5"
        >
            <div
                class="w-full flex flex-start border border-white rounded-md overflow-hidden"
            >
                <div
                    class="flex items-center justify-center border-r border-white py-5 px-7"
                >
                    <p class="text-white text-xl">SA</p>
                </div>
                <div class="flex items-center px-7 py-2">
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Students</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Class</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Finance</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Instructor</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Settings</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Tools</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                </div>
            </div>
            <div
                class="w-full flex flex-start border border-white rounded-md overflow-hidden"
            >
                <div
                    class="flex items-center justify-center border-r border-white py-5 px-7"
                >
                    <p class="text-white text-xl">SA</p>
                </div>
                <div class="flex items-center px-7 py-2">
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Students</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Class</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Finance</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Instructor</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Settings</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Tools</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                </div>
            </div>
            <div
                class="w-full flex flex-start border border-white rounded-md overflow-hidden"
            >
                <div
                    class="flex items-center justify-center border-r border-white py-5 px-7"
                >
                    <p class="text-white text-xl">SA</p>
                </div>
                <div class="flex items-center px-7 py-2">
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Students</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Class</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Finance</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Instructor</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Settings</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Tools</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                </div>
            </div>
            <div
                class="w-full flex flex-start border border-white rounded-md overflow-hidden"
            >
                <div
                    class="flex items-center justify-center border-r border-white py-5 px-7"
                >
                    <p class="text-white text-xl">SA</p>
                </div>
                <div class="flex items-center px-7 py-2">
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Students</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Class</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Finance</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Instructor</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Settings</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                    <div class="flex flex-col items-center mx-5">
                        <p class="text-white">Tools</p>
                        <input type="checkbox" class="mt-1" />
                    </div>
                </div>
            </div>

            <div class="flex justify-between mt-5">
                <div class="flex space-x-5">
                    <button>
                        <a
                            href="/addPage"
                            class="py-2 px-5 text-whiteTextColor text-sm bg-blueTextColor rounded-xl flex items-center"
                        >
                            <img
                                src="../../../public/img/plus.png"
                                alt=""
                                class="w-5 h-5 pt-0.5"
                            />
                            <span class="mx-2">Add Page</span>
                        </a>
                    </button>
                    <button>
                        <a
                            href="/addRole"
                            class="py-2 px-5 text-whiteTextColor text-sm bg-blueTextColor rounded-xl flex items-center"
                        >
                            <img
                                src="../../../public/img/plus.png"
                                alt=""
                                class="w-5 h-5 pt-0.5"
                            />
                            <span class="mx-2">Add Role</span>
                        </a>
                    </button>
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
