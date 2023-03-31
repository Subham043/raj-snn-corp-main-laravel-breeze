<script setup>
import { Link } from '@inertiajs/vue3';


const props = defineProps({
    page: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><Link :href="route('dashboard')">Dashboard</Link></li>
                        <li class="breadcrumb-item active">{{ page }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
</template>
