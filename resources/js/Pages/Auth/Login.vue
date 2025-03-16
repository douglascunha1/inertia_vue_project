<script setup>
import { useForm } from "@inertiajs/vue3";
import TextInput from "../Components/TextInput.vue";

// Create a form object with the fields we need
const form = useForm({
    email: null,
    password: null,
    remember: null,
});

const submit = () => {
    // Call the register route with the form data
    form.post(route("login"), {
        onError: () => form.reset("password", "remember"),
    });
};
</script>

<template>
    <Head title="Login" />

    <h1 class="title">Login to your account</h1>
    <div class="w-2/4 mx-auto">
        <!-- Call the submit function when the form is submitted -->
        <form @submit.prevent="submit">
            <TextInput
                name="email"
                v-model="form.email"
                :message="form.errors.email"
            />
            <TextInput
                name="password"
                type="password"
                v-model="form.password"
                :message="form.errors.password"
            />

            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center gap-2">
                    <input
                        type="checkbox"
                        v-model="form.remember"
                        id="remember"
                    />
                    <label for="remember"> Remember me </label>
                </div>
                <p class="text-slate-600">
                    Need an account?
                    <a :href="route('register')" class="text-link">Register</a>
                </p>
            </div>

            <div>
                <button class="primary-btn" :disabled="form.processing">
                    Login
                </button>
            </div>
        </form>
    </div>
</template>
<script setup lang="ts"></script>
