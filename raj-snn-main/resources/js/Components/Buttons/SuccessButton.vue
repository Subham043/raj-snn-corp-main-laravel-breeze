<template>
    <button
        v-if="type"
        class="btn btn-md btn-success add-btn" type="button"  id="create-btn" style="background:green;border-color:green;"
    >
        <slot />
    </button>
    <Link
        v-else
        :href="href"
        class="btn btn-md btn-success add-btn" type="button"  id="create-btn" style="background:green;border-color:green;"
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
