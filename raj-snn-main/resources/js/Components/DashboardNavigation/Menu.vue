<template>
    <div>

        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu" @click="$emit('menu-click')">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <ApplicationLogo height="80" />
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu"></div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <MenuLink :href="route('profile.edit')" name="Enquiries" icon="ri-message-fill" />
                        <MenuLink :href="route('profile.edit')" name="Projects" icon="ri-building-fill" />
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from '../ApplicationLogo.vue';
import MenuLink from '../MenuLink.vue';


</script>
