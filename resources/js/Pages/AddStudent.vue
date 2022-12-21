<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import { Inertia } from "@inertiajs/inertia";
import { Link, Head } from "@inertiajs/inertia-vue3";
import { useForm, Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

const form = useForm({
    name: null,
    email: null,
});

const disable = ref(false);
const show = ref(true);
const show2 = ref(false);

const props = defineProps({
    errors: Object,
});

const submit = () => {
    console.log(props.errors.name);
    console.log(props.errors.email);
    Inertia.post(route("students.store"), form, {
        onError: (data) => {
            console.log(data);
        },
        onStart: (data) => {
            disable.value = true;
            console.log(data);
            // if (props.errors.email  && props.errors.name == null) {
            //     alert("HI");
            //     show.value = false;
            //     show2.value = true;
            // }
        },
        onFinish: () => {
            disable.value = false;
        },
    });
};
console.log(props.errors);
</script>

<template>
    <!-------------------- Navbar&header -------------------->
    <NavBar />
    <Head title="Student List"></Head>
    <Header headername="Add Student" />
    <!---------------- body ----------------------->
    <div
        class="absolute h-5/6 w-5/6 headercustomleft top-32 bg-primaryBackground flex justify-center items-center"
    >
        <form
            @submit.prevent="submit"
            class="lg:w-5/6 md:w-4/6 xl:w-3/6 w-full h-3/6 bg-elementBackground rounded-2xl space-y-9 p-14"
            v-show="show"
        >
            <div class="flex flex-col">
                <label
                    for="first_name"
                    class="block mb-2 text-lg font-medium text-white md:text-xl"
                    >Name</label
                >
                <input
                    v-model="form.name"
                    type="text"
                    id="first_name"
                    class="w-full border border-white text-sm rounded-lg focus:ring-white focus:border-0 block p-2.5 bg-gray-700 text-white"
                    placeholder="John"
                />
                <div v-if="errors.name" class="text-red-700 text-md">
                    {{ errors.name }}
                </div>
            </div>
            <div class="">
                <label
                    for="email"
                    class="block mb-2 text-lg md:text-xl font-medium text-gray-900 dark:text-white"
                    >Email address</label
                >
                <input
                    v-model="form.email"
                    type="text"
                    id="email"
                    class="w-full border border-white text-sm rounded-lg focus:ring-white focus:border-0 block p-2.5 bg-gray-700 text-white"
                    placeholder="john.doe@gmail.com"
                />
                <div v-if="errors.email" class="text-red-700 text-md">
                    {{ errors.email }}
                </div>
            </div>

            <div class="flex justify-center items-center">
                <button
                    type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-lg px-16 py-2"
                    :disabled="disable"
                >
                    Create
                </button>
            </div>
            <button
                disabled
                type="button"
                v-show="show2"
                class="py-2.5 px-5 mr-2 text-sm font-medium rounded-lg border focus:z-10 focus:ring-4 focus:outline-none focus:ring-blue-700 focus:text-blue-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700 inline-flex items-center"
            >
                <svg
                    aria-hidden="true"
                    role="status"
                    class="inline mr-2 w-4 h-4 text-gray-200 animate-spin dark:text-gray-600"
                    viewBox="0 0 100 101"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor"
                    />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="#1C64F2"
                    />
                </svg>
                Redirecting to the main page !!!!
            </button>
        </form>
    </div>
</template>
