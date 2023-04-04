<template>
    <button
        v-if="type"
        class="btn btn-sm btn-primary"
    >
        <slot />
    </button>
    <Link
        v-else
        :href="href"
        class="btn btn-sm btn-primary"
    >
        <slot />
    </Link>
</template>

<script setup>

import { Link } from '@inertiajs/vue3';

    defineProps({
        type: {
            type: Boolean,
            default: true
        },
        href: {
            type: String,
            default: 'button'
        }
    });

</script>
