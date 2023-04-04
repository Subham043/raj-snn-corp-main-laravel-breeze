<script setup>
import { Link } from '@inertiajs/vue3';


const props = defineProps({
    pagination: {
        type: Array,
        default: []
    },
});

</script>

<template>
   <div class="d-flex justify-content-end" v-if="pagination.length > 3">
        <div class="pagination-wrap hstack gap-2">
            <ul class="pagination listjs-pagination mb-0">
                <li v-for="(item, index) in pagination" :key="index" :class="`page-item ${item.active ? 'active' : ''}`">
                    <Link v-if="item.url" class="page" :href="item.url" v-html="item.label"/>
                    <span v-else v-html="item.label" :class="`page ${item.url ? '' : 'disabled'}`" />
                </li>
            </ul>
        </div>
    </div>
</template>

<style scoped>
.disabled{
    background-color: #eee !important;
}
</style>
