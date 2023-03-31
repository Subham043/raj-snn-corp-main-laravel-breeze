<script setup>
import { computed } from 'vue';

const current_year = computed(() => new Date().getFullYear());
</script>

<template>
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    {{current_year}} © Raj SNN Corp.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Raj SNN Corp
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>
