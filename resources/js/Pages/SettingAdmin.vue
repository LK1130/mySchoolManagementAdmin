<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Pagination from "../Components/Pagination.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import Notisuccuss from "../Components/Notisuccuss.vue";

const props = defineProps({
    mysch: Object,
    public: Object,
    errors: {
        type: Object,
    },
});
const form = useForm({
    logo: null,
    favicon: null,
    sitename: props.mysch[0].sitename,
    facebook: props.mysch[0].facebook_link,
    youtube1: props.mysch[0].youtube_link1,
    youtube2: props.mysch[0].youtube_link2,
    youtube3: props.mysch[0].youtube_link3,
    messenger: props.mysch[0].messanger_link1,
});
let mysc_logoimageFile = ref(props.mysch[0].logo);
let mysc_input = null;
const mysc_logoshowImage = (event) => {
    input = event.target;
    if (mysc_input.files && mysc_input.files[0]) {
        const file = event.target.files[0];
        mysc_logoimageFile.value = URL.createObjectURL(file);
    }
};
// console.log(mysc_imageFile);
console.log(form);
const submit_mysc = () => {
    Inertia.post("setting/upload", form, {
        onError: (data) => {
            console.log(data);
            // inputField.value.focus();
        },
        onSuccess: (data) => {
            console.log(showNoti.value);
            setTimeout(() => {
                showNoti.value = !showNoti.value;
                console.log("mysch");
            }, 2000);
        },
    });
};

const form_public = useForm({
    logos: null,
    favicons: null,
    sitenames: props.public[0].sitename,
    facebook: props.public[0].facebook_link,
    youtube1: props.public[0].youtube_link1,
    youtube2: props.public[0].youtube_link2,
    messenger: props.public[0].messanger_link1,
    copyright: props.public[0].copyright,
    phone: props.public[0].phones,
});
const submit_public = () => {
    Inertia.post("setting/upload_public", form_public, {
        onError: (data) => {
            console.log(data);
            // inputField.value.focus();
        },
        onSuccess: (data) => {
            console.log(showNoti.value);
            setTimeout(() => {
                showNoti.value = !showNoti.value;
                console.log("public");
            }, 2000);
        },
    });
    // console.log(form_public);
};

// TabChange
let openTab = ref(1);

let showNoti = ref(false);
</script>

