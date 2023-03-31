<script setup>
import Checkbox from '@/Components/Form/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import PrimaryButton from '@/Components/Form/PrimaryButton.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthHeader from '@/Components/AuthHeader.vue';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

defineOptions({ layout: GuestLayout })

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>

    <Head title="Log in" />


    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <AuthHeader
                        heading="Welcome Back !"
                        sub_heading="Sign in to continue to SNN RAJ CORP Admin Panel."
                    />
                    <div class="p-2 mt-4">
                        <form @submit.prevent="submit">
                            <div class="mb-3">
                                <InputLabel for="email" value="Email" />

                                <TextInput id="email" type="email" v-model="form.email" required autofocus
                                    autocomplete="username" />

                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>

                            <div class="mb-3">
                                <div class="float-end">
                                    <Link :href="route('password.request')" class="text-muted">Forgot password?</Link>
                                </div>
                            </div>

                            <div class="mb-3">
                                <InputLabel for="password" value="Password" />

                                <TextInput id="password" type="password" v-model="form.password" required
                                    autocomplete="current-password" />

                                <InputError class="mt-2" :message="form.errors.password" />
                            </div>

                            <div class="form-check">
                                <Checkbox id="remember" v-model:checked="form.remember" />
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>

                            <div class="mt-4">
                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Log in
                                </PrimaryButton>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

        </div>
    </div>
</template>
