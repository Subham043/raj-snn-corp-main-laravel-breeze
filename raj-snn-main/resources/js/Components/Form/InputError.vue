<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div v-show="message">
        <p class="invalid-message">
            {{ message }}
        </p>
    </div>
</template>
