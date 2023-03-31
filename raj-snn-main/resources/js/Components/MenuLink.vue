<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
        required: false,
        default: false
    },
    name: {
        type: String,
        required: true,
    },
    icon: {
        type: String,
        required: true,
    },
});

const classes = computed(() =>
    props.active
        ? 'nav-link menu-link active'
        : 'nav-link menu-link'
);
</script>

<template>
    <li class="nav-item">
        <Link :href="href" :class="classes">
            <i :class="icon"></i>
            <span data-key="t-widgets">{{ name }}</span>
        </Link>
    </li>
</template>
