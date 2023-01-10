<script setup>
import { computed, ref } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    href: String,

    active: {
        props : Number,
        default : 0
    },
});
console.log(props.active);
let showMenu = ref(true);

// const classes = computed(() => {
//     return props.active
//         ? "inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition"
//         : "inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition";
// });
</script>

<template>
    <!------------- Nav ---------->
    <div
        class="customnavcolor min-h-full fixed z-10 transition-all duration-500"
        :class="showMenu ? 'w-1/6' : 'w-24'"
        @mouseover="showMenu = true"
        @mouseout="showMenu = false"
    >
        <!-------- Logo ---------->
        <div class="pt-5 w-full text-center">
            <img
                src="../../../public/img/logo.png"
                alt=""
                class="sm:w-12 md:w-16 mx-auto"
            />
            <p class="text-white font-semibold pt-2"> Ex;braiN </p>
        </div>

        <!--  -->
        <div class="lg:ml-8 py-3">
            <div
                class="flex flex-row ml-1 h-8 text-white mt-7 lg:justify-start justify-center"
            >
                <Link :href="route('dashboard.index')" class="flex">
                    <img
                        src="../../../public/img/Dashboard.png"
                        alt=""
                        class="w-7 h-7"
                        :class="active == 1 ? 'opacity-100':'opacity-30'"
                    />
                    <span
                        class="text-lg ml-5 pb-1 lg:block hidden transition-all duration-100 hover:opacity-100"
                        :class="showMenu ? (active == 1 ? 'opacity-100':'opacity-30' ): 'opacity-0'"
                        
                        >Dashboard</span
                    >
                </Link>
            </div>
            <div
                class="flex flex-row h-8 text-white mt-4 lg:justify-start justify-center"
            >
                <Link href="class" class="flex">
                    <img
                        src="../../../public/img/class.png"
                        alt=""
                        class="w-7 h-7 hover:opacity-100"
                        :class="active == 2 ? 'opacity-100':'opacity-30'"
                    />
                    <span
                        class="text-lg ml-6 pt-1 lg:block hidden transition-all duration-100 hover:opacity-100"
                        :class="showMenu ? (active == 2 ? 'opacity-100':'opacity-30' ): 'opacity-0'"
                        >Class</span
                    >
                </Link>
            </div>
            <div
                class="flex flex-row h-8 text-white mt-4 lg:justify-start justify-center"
            >
                <Link :href="route('students.index')" class="flex">
                    <img
                        src="../../../public/img/Students.png"
                        alt=""
                        class="w-7 h-7 hover:opacity-100"
                        :class="active == 3 ? 'opacity-100':'opacity-30'"
                    />
                    <span
                        class="text-lg ml-6 pt-1 lg:block hidden transition-all duration-100 hover:opacity-100"
                        :class="showMenu ? (active == 3 ? 'opacity-100':'opacity-30' ): 'opacity-0'"
                    >
                        Student
                    </span>
                </Link>
            </div>
            <!-- <div
                class="flex flex-row text-white mt-4 lg:justify-start justify-center"
            >
                <img
                    src="../../../public/img/finance.png"
                    alt=""
                    class="w-7 h-7"
                />
                <span class="text-lg ml-6 pt-1 lg:block hidden" >Finance</span>
            </div> -->
            <div
                class="flex flex-row h-8 text-white mt-4 lg:justify-start justify-center"
            >
                <Link :href="route('instructors.index')" class="flex">
                    <img
                        src="../../../public/img/instructor.png"
                        alt=""
                        class="w-7 h-7 hover:opacity-100"
                        :class="active == 4 ? 'opacity-100':'opacity-30'"
                    />
                    <span
                        class="text-lg ml-6 pt-1 lg:block hidden transition-all duration-100 hover:opacity-100"
                        :class="showMenu ? (active == 4 ? 'opacity-100':'opacity-30' ): 'opacity-0'"
                        >Instructor</span
                    >
                </Link>
            </div>
            <div
                class="flex flex-row h-8 text-white mt-4 lg:justify-start justify-center"
            >
                <img
                    src="../../../public/img/Admin.png"
                    alt=""
                    class="w-7 h-7 hover:opacity-100"
                    :class="active == 5 ? 'opacity-100':'opacity-30'"
                />
                <span
                    class="text-lg ml-6 pt-1 lg:block hidden transition-all duration-100 hover:opacity-100 "
                    :class="showMenu ? (active == 5 ? 'opacity-100':'opacity-30' ): 'opacity-0'"
                >
                    <Link href="/admin">Admin</Link>
                </span>
            </div>
            <div
                class="flex flex-row h-8 text-white mt-4 lg:justify-start justify-center"
            >
                <Link :href="route('adminPermission.index')" class="flex">
                    <img
                        src="../../../public/img/permission.png"
                        alt=""
                        class="w-7 h-7 hover:opacity-100"
                        :class="active == 6 ? 'opacity-100':'opacity-30'"
                    />
                    <span
                        class="text-lg ml-6 pt-1 lg:block hidden transition-all duration-100 hover:opacity-100"
                        :class="showMenu ? (active == 6 ? 'opacity-100':'opacity-30' ): 'opacity-0'"
                        >Permission</span
                    >
                </Link>
            </div>
            <!-- <hr class="w-3/4 mt-12 lg:mx-0 mx-auto" /> -->
            <div class="absolute bottom-10">
                <div
                    class="flex flex-row text-white mt-10 lg:justify-start justify-center items-center"
                >
                    <img
                        src="../../../public/img/Settings.png"
                        alt=""
                        class="w-7 h-7 hover:opacity-100"
                        :class="active == 7 ? 'opacity-100':'opacity-30'"
                    />
                    <span
                        class="text-lg ml-6 lg:block hidden transition-all duration-100 hover:opacity-100"
                        :class="showMenu ? (active == 7 ? 'opacity-100':'opacity-30' ): 'opacity-0'"
                        ><Link href="/setting">Settings</Link></span
                    >
                </div>
                <div
                    class="flex flex-row text-white mt-4 lg:justify-start justify-center items-center"
                >
                    <img
                        src="../../../public/img/Tools.png"
                        alt=""
                        class="w-7 h-7 hover:opacity-100"
                        :class="active == 8 ? 'opacity-100':'opacity-30'"
                       
                    />
                    <span
                        class="text-lg ml-6 lg:block hidden transition-all duration-100 hover:opacity-100"
                        :class="showMenu ? (active == 8 ? 'opacity-100':'opacity-30' ): 'opacity-0'"
                        ><Link :href="route('mailTool.index')"
                            >Tools</Link
                        ></span
                    >
                </div>
                <div
                    class="flex flex-row text-white mt-4 lg:justify-start justify-center items-center"
                >
                    <Link href="/logout" class="flex">
                        <img
                            src="../../../public/img/Logout.png"
                            alt=""
                            class="w-7 h-7 opacity-100 hover:opacity-100"
                            
                        />
                        <span
                            class="text-lg ml-6 lg:block hidden transition-all duration-100 "
                            :class="showMenu ? 'opacity-100' : 'opacity-0'"
                            >Logout</span
                        >
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>
