<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? "inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition"
        : "inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition";
});
</script>

<template>
    <!------------- Nav ---------->
    <div class="customnavcolor w-1/6 min-h-full fixed z-10">
        <!-------- Logo ---------->
        <div class="flex flex-row pt-5">
            <img
                src="../../../public/img/logo.png"
                alt=""
                class="sm:w-16 w-12 flex sm:ml-3.5 mx-auto"
            />
            <img
                src="../../../public/img/icon1.png"
                alt=""
                class="h-6 ml-auto mr-5 sm:block hidden"
            />
        </div>
        <!--  -->
        <div class="lg:ml-8">
            <div
                class="flex flex-row ml-1 text-white mt-7 lg:justify-start justify-center"
            >
                <Link href="home" class="flex">
                    <img
                        src="../../../public/img/dashboardicon.png"
                        alt=""
                        class="w-7 h-7"
                    />
                    <span class="text-lg ml-6 pt-1 lg:block hidden"
                        >Dashboard</span
                    >
                </Link>
            </div>
            <div
                class="flex flex-row text-white mt-4 lg:justify-start justify-center"
            >
                <Link href="class" class="flex">
                    <img
                        src="../../../public/img/courseicon.png"
                        alt=""
                        class="w-7 h-7"
                    />
                    <span class="text-lg ml-5 pt-1 lg:block hidden">Class</span>
                </Link>
            </div>
            <div
                class="flex flex-row text-white mt-4 lg:justify-start justify-center"
            >
                <Link :href="route('students.index')" class="flex">
                    <img
                        src="../../../public/img/studenticon.png"
                        alt=""
                        class="w-7 h-7"
                    />
                    <span class="text-lg ml-6 pt-1 lg:block hidden">
                        Student
                    </span>
                </Link>
            </div>
            <div
                class="flex flex-row text-white mt-4 lg:justify-start justify-center"
            >
                <img
                    src="../../../public/img/financeicon.png"
                    alt=""
                    class="w-7 h-7"
                />
                <span class="text-lg ml-6 pt-1 lg:block hidden">Finance</span>
            </div>
            <div
                class="flex flex-row text-white mt-4 lg:justify-start justify-center"
            >
            <Link :href="route('instructors.index')" class="flex">
                <img
                    src="../../../public/img/instructoricon.png"
                    alt=""
                    class="w-7 h-7"
                />
                <span class="text-lg ml-6 pt-1 lg:block hidden"
                    >Instructor</span
                >
            </Link>
            </div>
            <div
                class="flex flex-row text-white mt-4 lg:justify-start justify-center"
            >
                <img
                    src="../../../public/img/wpf_administrator.png"
                    alt=""
                    class="w-7 h-7"
                />
                <span class="text-lg ml-6 pt-1 lg:block hidden">
                    <Link href="/admin"> Admins</Link>
                </span>
            </div>
            <hr class="w-3/4 mt-12 lg:mx-0 mx-auto" />
            <div
                class="flex flex-row text-white mt-10 lg:justify-start justify-center"
            >
                <img
                    src="../../../public/img/settingsicon.png"
                    alt=""
                    class="w-7 h-7"
                />
                <span class="text-lg ml-6 pt-1 lg:block hidden"
                    ><Link href="/setting">Setting</Link></span
                >
            </div>
            <div
                class="flex flex-row text-white mt-4 lg:justify-start justify-center"
            >
                <img
                    src="../../../public/img/toolicon.png"
                    alt=""
                    class="w-7 h-7"
                />
                <span class="text-lg ml-7 pt-1 lg:block hidden"
                    ><Link :href="route('mailTool.index')">Tools</Link></span
                >
            </div>
        </div>
    </div>
</template>
