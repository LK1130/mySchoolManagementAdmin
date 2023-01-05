<script setup>
import { computed, ref } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    href: String,
    active: Boolean,
});

let showMenu = ref(true);

const classes = computed(() => {
    return props.active
        ? "inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition"
        : "inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition";
});
</script>

<template>
    <!------------- Nav ---------->
    <div class="customnavcolor  min-h-full fixed z-10 transition-all duration-500" :class="showMenu ? 'w-1/6' : 'w-1/12'   ">
        <!-------- Logo ---------->
        <img
                src="../../../public/img/icon1.png"
                alt=""
                class="h-6 ml-auto mr-5 mt-3 sm:block hidden"
                @click="showMenu = !showMenu"
            />
        <div class=" pt-5 w-full text-center" >
            <img
                src="../../../public/img/logo.png"
                alt=""
                class="sm:w-16 md:w-20 mx-auto "
            />
            
        </div>
        
        <!--  -->
        <div class="lg:ml-8 py-3">
            <div
                class="flex flex-row ml-1 h-8 text-white mt-7 lg:justify-start justify-center"
            >
                <Link href="home" class="flex">
                    <img
                        src="../../../public/img/Dashboard.png"
                        alt=""
                        class="w-7 h-7"
                    />
                    <span class="text-lg ml-5 pb-1 lg:block hidden transition-all duration-1000 " :class="showMenu ? 'opacity-100' : 'opacity-0'   "
                        >Dashboard</span
                    >
                </Link>
            </div>
            <div
                class="flex flex-row  h-8 text-white mt-4 lg:justify-start justify-center"
            >
                <Link href="class" class="flex">
                    <img
                        src="../../../public/img/class.png"
                        alt=""
                        class="w-7 h-7"
                    />
                    <span class="text-lg ml-6 pt-1 lg:block hidden transition-all duration-1000 " :class="showMenu ? 'opacity-100' : 'opacity-0'   ">Class</span>
                </Link>
            </div>
            <div
                class="flex flex-row  h-8 text-white mt-4 lg:justify-start justify-center"
            >
                <Link :href="route('students.index')" class="flex">
                    <img
                        src="../../../public/img/Students.png"
                        alt=""
                        class="w-7 h-7"
                    />
                    <span class="text-lg ml-6 pt-1 lg:block hidden transition-all duration-1000 " :class="showMenu ? 'opacity-100' : 'opacity-0'   ">
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
                class="flex flex-row  h-8 text-white mt-4 lg:justify-start justify-center"
            >
                <Link :href="route('instructors.index')" class="flex">
                    <img
                        src="../../../public/img/instructor.png"
                        alt=""
                        class="w-7 h-7"
                    />
                    <span class="text-lg ml-6 pt-1 lg:block hidden transition-all duration-1000 " :class="showMenu ? 'opacity-100' : 'opacity-0'   "
                        >Instructor</span
                    >
                </Link>
            </div>
            <div
                class="flex flex-row  h-8 text-white mt-4 lg:justify-start justify-center"
            >
                <img
                    src="../../../public/img/Admin.png"
                    alt=""
                    class="w-7 h-7"
                />
                <span class="text-lg ml-6 pt-1 lg:block hidden transition-all duration-1000 " :class="showMenu ? 'opacity-100' : 'opacity-0'   ">
                    <Link href="/admin"  >Admins</Link>
                </span>
            </div>
            <div
                class="flex flex-row  h-8 text-white mt-4 lg:justify-start justify-center"
            >
                <Link :href="route('adminPermission.index')" class="flex">
                    <img
                        src="../../../public/img/permission.png"
                        alt=""
                        class="w-7 h-7"
                    />
                    <span class="text-lg ml-6 pt-1 lg:block hidden transition-all duration-1000 " :class="showMenu ? 'opacity-100' : 'opacity-0'   "
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
                    class="w-7 h-7"
                />
                <span class="text-lg ml-6 lg:block hidden transition-all duration-1000 " :class="showMenu ? 'opacity-100' : 'opacity-0'   "
                    ><Link href="/setting"  >Setting</Link></span
                >
            </div>
            <div
                class="flex flex-row text-white mt-4 lg:justify-start justify-center items-center"
            >
                <img
                    src="../../../public/img/Tools.png"
                    alt=""
                    class="w-7 h-7"
                />
                <span class="text-lg ml-6 lg:block hidden transition-all duration-1000 " :class="showMenu ? 'opacity-100' : 'opacity-0'   "
                    ><Link :href="route('mailTool.index')" >Tools</Link></span
                >
            </div>
            <div
                class="flex flex-row text-white mt-4 lg:justify-start justify-center items-center"
            >
                <Link href="/logout" class="flex">
                    <img
                        src="../../../public/img/Logout.png"
                        alt=""
                        class="w-7 h-7"
                    />
                    <span class="text-lg ml-6 lg:block hidden transition-all duration-1000 " :class="showMenu ? 'opacity-100' : 'opacity-0'   ">Logout</span>
                </Link>
            </div>
        </div>
    </div>
    </div>
</template>
