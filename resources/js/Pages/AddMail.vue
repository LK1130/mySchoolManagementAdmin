<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Toolsbar from "../Components/Toolsbar.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";

const props = defineProps({
    errors: {
        type: Object,
    },
    students: {
        type: Object,
    },
    classes: {
        type: Object,
    },
});

const form = useForm({
    student: props.students[0].id,
    class: props.classes[0].id,
    category: 1,
    title: null,
    description: null,
});

let stuClassErr = ref("");

const submit = () => {
    if (
        (form.student == null && form.class == null) ||
        (form.student != null && form.class != null)
    ) {
        stuClassErr.value = "You need to choose where you want to send your mail.";
    } else {
        Inertia.post(route("mailTool.store"), form, {
            onError: (errors) => {
                console.log(errors);
            },
            onSuccess: (data) => {
                console.log(data);
            },
        });
    }
};

function studentOn() {
    document.getElementById("classroom").style.display = "none";
    document.getElementById("student").style.display = "block";

    document.getElementById("classroomBox").style.display = "block";
    document.getElementById("studentBox").style.display = "none";

    form.class = null;
}

let load = ref(false);

function classOn() {
    document.getElementById("student").style.display = "none";
    document.getElementById("classroom").style.display = "block";

    document.getElementById("studentBox").style.display = "block";
    document.getElementById("classroomBox").style.display = "none";

    form.student = null;
}

function information() {
    form.category = 1;
}

function directMessage() {
    form.category = 2;
}

function alert() {
    form.category = 3;
}

function loadFun(){
    console.log(props.errors);
}
</script>

<template>
    <NavBar active=8> </NavBar>
    <Header headername="Tools" />

    <div class="absolute h-full w-5/6 p-5 headercustomleft top-32 customblack">
        <Toolsbar active="1" />
        <form @submit.prevent="submit">
            <div class="w-full h-full py-8 bg-secondaryBackground rounded-b-xl flex flex-col items-center">
                <div class="flex flex-col md:flex-row space-x-10">
                    <div>
                        <div class="flex h-36 space-x-10">
                            <div class="flex flex-col items-end justify-around text-whiteTextColor">
                                <label for="">Students :</label>
                                <label for="">Classes :</label>
                            </div>
                            <div class="flex flex-col items-center justify-around">
                                <select name="" id="student" v-model="form.student" style="display: none"
                                    class="w-72 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0">
                                    <option :value="student.id" v-for="student in students" :key="students">
                                        {{ student.name }}
                                    </option>
                                </select>

                                <select name="" id="studentBox" disabled
                                    class="w-72 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0">
                                    <option></option>
                                </select>

                                <select name="" id="classroom" v-model="form.class" style="display: none"
                                    class="w-72 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0">
                                    <option :value="clas.id" v-for="clas in classes" :key="classes">
                                        {{ clas.c_name }}
                                    </option>
                                </select>

                                <select name="" id="classroomBox" disabled
                                    class="w-72 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0">
                                    <option></option>
                                </select>
                            </div>
                            <div class="flex flex-col items-center justify-around">
                                <input type="radio" value="check" name="check" @click="studentOn" :disabled="load"/>
                                <input type="radio" value="check" name="check" @click="classOn" :disabled="load"/>
                            </div>
                        </div>
                        <label for="" class="text-red-700">{{ stuClassErr }}</label>
                        <div class="flex my-10">
                            <div class="flex flex-col items-center mx-10">
                                <input type="radio" class="form-radio cursor-pointer" name="category" v-model="form.information" @click="information"
                                    :checked="true" :disabled="load"/>
                                <label for="" class="mt-3 text-blueTextColor">Information</label>
                            </div>
                            <div class="flex flex-col items-center mx-10">
                                <input type="radio" class="form-radio cursor-pointer" name="category" v-model="form.directMessage" @click="directMessage"
                                    :checked="false" :disabled="load"/>
                                <label for="" class="mt-3 text-yellowTextColor">Direct Message</label>
                            </div>
                            <div class="flex flex-col items-center mx-10">
                                <input type="radio" class="form-radio cursor-pointer" name="category" v-model="form.alert" @click="alert"
                                    :checked="false" :disabled="load"/>
                                <label for="" class="mt-3 text-tertiaryBackground">Alert</label>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col space-y-3">
                        <div class="flex flex-col">
                            <label for="" class="text-whiteTextColor">Title</label>
                            <input type="text" v-model="form.title"
                                class="w-96 mt-2 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor" :disabled="load"/>
                            <div v-if="errors.title" class="text-red-500 font-bold text-md">
                                {{ errors.title }}
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label for="" class="text-whiteTextColor">Description</label>
                            <textarea v-model="form.description"
                                class="w-96 h-32 mt-2 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor resize-none" :disabled="load"></textarea>
                            <div v-if="errors.description" class="text-red-500 font-bold text-md">
                                {{ errors.description }}
                            </div>
                        </div>

                    </div>
                </div>
                <div class="flex w-5/6 mt-3 flex-row-reverse">
                    <button type="submit" class="py-2 px-8 bg-blueTextColor text-whiteTextColor rounded-xl" @click="loadFun" :disabled="load">
                        Send
                    </button>
                </div>
            </div>
        </form>

        <div class="py-5">
            <button>
                <a href="/mailTool" class="underline underline-offset-4 hidden md:block text-whiteTextColor">BACK</a>
            </button>
        </div>
    </div>
</template>
