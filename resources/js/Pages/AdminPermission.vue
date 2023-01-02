<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import Pagination from "../Components/Pagination.vue";
import Notisuccess from "../Components/Notisuccuss.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    role_page: {
        type: Object,
    },
    pages: {
        type: Object,
    },
});

// console.log(props.role_page)

const form = useForm({
    lists: null,
});

let checkList = [];

const pushToCheckList = (roleId, pageId) => {
    checkList.push({ roleId, pageId });
};

for (let i = 0; i < props.role_page.length; i++) {
    for (let j = 0; j < props.pages.length; j++) {
        if (
            props.role_page[i].page.find((Obj) => Obj.id === props.pages[j].id)
        ) {
            pushToCheckList(props.role_page[i].id, props.pages[j].id);
        }
    }
}

const checkpage = (roleid, pageid) => {
    if (
        checkList.find(
            ({ roleId, pageId }) => roleId == roleid && pageId == pageid
        ) == undefined
    ) {
        checkList.push({
            roleId: roleid,
            pageId: pageid,
        });
        // console.log(checkList);
    } else {
        const indexOfObject = checkList.findIndex((object) => {
            return object.roleId == roleid && object.pageId == pageid;
        });

        checkList.splice(indexOfObject, 1);

        // console.log(checkList);
    }
};

const submit = () => {
    Inertia.post(route("adminPermission.store"), form, {
        onError: (data) => {
            console.log(data);
        },
        onSuccess: (data) => {
            showNoti.value = true;

            setTimeout(() => {
                showNoti.value = false;
            }, 2000);
        },
    });
};

let showNoti = ref(false);

form.lists = checkList;
</script>

<template>
    <NavBar />
    <Header headername="Admin Permission" />

    <div class="absolute h-auto w-5/6 p-5 headercustomleft top-32 customblack">
        <div class="absolute right-0 z-10">
            <Notisuccess v-if="showNoti" />
        </div>

        <form @submit.prevent="submit">
            <div
                class="w-full h-auto p-8 relative bg-secondaryBackground rounded-xl flex flex-col space-y-5"
            >
                <div
                    class="w-full flex flex-start border border-white rounded-md overflow-hidden"
                    v-for="role in props.role_page"
                    :key="role.id"
                    :id="role.id"
                >
                    <div
                        class="flex items-center justify-center border-r border-white py-5 w-56"
                    >
                        <p class="text-white text-xl">
                            {{ role.r_name }}
                        </p>
                    </div>

                    <div class="flex items-center overflow-x-auto py-2">
                        <div
                            class="flex items-center px-7 py-2"
                            v-for="page in props.pages"
                            :key="page"
                        >
                            <div class="flex flex-col items-center mx-5">
                                <p class="text-white whitespace-nowrap">{{ page.p_name }}</p>
                                <input
                                    type="checkbox"
                                    name="role.id[]"
                                    class="mt-1"
                                    checked
                                    v-if="
                                        role.page.find(
                                            (obj) => obj.id === page.id
                                        )
                                    "
                                    @click="checkpage(role.id, page.id)"
                                />
                                <input
                                    type="checkbox"
                                    @click="checkpage(role.id, page.id)"
                                    class="mt-1"
                                    v-else
                                    :id="page.id"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="flex justify-center items-center my-10">
                    <Pagination :links="role_page.links"> </Pagination>
                </div> -->

                <div class="flex justify-between mt-5">
                    <div class="flex space-x-5">
                        <Link
                            href="/pageList"
                            class="py-2 px-5 text-whiteTextColor text-sm bg-blueTextColor rounded-xl flex items-center"
                        >
                            <!-- <img
                                src="../../../public/img/plus.png"
                                alt=""
                                class="w-5 h-5 pt-0.5"
                            /> -->
                            <span class="mx-2">Page List</span>
                        </Link>
                        <Link
                            href="/addRole"
                            class="py-2 px-5 text-whiteTextColor text-sm bg-blueTextColor rounded-xl flex items-center"
                        >
                            <img
                                src="../../../public/img/plus.png"
                                alt=""
                                class="w-5 h-5 pt-0.5"
                            />
                            <span class="mx-2">Add Role</span>
                        </Link>
                    </div>
                    <button
                        type="submit"
                        class="py-2 px-5 text-whiteTextColor text-sm bg-blueTextColor rounded-xl flex items-center"
                    >
                        <img
                            src="../../../public/img/save.png"
                            alt=""
                            class="w-5 h-5 pt-0.5"
                        />
                        <span class="mx-2">Save</span>
                    </button>
                </div>
            </div>
        </form>

        <div class="fixed left-42 bottom-5">
            <button>
                <a
                    href="/adminPermission"
                    class="underline underline-offset-4 hidden md:block text-whiteTextColor"
                    >BACK</a
                >
            </button>
        </div>
    </div>
</template>

<style></style>
