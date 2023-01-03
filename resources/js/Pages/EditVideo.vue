<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import { ref } from "@vue/reactivity";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    videodata : Object,
});
console.log(props.videodata);

const inputs = ref(1);
const addInput = () => {
    inputs.value += 1;
};
const removeInput = (index) => {
    form.lecturename.splice(index, 1);
    form.storagelink.splice(index, 1);
    form.lecturelocation.splice(index, 1);
    form.lecturefile.splice(index, 1);
    inputs.value -= 1;
};

const form = useForm({
    className: props.videodata,
    classId: props.classDdata,
    videoName: null,
    description: null,
    date: null,
    storage: null,
    storagelocation: null,
    lecturename: [],
    storagelink: [],
    astoragelink: [],
    lecturelocation: [],
    lecturefile: [],
    input: inputs,
});
const submit = () => {
    for (let i = 0; i < form.lecturename.length; i++) {
        if (form.storagelink[i]) {
            form.astoragelink.push(form.storagelink[i]);
        } else {
            form.astoragelink.push(null);
        }
    }
    console.log(form);
    Inertia.post(route("addvideo.store"), form, {
        onError: (data) => {
            console.log(data);
        },
    });
};
function fileOn(obj){
    document.getElementById("rfile"+obj).disabled = true
    document.getElementById("stlink"+obj).disabled = false;
    document.getElementById("storagelocation"+obj).disabled = false;

}
function inputOn(obj){
    document.getElementById("stlink"+obj).disabled = true;
    document.getElementById("storagelocation"+obj).disabled = true;
     document.getElementById("rfile"+obj).disabled = false;
     console.log("a");
}
</script>

