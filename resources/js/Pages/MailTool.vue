<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Toolsbar from "../Components/Toolsbar.vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    students: {
        type: Object
    },
    classes: {
        type: Object
    }
});

const form = useForm({
    allStudents: null,
    allClasses: null,
    student: null,
    class: null,
    information: null,
    alert: null,
    directMessage: null,
    title: null,
    description: null
});

const submit = () => {
    Inertia.post(route("mailTool.store",form,{
        onError: (data) => {
            console.log(data);
        }
    }))
}

</script>

<template>
    <NavBar />
    <Header headername="Tools" />

    <div class="absolute h-full w-5/6 p-5 headercustomleft top-32 customblack">
        <Toolsbar active="1" />
        <form @submit.prevent="submit">
            <div class="w-full h-full py-8 bg-secondaryBackground rounded-b-xl flex flex-col items-center">
                <div class="flex h-36 space-x-16">
                    <div class="flex flex-col items-end justify-around text-whiteTextColor">
                        <label for="">Students :</label>
                        <label for="">Class :</label>
                    </div>
                    <div class="flex flex-col items-center justify-around">
                        <select name="" id="" v-model="form.student"
                            class="w-72 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0">
                            <option :value="student.id" v-for="student in students" :key="students">
                                {{ student.name }}
                            </option>
                        </select>
                        <select name="" id="" v-model="form.class"
                            class="w-72 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor focus:outline-0">
                            <option :value="clas.id" v-for="clas in classes" :key="classes">
                                {{ clas.c_name }}
                            </option>
                        </select>
                    </div>
                    <div class="flex flex-col items-center justify-around">
                        <input type="radio" value="check" name="check" v-model="form.allStudents">
                        <input type="radio" value="check" name="check" v-model="form.allClasses">
                    </div>
                </div>
                <div class="flex my-10">
                    <div class="flex flex-col items-center mx-10">
                        <input type="checkbox" class="rounded-full">
                        <label for="" class="mt-3 text-blueTextColor">Information</label>
                    </div>
                    <div class="flex flex-col items-center mx-10">
                        <input type="checkbox" class="rounded-full">
                        <label for="" class="mt-3 text-tertiaryBackground">Alert</label>
                    </div>
                    <div class="flex flex-col items-center mx-10">
                        <input type="checkbox" class="rounded-full">
                        <label for="" class="mt-3 text-yellowTextColor">Direct Message</label>
                    </div>
                </div>
                <div class="flex flex-col space-y-3">
                    <div class="flex flex-col">
                        <label for="" class="text-whiteTextColor">Title</label>
                        <input type="text"
                            class="w-96 mt-2 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor">
                    </div>

                    <div class="flex flex-col">
                        <label for="" class="text-whiteTextColor">Description</label>
                        <textarea
                            class="w-96 h-32 mt-2 rounded-xl bg-secondaryBackground text-whiteTextColor border-whiteTextColor resize-none"></textarea>
                    </div>
                </div>
                <div class="flex w-2/3 mt-3 flex-row-reverse">
                    <button class="py-2 px-8 bg-blueTextColor text-whiteTextColor rounded-xl">Send</button>
                </div>
            </div>
        </form>
    </div>
</template>