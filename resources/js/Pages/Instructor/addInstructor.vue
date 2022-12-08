<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import NavBar from "../../Components/NavBar.vue";
import Header from "../../Components/Header.vue";
import { ref } from "vue";

const props = defineProps({
    names: Object,
    noAdmin: Boolean,
});
console.log(props.noAdmin);

const form = useForm({
    //     _method : "POST",
    ad_id: props.names[0].id,
    name: props.names[0].name,
    email: props.names[0].email,
    address: null,
    contact: null,
});

console.log(props.names);

// form.role = 1;
const submit = () => {
    form.post(route("instructors.store", form));
};

var teacherId = "";
// console.log(props.names.id[0]);
const email = () => {
    teacherId = document.getElementById("selectBox").value;
    form.ad_id = teacherId;

    checkEmail(teacherId);
};
const checkEmail = (teacherId) => {
    for (let index = 0; index < props.names.length; index++) {
        if (props.names[index].id == teacherId) {
            form.email = props.names[index].email;
            form.name = props.names[index].name;
        }
    }
};
checkEmail();
</script>

<template>
    <!-------------------- Navbar&header -------------------->
    <NavBar />
    <Header headername="Add Instructor" />
    <!---------------- body ----------------------->
    <form @submit.prevent="submit">
        <div
            class="absolute w-full md:w-5/6 headercustomleft top-32 customblack flex justify-center items-top"
        >
            <div
                class="w-full md:w-4/6 h-auto custombackgroundcolor mt-14 rounded-2xl flex justify-center"
            >
                <div>
                    <div class="mt-5 text-xl text-white">
                        Name :

                        <span class="pl-8 ml-2">
                            <select
                                id="selectBox"
                                name="status"
                                class="customnavcolor sm:text-sm text-xs sm:w-52 w-32 text-white border-white rounded-xl"
                                autocomplete="off"
                                v-on:change="email"
                            >
                                <option
                                    v-for="vname in names"
                                    :value="vname.id"
                                    class="sm:text-sm text-xs"
                                    :selected="vname.id === 1"
                                >
                                    {{ vname.name }}
                                </option>
                            </select>
                        </span>
                    </div>
                    <!-- <div class="mt-5 text-xl text-white">
                        Name :
                        <span class="pl-8 ml-2"
                            ><input
                                v-model="form.name"
                                type="text"
                                class="customnavcolor text-white sm:text-sm text-xs rounded-lg sm:w-52 w-32 border-white rounded-xl"
                                required
                        /></span>
                    </div> -->
                    <div class="mt-5 text-xl text-white">
                        Email :
                        <span class="pl-8 ml-3"
                            ><input
                                v-model="form.email"
                                type="email"
                                class="customnavcolor text-white sm:text-sm text-xs rounded-lg sm:w-52 w-32 border-white rounded-xl"
                                disabled
                        /></span>
                    </div>
                    <div class="mt-5 text-xl text-white">
                        Address :
                        <span class="pl-5"
                            ><input
                                v-model="form.address"
                                type="text"
                                class="customnavcolor text-white sm:text-sm text-xs rounded-lg sm:w-52 w-32 border-white rounded-xl"
                        /></span>
                    </div>
                    <div class="mt-5 text-xl text-white">
                        Contact :
                        <span class="pl-6"
                            ><input
                                v-model="form.contact"
                                type="number"
                                min="11"
                                class="customnavcolor text-white sm:text-sm text-xs rounded-lg sm:w-52 w-32 border-white rounded-xl"
                                placeholder="Phone Number "
                                required
                        /></span>
                    </div>
                    <div class="mt-5 text-xl text-white">
                        <button
                            class="w-4/6 h-10 mb-5 mt-3 bg-blue-600 hover:bg-blue-700 active:bg-blue-900 rounded-lg p-1 ml-3 text-white sm:text-sm text-xs"
                        >
                            Create
                        </button>
                    </div>
                </div>
            </div>
            <div class="absolute backLink text-xl text-white">
                <a :href="route('instructor.index')">Back</a>
            </div>
        </div>
    </form>
</template>
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
.backLink {
    top: 72vh;
    left: 6vw;
    text-decoration: underline;
}
</style>
