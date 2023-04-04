<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import BreadCrumb from '@/Components/BreadCrumb.vue';
import Form from './Partials/Form.vue';

defineOptions({ layout: MainLayout })

const props = defineProps({
    banner: {
        type: Object,
    },
});

const form = useForm({
    title: props.banner.data.title,
    sub_title: props.banner.data.sub_title,
    image: null,
});

const SubmitForm = () => {
    form.post(route('banner.update', props.banner.data.id), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
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
