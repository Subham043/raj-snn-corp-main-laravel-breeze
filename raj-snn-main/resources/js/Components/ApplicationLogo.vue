<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    height: {
        type: String,
    },
});
</script>

<template>
    <Link :href="route('profile.edit')" class="logo logo-dark">
        <span class="logo-lg">
            <img src="/admin/images/logo.png" alt="" :height="height">
        </span>
    </Link>
</template>
