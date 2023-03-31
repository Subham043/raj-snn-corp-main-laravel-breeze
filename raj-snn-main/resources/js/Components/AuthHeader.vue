<script setup>

const props = defineProps({
    heading: {
        type: String,
        required: true,
    },
    sub_heading: {
        type: String,
        required: true,
    },
    status: {
        type: String||null,
        required: false,
        default: null
    },
});
</script>

<template>
    <div class="text-center mt-2">
        <h5 class="text-primary">{{ heading }}</h5>
        <p class="text-muted">{{ sub_heading }}</p>
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
    </div>
</template>
