<script setup>
import { ref, reactive } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
import Header from '@/Components/Navigation/Header.vue';
import Menu from '@/Components/Navigation/Menu.vue';
import Footer from '@/Components/Navigation/Footer.vue';

const showingNavigationDropdown = ref(false);
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
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Home</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <slot />
                </div>
            </div>

            <Footer />

        </div>
        <!-- end main content-->

    </div>
</template>
