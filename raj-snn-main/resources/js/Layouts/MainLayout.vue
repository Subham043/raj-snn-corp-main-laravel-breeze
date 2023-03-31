<script setup>
import { reactive } from 'vue';
import Header from '@/Components/DashboardNavigation/Header.vue';
import Menu from '@/Components/DashboardNavigation/Menu.vue';
import Footer from '@/Components/DashboardNavigation/Footer.vue';

const state = reactive({
    openDrawer: false
})

function drawerHandler() {
    state.openDrawer = !state.openDrawer
}
</script>

<template>
    <div id="layout-wrapper">

        <Header @menu-click="drawerHandler"/>

        <w-drawer
            v-model="state.openDrawer"
            :left="true"
            drawer-class="z-index:1000"
            overlay-opacity="0.7"
            width="260px">
            <Menu @menu-click="drawerHandler" />
        </w-drawer>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <slot />
                </div>
            </div>

            <Footer />

        </div>
        <!-- end main content-->

    </div>
</template>
