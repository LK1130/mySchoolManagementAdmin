<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import NavBar from "/resources/js/Components/NavBar.vue";
import Header from "/resources/js/Components/Header.vue";
import ClassTable from "/resources/js/Components/ClassTable.vue";

// const props = defineProps({
//     messages: {
//         type: Object,
//     },
//     checked: {
//         type: Array,
//     },
// });

let selectedItems = [];

const filter = (e) => {
    const files = e.target.checked;
    selectedItems.push(files);
    console.log(selectedItems);
};
// let collapseItem = ref(true);

/**
 * Check for user choice
//  */
// const checkboxs = () =>
//     (selectedItems =
//         props.checked[0] == "" ? ref([1, 2, 3]) : ref(props.checked));

// const filter = () =>
//     Inertia.get(
//         route("instructor.checkChecked", selectedItems.value.join(","))
//     );

// checkboxs();
// const collapse = (id) => {
//     collapseItem.value = id;
// };
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
    </div>
</template>
<style scoped>
.customalign {
    margin-bottom: 1.3em;
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
