<script setup>
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import PrimaryButton from '@/Components/Form/PrimaryButton.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import { useForm, usePage } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user.data;

const form = useForm({
    name: user.name,
    email: user.email,
});
</script>

<template>
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Profile Information</h4>
        </div><!-- end card header -->

        <form @submit.prevent="form.patch(route('profile.update'))">
            <div class="card-body">
                <div class="live-preview">
                    <div class="row gy-4">
                        <div class="col-xxl-6 col-md-6">
                            <InputLabel for="name" value="Name" />

                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                required
                                autofocus
                                autocomplete="name"
                            />

                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>
                        <div class="col-xxl-6 col-md-6">
                            <InputLabel for="email" value="Email" />

                            <TextInput
                                id="email"
                                type="email"
                                class="mt-1 block w-full"
                                v-model="form.email"
                                required
                                autocomplete="username"
                            />

                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div class="col-xxl-2 col-lg-2 col-md-4 col-sm-12">
                            <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
                        </div>
                        <div class="col-xxl-12 col-md-12">
                            <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                            </Transition>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
