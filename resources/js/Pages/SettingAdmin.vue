<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Pagination from "../Components/Pagination.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";


const props = defineProps({
    mysch:Object,
    public:Object,
    errors:{
        type:Object
    }
})
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
const submit_mysc = () => {
    Inertia.post("setting/upload", form, {
        onError: (data) => {
            console.log(data);
            // inputField.value.focus();
        },
        // onSuccess: (data) => {
        //     form.username = "";
        //     form.email = "";
        //     form.message = "";
        //     success.value = "We Received Your Message!"
        // },
    });
};

const form_public = useForm({
    logo_p: null,
    favicon_p:null,
        sitename_p:props.public[0].sitename,
    facebook_p:props.public[0].facebook_link,
    youtube1_p:props.public[0].youtube_link1,
    youtube2_p:props.public[0].youtube_link2,
    messenger_p:props.public[0].messanger_link1,
    copyright_p:props.public[0].copyright,
    phone_p:props.public[0].phones,
});
const submit_public = () => {
    Inertia.post("setting/upload_public", form_public, {
        onError: (data) => {
            console.log(data);
            // inputField.value.focus();
        },
    });
    // console.log(form_public);
};

// TabChange
let openTab = ref(1);
</script>

<template>
    <!-------------------- Navbar&header -------------------->
    <NavBar />
    <Header headername="Settings" />

    <div
        class="absolute top-32 headercustomleft w-5/6 h-full bg-primaryBackground items-center flex flex-col"
    >
        <div
            class="flex items-center w-11/12 mt-10 bg-primaryBackground flex-row justify-center"
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
                    <div class="ml-10 sm:w-full sm:ml-4">
                        <label
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input"
                            >Logo</label
                        >
                        <input
                            @input="form.logo = $event.target.files[0]"
                            class="block w-5/6 h-9 border rounded-xl cursor-pointer file:h-full file:rounded-l-sm file:border-0 file:mr-1.5"
                            id="file_input"
                            type="file"
                        />
                        <div v-if="errors.logo" class="text-red-500"> {{ errors.logo }} </div>
                    </div>
                    <!-- FaceBook -->
                    <div class="ml-10 sm:w-full sm:ml-4">
                        <label
                            for="facebook"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >FaceBook</label
                        >
                        <input
                            v-model="form.facebook"
                            type="text"
                            id="facebook"
                            class="focus:ring-white focus:border-white border-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2 text-white"
                            placeholder=""

                        />
                        <div v-if="errors.facebook" class="text-red-500"> {{ errors.facebook }} </div>
                    </div>
                    <!-- Fav Icon -->
                    <div class="ml-10 sm:w-full sm:ml-4">
                        <label
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input"
                            >Fav Icon</label
                        >
                        <input
                            @input="form.favicon = $event.target.files[0]"
                            class="block w-5/6 h-9 border rounded-xl cursor-pointer file:h-full file:rounded-l-sm file:border-0 file:mr-1.5"
                            id="file_input"
                            type="file"
                        />
                        <div v-if="errors.favicon" class="text-red-500"> {{ errors.favicon }} </div>
                    </div>
                    <!-- White Line -->
                    <div
                        class="absolute left-1/2 sm:w-0 md:w-0.5 h-3/6 bg-white"
                    ></div>
                    <!-- Messenger -->
                    <div class="ml-10 sm:w-full sm:ml-4">
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
                        <div v-if="errors.messenger" class="text-red-500"> {{ errors.messenger }} </div>
                    </div>
                    <!-- Site Name -->
                    <div class="ml-10 sm:w-full sm:ml-4">
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
                        <div v-if="errors.sitename" class="text-red-500"> {{ errors.sitename }} </div>
                    </div>
                    <!-- YouTube1 -->
                    <div class="ml-10 sm:w-full sm:ml-4">
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
                        <div v-if="errors.youtube1" class="text-red-500"> {{ errors.youtube1 }} </div>
                    </div>
                    <div></div>
                    <!-- Youtube2 -->
                    <div class="ml-10 sm:w-full sm:ml-4">
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
                        <div v-if="errors.youtube2" class="text-red-500"> {{ errors.youtube2 }} </div>
                    </div>
                    <div></div>
                    <!-- Youtube3 -->
                    <div class="ml-10 sm:w-full sm:ml-4">
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
                        <div v-if="errors.youtube3" class="text-red-500"> {{ errors.youtube3 }} </div>
                    </div>
                </div>

                <button
                    type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm o px-5 py-2.5 text-center m-5 flex float-right"
                >
                    <img
                        class="w-5 h-5 mr-2"
                        src="../../../public/img/upload.svg"
                        alt=""
                    />
                    Upload
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
                            @input="form_public.logo_p = $event.target.files[0]"
                            class="block w-5/6 h-9 border rounded-xl cursor-pointer file:h-full file:rounded-l-sm file:border-0 file:mr-1.5"
                            id="file_input"
                            type="file"
                        />
                        <div v-if="errors.logo_p" class="text-red-500"> {{ errors.logo_p }} </div>
                    </div>
                    <!-- FaceBook -->
                    <div class="ml-10 sm:w-full sm:ml-4">
                        <label
                            for="facebook"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >FaceBook</label
                        >
                        <input
                           v-model="form_public.facebook_p"
                            type="text"
                            id="facebook_p"
                            class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2"
                            placeholder=""
                        />
                        <div v-if="errors.facebook_p" class="text-red-500"> {{ errors.facebook_p }} </div>
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
                                form_public.favicon_p = $event.target.files[0]
                            "
                            class="block w-5/6 h-9 border rounded-xl cursor-pointer file:h-full file:rounded-l-sm file:border-0 file:mr-1.5"
                            id="file_input"
                            type="file"
                        />
                        <div v-if="errors.favicon_p" class="text-red-500"> {{ errors.favicon_p }} </div>
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
                            v-model="form_public.youtube1_p"
                            type="text"
                            id="youtube1_p"
                            class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2"
                            placeholder=""
                      
                        />
                        <div v-if="errors.youtube1_p" class="text-red-500"> {{ errors.youtube1_p }} </div>
                    </div>

                    <!-- Site Name -->
                    <div class="ml-10 sm:w-full sm:ml-4">
                        <label
                            for="sitename_p"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Site Name</label
                        >
                        <input
                            v-model="form_public.sitename_p"
                            type="text"
                            id="sitename_p"
                            class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground"
                            placeholder=""
                          
                        />
                        <div v-if="errors.sitename_p" class="text-red-500"> {{ errors.sitename_p }} </div>
                    </div>
                    <!-- Youtube2 -->
                    <div class="ml-10 sm:w-full sm:ml-4">
                        <label
                            for="youtube2_p"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >YouTube 2</label
                        >
                        <input
                           v-model="form_public.youtube2_p"
                            type="text"
                            id="youtube2_p"
                            class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground p-2"
                            placeholder=""
                            
                        />
                        <div v-if="errors.youtube2_p" class="text-red-500"> {{ errors.youtube2_p }} </div>
                    </div>
                    <!-- Phone No -->
                    <div class="ml-10 sm:w-full sm:ml-4">
                        <label
                            for="phone_p"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Phone No</label
                        >
                        <input
                            v-model="form_public.phone_p"
                            type="text"
                            id="phone_p"
                            class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground"
                            placeholder=""
                            
                        />
                        <div v-if="errors.phone_p" class="text-red-500"> {{ errors.phone_p }} </div>
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
                            v-model="form_public.copyright_p"
                            type="text"
                            id="copyright_p"
                            class="focus:ring-white focus:border-white border-white text-white text-sm rounded-xl block w-5/6 bg-elementBackground"
                            placeholder=""
                            
                        />
                        <div v-if="errors.copyright_p" class="text-red-500"> {{ errors.copyright_p }} </div>
                    </div>
                </div>

                <button
                    type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center m-5 flex float-right"
                >
                    <img
                        class="w-5 h-5 mr-2"
                        src="../../../public/img/upload.svg"
                        alt=""
                    />Upload
                </button>
            </form>
        </div>
    </div>
</template>
