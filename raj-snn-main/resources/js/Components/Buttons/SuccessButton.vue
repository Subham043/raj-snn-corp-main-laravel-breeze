<template>
    <button
        v-if="type_button"
        :class="`btn btn-${size} btn-success add-btn`" id="create-btn" style="background:green;border-color:green;"
    >
        <slot />
    </button>
    <Link
        v-else
        :href="href"
        :class="`btn btn-${size} btn-success add-btn`" id="create-btn" style="background:green;border-color:green;"
    >
        <slot />
    </Link>
</template>

<script setup>

import { Link } from '@inertiajs/vue3';

    defineProps({
        type_button: {
            type: Boolean,
            default: true
        },
        href: {
            type: String,
            default: 'button'
        },
        size: {
            type: String,
            default: 'sm'
        }
    });

</script>
