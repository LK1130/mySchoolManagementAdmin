<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import NavBar from "/resources/js/Components/NavBar.vue";
import Header from "/resources/js/Components/Header.vue";
import ClassTable from "/resources/js/Components/ClassTable.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";

const props = defineProps({
    instructors: {
        type: Object,
    },

    checked: {
        type: Array,
    },
});

let selectedItems = [];
let collapseItem = ref(true);
/**
 * Check for user choice
//  */
//
console.log(props.instructors);
const checkboxs = () =>
    (selectedItems = props.checked == "" ? ref([1, 2, 3]) : ref(props.checked));

const filter = () =>
    Inertia.get(route("instructor.index", selectedItems.value.join(",")));

checkboxs();
const collapse = (id) => {
    collapseItem.value = id;
};
</script>

<template>
    <!-------------------- Navbar&header -------------------->
    <NavBar />
    <Header headername="Class" />
    <!---------------- body ----------------------->
    <div class="absolute h-full w-5/6 p-3 headercustomleft top-32 customblack">
        <div
            class="text-white sm:text-sm text-xs popfont flex justify-between px-4"
        >
            <div>
                <span>
                    <input
                        type="checkbox"
                        class="css-checkbox"
                        id="checkbox1"
                        checked="checked"
                        v-on:change="filter"
                        v-model="selectedItems"
                        value="1"
                    />
                    <label
                        for="checkbox1"
                        class="css-label lite-gray-check sm:text-base text-xs"
                        >Japanese</label
                    >
                </span>
                <span class="sm:ml-3 ml-0 sm:mt-0 mt-2">
                    <input
                        type="checkbox"
                        class="css-checkbox"
                        id="checkbox2"
                        checked="checked"
                        v-on:change="filter"
                        v-model="selectedItems"
                        value="2"
                    />
                    <label
                        for="checkbox2"
                        class="css-label lite-gray-check sm:text-base text-xs"
                        >Web Development</label
                    >
                </span>
                <br class="sm:hidden block" />
                <span class="sm:ml-3 ml-0 sm:mt-0 mt-2">
                    <input
                        type="checkbox"
                        class="css-checkbox"
                        id="checkbox3"
                        checked="checked"
                        v-on:change="filter"
                        v-model="selectedItems"
                        value="3"
                    />
                    <label
                        for="checkbox3"
                        class="css-label lite-gray-check sm:text-base text-xs"
                        >Java</label
                    >
                </span>
            </div>

            <div class="dopd">
                <select
                    id="sorttype"
                    name="status"
                    class="bg-black text-white border-white rounded-xl customfontsize1"
                >
                    <option value="status" class="customfontsize1">
                        By status
                    </option>
                    <option value="name" class="customfontsize1">
                        By Name
                    </option>
                    <option value="person" class="customfontsize1">
                        By Person
                    </option>
                </select>
            </div>
        </div>
        <div class="px-4 my-6">
            <table class="w-full rounded-lg tableColor">
                <tr class="text-white pt-4">
                    <td class="customfontsize1 text-start pl-7 pt-4">Name</td>
                    <td class="customfontsize1 pt-4">Classes</td>
                    <td class="customfontsize1 pt-4">Total Student</td>
                    <td class="customfontsize1 pt-4">Contact</td>
                    <td class="customfontsize1 pt-4">Address</td>
                    <td class="customfontsize1 pt-4">Setting</td>
                </tr>
                <tbody class="text-sm customfontsize text-white">
                    <tr
                        class="cusborder"
                        v-for="instructor in instructors.data"
                        :key="instructor.instructor_id"
                    >
                        <td class="customfontsize1 text-start pl-7 pt-4">
                            {{ instructor.i_name }}
                        </td>
                        <td class="customfontsize1 pt-4">
                            {{ instructor.classes }}
                        </td>
                        <td class="customfontsize1 pt-4">
                            {{ instructor.students }}
                        </td>
                        <td class="customfontsize1 pt-4">
                            {{ instructor.i_contact }}
                        </td>
                        <td class="customfontsize1 pt-4">
                            {{ instructor.i_address }}
                        </td>
                        <td
                            class="customfontsize1 pt-4 customtextcolor7 underline"
                        >
                            <a
                                :href="
                                    route(
                                        'instructors.show',
                                        instructor.instructor_id
                                    )
                                "
                                >Edit</a
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
            <button
                class="addButton items-center pt-0.5 w-2/12 relative mt-8 content-end h-8 text-white rounded-lg flex justify-center bg-blue-600 hover:bg-blue-700 active:bg-blue-900 cusmargin"
            >
                <a :href="route('instructors.create')" class="w-80">
                    Add Instructor
                </a>
            </button>
        </div>
    </div>
</template>
<style scoped>
.customalign {
    margin-bottom: 1.3em;
}
.addButton {
    left: 65vw;
}
.popfont {
    font-family: poppins !important;
}
.cusborder {
    border-style: solid;
    border-bottom-width: 0.13em;
    border-color: rgba(255, 255, 255, 0.2);
}
.cusmargin {
    margin-bottom: 5.63em;
}
.beforecolor {
    color: #ffc652;
}
.tableColor {
    background-color: #2b2b2b;
}
.livecolor {
    color: #33a02c;
}
.aftercolor {
    color: #ff6551;
}
@media screen and (max-width: 640px) {
    .customfontsize {
        font-size: 0.4em !important;
    }
    .customfontsize1 {
        font-size: 0.9em !important;
    }
}
</style>
