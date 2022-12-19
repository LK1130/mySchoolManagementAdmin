<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Inertia } from "@inertiajs/inertia";

const loginform = useForm({
    _method : "POST",
    email: "",
    password: "",
});

const props = defineProps({
     errors: {
        type: Object,
    },
    categories: {
        type: Object,
        }

})

const submit = ()=>{
Inertia.post(route("login.store", loginform), {
        onError: (data) => {
            console.log(data);
            // inputField.value.focus();
        },
        onSuccess: (data) => {
            console.log(data);
        },
    });
}
</script>

<template>
    <Head title="Log in" />

    <AuthenticationCard>
        <div class="mb-4 font-medium text-sm text-green-600"></div>

        <form @submit.prevent="submit">
            <div class="flex-col justify-center items-center">
                <!-- <InputLabel for="email" value="Email" /> -->
                <TextInput
                    v-model="loginform.email"
                    type="email"
                    class="shadow-md rounded-lg mt-4 block md:w-64 w-80 ring-1 ring-white focus:ring-gray-300"
                    placeholder="Email"
                    required
                    autofocus
                />
                <div v-if="errors.email" class="text-red-500 mt-2">
                            {{ errors.email }}
                        </div>

                <div class="mt-4">
                    <!-- <InputLabel for="password" value="Password" /> -->
                    <TextInput
                        v-model="loginform.password"
                        id="password"
                        type="password"
                        class="mt-5 block shadow-md rounded-lg md:w-64 w-80 ring-1 ring-white focus:ring-gray-300"
                        placeholder="Password"
                        required
                        autocomplete="current-password"
                    />
                    <div v-if="$page.props.flash.pmessage" class="text-red-500 mt-2">
                            {{ $page.props.flash.pmessage }}
                        </div>
                </div>
            </div>

            <div class="block mt-5">
                <PrimaryButton
                    class="w-80 md:w-64 bg-whiteTextColor md:text-whiteTextColor md:bg-blue-700 rounded-lg shadow-lg text-primaryBackground text-center"
                >
                    Login
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>

<style></style>
