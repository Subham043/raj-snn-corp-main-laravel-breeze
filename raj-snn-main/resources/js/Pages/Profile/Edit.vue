<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import BreadCrumb from '@/Components/BreadCrumb.vue';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

defineOptions({ layout: MainLayout })
</script>

<template>
    <Head title="Profile" />
    <BreadCrumb page="Profile" />
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="/admin/images/logo.png" class="profile-wid-img" alt="">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-xxl-12">
            <UpdateProfileInformationForm
                :must-verify-email="mustVerifyEmail"
                :status="status"
            />
        </div>
        <div class="col-xxl-12 mt-2">
            <UpdatePasswordForm />
        </div>
    </div>
</template>
