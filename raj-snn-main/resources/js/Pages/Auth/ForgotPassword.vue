<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import PrimaryButton from '@/Components/Form/PrimaryButton.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthHeader from '@/Components/AuthHeader.vue';

defineProps({
    status: {
        type: String,
    },
});

defineOptions({ layout: GuestLayout })

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>

    <Head title="Forgot Password" />

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <AuthHeader
                        heading="Forgot Password?"
                        sub_heading="Reset password with SNN RAJ CORP"
                        :status="status"
                    />

                    <div class="alert alert-borderless alert-warning text-center mb-2 mx-2" role="alert">
                        Just let us know your email address and we will email you a password reset
                        link that will allow you to choose a new one.
                    </div>
                    <div class="p-2">
                        <form  @submit.prevent="submit">
                            <div class="mb-4">
                                <InputLabel for="email" value="Email" />

                                <TextInput id="email" type="email" v-model="form.email" required autofocus
                                    autocomplete="username" />

                                <InputError :message="form.errors.email" />
                            </div>

                            <div class="text-center mt-4">
                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Email Password Reset Link
                                </PrimaryButton>
                            </div>
                        </form><!-- end form -->
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="mt-4 text-center">
                <p class="mb-0">Wait, I remember my password... <Link :href="route('login')" class="fw-semibold text-primary text-decoration-underline"
                        > Click here </Link> </p>
            </div>

        </div>
    </div>
</template>
