<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Update Password</h4>
        </div><!-- end card header -->

        <form @submit.prevent="updatePassword">
            <div class="card-body">
                <div class="live-preview">
                    <div class="row gy-4">
                        <div class="col-xxl-4 col-md-4">
                            <InputLabel for="current_password" value="Current Password" />

                            <TextInput
                                id="current_password"
                                ref="currentPasswordInput"
                                v-model="form.current_password"
                                type="password"
                                class="mt-1 block w-full"
                                autocomplete="current-password"
                            />

                            <InputError :message="form.errors.current_password" class="mt-2" />
                        </div>
                        <div class="col-xxl-4 col-md-4">
                            <InputLabel for="password" value="New Password" />

                            <TextInput
                                id="password"
                                ref="passwordInput"
                                v-model="form.password"
                                type="password"
                                class="mt-1 block w-full"
                                autocomplete="new-password"
                            />

                            <InputError :message="form.errors.password" class="mt-2" />
                        </div>
                        <div class="col-xxl-4 col-md-4">
                            <InputLabel for="password_confirmation" value="Confirm Password" />

                            <TextInput
                                id="password_confirmation"
                                v-model="form.password_confirmation"
                                type="password"
                                class="mt-1 block w-full"
                                autocomplete="new-password"
                            />

                            <InputError :message="form.errors.password_confirmation" class="mt-2" />
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
