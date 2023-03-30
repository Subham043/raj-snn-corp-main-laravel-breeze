<template>
    <div>

        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu" @click="$emit('menu-click')">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <Link :href="route('profile.edit')" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="/admin/images/logo.png" alt="" height="80">
                    </span>
                </Link>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <Link class="nav-link menu-link"
                                :href="route('profile.edit')">
                                <i class="ri-message-fill"></i> <span data-key="t-widgets">Enquiries</span>
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link menu-link"
                                :href="route('logout')">
                                <i class="ri-building-fill"></i> <span data-key="t-widgets">Projects</span>
                            </Link>
                        </li>
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


</script>
