<script setup>
import { router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import debounce from 'lodash/debounce';

const props = defineProps({
    link: {
        type: String,
        required: true
    },
    filter: {
        type: String || null,
        default: ''
    },
});

const search = ref(props?.filter);

watch(search, debounce(function (value) {
    router.get(props.link, {'filter[title]': value}, {preserveState: true, replace: true});
}, 300))

</script>

<template>
    <form  method="get">
        <div class="d-flex justify-content-sm-end">
            <div class="search-box ms-2">
                <input type="text" name="search" v-model="search" class="form-control search" placeholder="Search...">
                <i class="ri-search-line search-icon"></i>
            </div>
        </div>
    </form>
</template>