<template>
    <Head title="Setting" />
    <!-------------------- Navbar&header -------------------->
    <NavBar active="7"></NavBar>
    <Header headername="Settings" />

    <div
        class="absolute top-32 headercustomleft w-5/6 h-auto bg-primaryBackground items-center flex flex-col"
    >
        <div v-if="$page.props.flash.message" class="absolute z-50 right-10">
            <Notisuccuss v-if="showNoti" />
        </div>

        <div
            class="flex items-center w-11/12 mt-24 bg-primaryBackground flex-row justify-center"
        >
            <div
                class="w-4/6 items-center text-center rounded-tl-xl bg-primaryBackground text-white p-4 cursor-pointer tab hover:bg-elementBackground"
                id="tab-1"
                @click="openTab = 1"
                :class="{
                    'bg-primaryBackground': openTab != 1,
                    'bg-elementBackground': openTab == 1,
                }"
            >
                SiteMaster Myschool
            </div>
            <div
                class="w-4/6 items-center text-center rounded-tr-xl bg-primaryBackground hover:bg-elementBackground text-white p-4 cursor-pointer tab"
                id="tab-2"
                @click="openTab = 2"
                v-bind:class="{
                    'bg-primaryBackground': openTab != 2,
                    'bg-elementBackground': openTab == 2,
                }"
            >
                SiteMaster Public
            </div>
        </div>
        <div
            class="w-11/12 h-auto bg-elementBackground text-white tab-pannel-2 rounded-b-xl"
            id="tab-pannel-1"
            v-bind:class="{ hidden: openTab != 1, block: openTab == 1 }"
        >
            <!-- Myschool -->
            <form
                class="mt-6"
                @submit.prevent="submit_mysc"
                enctype="multipart/form-data"
            >
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <!-- LOGO -->
                    <div class="ml-8 my-5">
                        <div class="ml-10 my-5 sm:w-full sm:ml-4">
                            <label
                                for=""
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Logo</label
                            >
                            <label
                                for="dropzone-file"
                                class="flex flex-col items-center justify-center w-5/6 h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                            >
                                <div
                                    class="flex flex-col items-center justify-center pt-5 pb-6"
                                >
                                    <svg
                                        aria-hidden="true"
                                        class="w-10 h-10 mb-3 text-gray-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                                        ></path>
                                    </svg>
                                    <p
                                        class="mb-2 text-sm text-gray-500 dark:text-gray-400"
                                    >
                                        <span class="font-semibold"
                                            >Click to upload</span
                                        >
                                    </p>
                                    <p
                                        class="text-xs text-gray-500 dark:text-gray-400"
                                    >
                                        SVG, PNG, JPG or GIF (MAX. 800x400px)
                                    </p>
                                </div>
                                <input
                                    @input="form.logo = $event.target.files[0]"
                                    @change="mysc_logoshowImage($event)"
                                    accept="image/*"
                                    id="dropzone-file"
                                    type="file"
                                    class="hidden"
                                />
                            </label>
                            <div v-if="errors.logo" class="text-red-500">
                                {{ errors.logo }}
                            </div>
                        </div>
                        <!-- <label
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input"
                            >Logo</label
                        >
                        <input
                            
                            class="block w-5/6 h-9 border rounded-xl cursor-pointer file:h-full file:rounded-l-sm file:border-0 file:mr-1.5"
                            id="file_input"
                            type="file"
                        /> -->

                        <!-- Fav Icon -->
                        <div class="ml-10 my-5 sm:w-full sm:ml-4">
                            <label
                                for="favicon"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Favicon</label
                            >
                            <label
                                for="favicon"
                                class="flex flex-col items-center justify-center w-5/6 h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                            >
                                <div
                                    class="flex flex-col items-center justify-center pt-5 pb-6"
                                >
                                    <svg
                                        aria-hidden="true"
                                        class="w-10 h-10 mb-3 text-gray-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                                        ></path>
                                    </svg>
                                    <p
                                        class="mb-2 text-sm text-gray-500 dark:text-gray-400"
                                    >
                                        <span class="font-semibold"
                                            >Click to upload</span
                                        >
                                    </p>
                                    <p
                                        class="text-xs text-gray-500 dark:text-gray-400"
                                    >
                                        SVG, PNG, JPG or GIF (MAX. 800x400px)
                                    </p>
                                </div>
                                <input
                                    @input="
                                        form.favicon = $event.target.files[0]
                                    "
                                    id="favicon"
                                    type="file"
                                    class="hidden"
                                />
                            </label>

                            <!-- <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input"
                                    >Fav Icon</label
                                >
                                <input
                                    
                                    class="block w-5/6 h-9 border rounded-xl cursor-pointer file:h-full file:rounded-l-sm file:border-0 file:mr-1.5"
                                    id="file_input"
                                    type="file"
                                /> -->
                            <div v-if="errors.favicon" class="text-red-500">
                                {{ errors.favicon }}
                            </div>
                        </div>
                        <!-- Site Name -->
                        <div class="ml-10 my-5 sm:w-full sm:ml-4">
                            <label
                                for="Site_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Site Name</label
                            >
                            <input
                                v-model="form.sitename"
                                type="text"
                                id="Site_name"
                                class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground"
                                placeholder=""
                            />
                            <div v-if="errors.sitename" class="text-red-500">
                                {{ errors.sitename }}
                            </div>
                        </div>
                    </div>
                    <div class="cl2 my-5 ml-8">
                        <!-- FaceBook -->
                        <div class="ml-10 my-5 sm:w-full sm:ml-4">
                            <label
                                for="facebook"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Facebook</label
                            >
                            <input
                                v-model="form.facebook"
                                type="text"
                                id="facebook"
                                class="focus:ring-white focus:border-white border-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2 text-white"
                                placeholder=""
                            />
                            <div v-if="errors.facebook" class="text-red-500">
                                {{ errors.facebook }}
                            </div>
                        </div>
                        <!-- Messenger -->
                        <div class="ml-10 my-5 sm:w-full sm:ml-4">
                            <label
                                for="Messenger"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Messenger</label
                            >
                            <input
                                v-model="form.messenger"
                                type="text"
                                id="Messenger"
                                class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2"
                                placeholder=""
                            />
                            <div v-if="errors.messenger" class="text-red-500">
                                {{ errors.messenger }}
                            </div>
                        </div>
                        <!-- YouTube1 -->
                        <div class="ml-10 my-5 sm:w-full sm:ml-4">
                            <label
                                for="youtube1"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >YouTube 1</label
                            >
                            <input
                                v-model="form.youtube1"
                                type="text"
                                id="youtube1"
                                class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2"
                                placeholder=""
                            />
                            <div v-if="errors.youtube1" class="text-red-500">
                                {{ errors.youtube1 }}
                            </div>
                        </div>
                        <!-- Youtube2 -->
                        <div class="ml-10 my-5 sm:w-full sm:ml-4">
                            <label
                                for="youtube3"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >YouTube 2</label
                            >
                            <input
                                v-model="form.youtube2"
                                type="text"
                                id="youtube3"
                                class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2"
                                placeholder=""
                            />
                            <div v-if="errors.youtube2" class="text-red-500">
                                {{ errors.youtube2 }}
                            </div>
                        </div>
                        <!-- Youtube3 -->
                        <div class="ml-10 my-5 sm:w-full sm:ml-4">
                            <label
                                for="youtube3"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >YouTube 3</label
                            >
                            <input
                                v-model="form.youtube3"
                                type="text"
                                id="youtube3"
                                class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2"
                                placeholder=""
                            />
                            <div v-if="errors.youtube3" class="text-red-500">
                                {{ errors.youtube3 }}
                            </div>
                        </div>

                        <!-- cl2end -->
                    </div>

                    <!-- White Line -->
                    <div
                        class="absolute left-1/2 sm:w-0 md:w-0.5 h-4/6 bg-white"
                    ></div>

                    <!-- Site Name -->
                </div>

                <button
                    type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm o px-5 py-2.5 text-center m-5 flex float-right"
                >
                    <img
                        class="w-5 h-5 mr-2"
                        src="../../../public/img/save.png"
                        alt=""
                    />Save
                </button>
            </form>
        </div>

        <!-- Public -->
        <div
            class="w-11/12 h-auto bg-elementBackground text-white tab-pannel-2 rounded-b-xl"
            id="tab-pannel-2"
            v-bind:class="{ hidden: openTab !== 2, block: openTab === 2 }"
        >
            <form
                class="mt-6"
                @submit.prevent="submit_public"
                enctype="multipart/form-data"
            >
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <!-- LOGO -->
                    <div class="ml-10 sm:w-full sm:ml-4">
                        <label
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input"
                            >Logo</label
                        >
                        <input
                            @input="form_public.logos = $event.target.files[0]"
                            class="block w-5/6 h-9 border rounded-xl cursor-pointer file:h-full file:rounded-l-sm file:border-0 file:mr-1.5"
                            id="file_input"
                            type="file"
                        />
                        <div v-if="errors.logos" class="text-red-500">
                            {{ errors.logos }}
                        </div>
                    </div>
                    <!-- FaceBook -->
                    <div class="ml-10 sm:w-full sm:ml-4">
                        <label
                            for="facebook"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Facebook</label
                        >
                        <input
                            v-model="form_public.facebook"
                            type="text"
                            id="facebook_p"
                            class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2"
                            placeholder=""
                        />
                        <div v-if="errors.facebook" class="text-red-500">
                            {{ errors.facebook }}
                        </div>
                    </div>
                    <!-- Fav Icon -->
                    <div class="ml-10 sm:w-full sm:ml-4">
                        <label
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input"
                            >Fav Icon</label
                        >
                        <input
                            @input="
                                form_public.favicons = $event.target.files[0]
                            "
                            class="block w-5/6 h-9 border rounded-xl cursor-pointer file:h-full file:rounded-l-sm file:border-0 file:mr-1.5"
                            id="file_input"
                            type="file"
                        />
                        <div v-if="errors.favicons" class="text-red-500">
                            {{ errors.favicons }}
                        </div>
                    </div>
                    <div
                        class="absolute left-1/2 sm:w-0 md:w-0.5 h-3/6 bg-white"
                    ></div>
                    <!-- YouTube1 -->
                    <div class="ml-10 sm:w-full sm:ml-4">
                        <label
                            for="youtube1"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >YouTube 1</label
                        >
                        <input
                            v-model="form_public.youtube1"
                            type="text"
                            id="youtube1_p"
                            class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2"
                            placeholder=""
                        />
                        <div v-if="errors.youtube1" class="text-red-500">
                            {{ errors.youtube1 }}
                        </div>
                    </div>

                    <!-- Site Name -->
                    <div class="ml-10 sm:w-full sm:ml-4">
                        <label
                            for="sitenames"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Site Name</label
                        >
                        <input
                            v-model="form_public.sitenames"
                            type="text"
                            id="sitenames"
                            class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground"
                            placeholder=""
                        />
                        <div v-if="errors.sitenames" class="text-red-500">
                            {{ errors.sitenames }}
                        </div>
                    </div>
                    <!-- Youtube2 -->
                    <div class="ml-10 sm:w-full sm:ml-4">
                        <label
                            for="youtube2_p"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >YouTube 2</label
                        >
                        <input
                            v-model="form_public.youtube2"
                            type="text"
                            id="youtube2_p"
                            class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2"
                            placeholder=""
                        />
                        <div v-if="errors.youtube2" class="text-red-500">
                            {{ errors.youtube2 }}
                        </div>
                    </div>
                    <!-- Phone No -->
                    <div class="ml-10 sm:w-full sm:ml-4">
                        <label
                            for="phone_p"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Phone No</label
                        >
                        <input
                            v-model="form_public.phone"
                            type="text"
                            id="phone_p"
                            class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground"
                            placeholder=""
                        />
                        <div v-if="errors.phone" class="text-red-500">
                            {{ errors.phone }}
                        </div>
                    </div>
                    <div></div>
                    <!-- Copy Right -->
                    <div class="ml-10 sm:w-full sm:ml-4">
                        <label
                            for="copyright_p"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Copy Right</label
                        >
                        <input
                            v-model="form_public.copyright"
                            type="text"
                            id="copyright_p"
                            class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground"
                            placeholder=""
                        />
                        <div v-if="errors.copyright" class="text-red-500">
                            {{ errors.copyright }}
                        </div>
                    </div>
                </div>

                <button
                    type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center m-5 flex float-right"
                >
                    <img
                        class="w-5 h-5 mr-2"
                        src="../../../public/img/save.png"
                        alt=""
                    />Save
                </button>
            </form>
        </div>
    </div>
</template>
