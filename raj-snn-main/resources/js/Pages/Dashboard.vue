<script setup>
import BreadCrumb from '@/Components/BreadCrumb.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';

defineOptions({ layout: MainLayout })

</script>

<template>
    <Head title="Dashboard" />

    <BreadCrumb page="Home" />

    <div class="row mt-5">

        <!--end col-->
        <div class="col-xxl-12">
            This is dashboard
        </div>
    </div>
</template>