<template>
    <!-------------------- Navbar&header -------------------->
    <NavBar />
    <Header headername="Edit Video" />

    <!---------------- body ----------------------->
    <div class="absolute h-full w-5/6 p-5 headercustomleft top-32 customblack">
        <Toolsbar active="5" />
        <div
            class="w-full h-auto p-8 relative bg-secondaryBackground rounded-xl flex flex-col items-center"
        >
            <form @submit.prevent="submit" class="w-full">
                <div class="w-full grid gap-6 mb-6 md:grid-cols-2">
                    <div class="">
                        <p class="text-white">Video Upload</p>

                        <!-- VIEDO PATH -->
                        <div class="ml-10 sm:w-full sm:ml-4 mt-5">
                            <label
                                for="classname"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Class Name</label
                            >
                            <input
                                
                                type="text"
                                id="classname"
                                class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2"
                                placeholder=""
                            />
                        </div>
                        <!-- Name -->
                        <div class="ml-10 sm:w-full sm:ml-4 mt-5">
                            <label
                                for="Name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Name</label
                            >
                            <input
                                
                                type="text"
                                id="Name"
                                class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2"
                                placeholder=""
                            />
                        </div>
                        <!-- Description -->
                        <div class="ml-10 sm:w-full sm:ml-4 mt-5">
                            <label
                                for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Description</label
                            >
                            <textarea
                                
                                name=""
                                id="description"
                                class="resize-none focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2 h-40"
                            ></textarea>
                        </div>
                        <!-- Date -->
                        <div class="ml-10 sm:w-full sm:ml-4 mt-5">
                            <label
                                for="Date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Date</label
                            >
                            <input
                                
                                type="date"
                                id="Date"
                                class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2"
                                placeholder=""
                            />
                        </div>
                        <!-- Storage Link -->
                        <div class="ml-10 sm:w-full sm:ml-4 mt-5">
                            <label
                                for="storage"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Storage Link</label
                            >
                            <input
                                
                                type="text"
                                id="storage"
                                class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2"
                                placeholder=""
                            />
                        </div>
                        <!-- Storage Location -->
                        <div class="ml-10 sm:w-full sm:ml-4 mt-5">
                            <label
                                for="storagelocaton"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Storage location</label
                            >
                            <select
                                
                                name=""
                                id="storagelocaton"
                                class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2"
                            >
                                <option value="Local Database">
                                    Local Database
                                </option>
                                <option value="Youtube">Youtube</option>
                                <option value="Google Drive">
                                    Google Drive
                                </option>
                                <option value="Vimeo">Vimeo</option>
                            </select>
                        </div>
                    </div>
                    <!-- whiteline -->
                    <div
                        class="absolute left-1/2 sm:w-0 md:w-0.5 bg-white h-4/5"
                    ></div>
                    <div>
                        <p class="text-white pl-6">Lecture Upload</p>

                        <div class="pl-10 mt-5">
                            <button
                                class="py-2 px-5 text-whiteTextColor text-md bg-blueTextColor rounded-xl flex items-center"
                                @click="addInput"
                                type="button"
                            >
                                <img
                                    src="../../../public/img/addlogo.png"
                                    alt=""
                                    class="w-5 h-5 pt-0.5"
                                /><span class="mx-2">Create Lecture</span>
                            </button>
                        </div>
                        <!-- Lecture Name -->
                        <div v-for="input in inputs" :key="input">
                            <div class="float-right">
                                <button
                                    type="button"
                                    @click="removeInput(input - 1)"
                                    v-show="input > 1"
                                >
                                    <img
                                        src="../../../public/img/minus-circle.svg"
                                        alt=""
                                        class="w-8 h-8"
                                    />
                                </button>
                            </div>
                            <div class="sm:w-full sm:ml-4 mt-5 pl-7">
                                <label
                                    for="Lecturename"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Lecture Name</label
                                >
                                <input
                                    
                                    type="text"
                                    id="Lecturename"
                                    class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2"
                                    placeholder=""
                                />
                            </div>

                            <!-- FILE -->
                            <div class="sm:w-full sm:ml-4 mt-5 pl-7">
                                <label
                                    :for="`rfile${input}`"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >File</label
                                >
                                <div class="flex flex-row">
                                    <input
                                        
                                        
                                        :id="`rfile${input}`"
                                        disabled
                                        type="file"
                                        class="block w-5/6 h-9 border rounded-xl cursor-pointer file:h-full file:rounded-l-sm file:border-0 file:mr-1.5 "
                                    />
                                    <input type="radio" id="default-radio-1" class="ml-4 mt-2" :name="input" @click="inputOn(input)"/>
                                </div>
                            </div>
                            <div class="flex mt-5 justify-center">
                                <hr class="h-px w-3/12 mt-2" />
                                <p class="text-white mx-5">OR</p>
                                <hr class="h-px w-3/12 mt-2" />
                            </div>
                            <!-- storageLink -->
                            <div class="sm:w-full sm:ml-4 mt-5 pl-7">
                                <label
                                    :for="`stlink${input}`"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Storage Link</label
                                >
                                <input
                                    
                                    type="text"
                                    :id="`stlink${input}`"
                                    class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2 "
                                    placeholder=""
                                />
                            </div>
                            <div class="float-right pr-8">
                                <input checked type="radio" id="default-radio-1" class="ml-4 mt-2" :name="input" @click="fileOn(input)"/>
                            </div>
                            <!-- Storage Location -->
                            <div class="pl-7 sm:w-full sm:ml-4 mt-5">
                                <label
                                    :for="`storagelocation${input}`"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Storage location</label
                                >
                                <select

                                    name=""
                                    :id="`storagelocation${input}`"
                                    class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2 "
                                >
                                    <option value="Local Database" d>
                                        Local Database
                                    </option>
                                    <option value="Youtube">Youtube</option>
                                    <option value="Google Drive">
                                        Google Drive
                                    </option>
                                    <option value="Vimeo">Vimeo</option>
                                </select>
                            </div>
                            <hr
                                class="mt-10 ml-10 h-px w-11/12 bg-gray-200 border-0"
                                id="asdas"
                            />
                        </div>
                    </div>
                </div>
                <div class="flex float-right py-8">
                    <button
                        class="py-2 px-5 text-whiteTextColor text-md bg-blueTextColor rounded-xl flex items-center"
                    >
                        <img
                            src="../../../public/img/save.png"
                            alt=""
                            class="w-5 h-5 pt-0.5"
                        />
                        <span class="mx-2">Save</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
