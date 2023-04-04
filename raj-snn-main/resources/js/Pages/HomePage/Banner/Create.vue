<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import BreadCrumb from '@/Components/BreadCrumb.vue';
import Form from './Partials/Form.vue';

defineOptions({ layout: MainLayout })

const form = useForm({
    title: '',
    sub_title: '',
    image: null,
});

const SubmitForm = () => {
    form.post(route('banner.store'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            $waveui.notify({
                message: 'Created Successfully.',
                timeout: 3000, // ms.
            })
        },
    })
}

const imageHandler = (img) => {
    form.image = img;
}

</script>

<template>
    <Head title="Banner" />
    <BreadCrumb page="Banner" />
    <div class="row mt-5">
        <div class="col-xxl-12">
            <Form @submit-handler="SubmitForm" @image-handler="imageHandler" :form="form" />
        </div>
    </div>
</template>
