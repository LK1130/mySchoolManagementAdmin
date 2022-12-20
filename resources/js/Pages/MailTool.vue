<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Toolsbar from "../Components/Toolsbar.vue";
import Pagination from "../Components/Pagination.vue";
import { DOMDirectiveTransforms } from "@vue/compiler-dom";
import moment from "moment";

const props = defineProps({
    mails: {
        type: Object,
    },
});
</script>

<template>
    <NavBar />
    <Header headername="Tools" />

    <div class="absolute h-auto w-5/6 p-5 headercustomleft top-32 customblack">
        <Toolsbar active="1" />

        <div
            class="w-full h-auto p-8 relative bg-secondaryBackground rounded-b-xl flex flex-col items-center"
        >
            <!-- Table Section -->
            <div class="p-4 w-full rounded-xl">
                <table class="text-white w-full rounded-lg">
                    <tr class="opacity-70 customfontsize">
                        <th class="text-center py-4">TITLE</th>
                        <th class="py-4">DESCRIPTION</th>
                        <th class="py-4">DATE</th>
                        <th class="py-4">CATEGORY</th>
                    </tr>
                    <tbody class="text-sm mt-3">
                        <tr
                            class="border-b"
                            v-for="result in props.mails.data"
                            :key="result"
                        >
                            <!-- <td>{{ result.p_title }}</td> -->
                            <td class="text-left py-4">{{ result.m_title }}</td>
                            <td class="text-center py-4">
                                {{
                                    result.m_description.substring(0, 20) +
                                    "..."
                                }}
                            </td>
                            <td class="text-center py-4">
                                {{ moment(result.created_at).calendar() }}
                            </td>
                            <td
                                v-if="result.m_category == 1"
                                class="text-center py-4 text-blueTextColor"
                            >
                                Info
                            </td>
                            <td
                                v-else-if="result.m_category == 2"
                                class="text-center py-4 text-yellowTextColor"
                            >
                                Direct Message
                            </td>
                            <td
                                v-else-if="result.m_category == 3"
                                class="text-center py-4 text-tertiaryBackground"
                            >
                                Alert
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="flex justify-center items-center my-10">
                    <Pagination class="z-10" :links="mails.links"> </Pagination>
                </div>
            </div>

            <div
                class="flex flex-col mt-10 md:flex-row w-full px-5 items-center justify-center text-white"
            >
                <div
                    class="absolute text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 mr-2 mb-2 bottom-5 right-3 focus:outline-none"
                >
                    <Link
                        :href="route('mailTool.create')"
                        class="flex flex-row justify-center items-center space-x-3"
                    >
                        <img
                            src="../../../public/img/addlogo.png"
                            alt=""
                            class="w-5 h-5 pt-0.5"
                        />

                        <button type="button">
                            <span>Send</span>
                        </button>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>
