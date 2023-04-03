<template>
    <header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <ApplicationLogo height="60" />
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                    id="topnav-hamburger-icon" @click="$emit('menu-click')">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>


            </div>

            <div class="d-flex align-items-center">

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <w-menu arrow>
                        <template #activator="{ on }">
                            <button class="btn" v-on="on">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="/admin/images/avatar.png" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span
                                            class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ user.name }}</span>
                                        <span
                                            class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">ADMIN</span>
                                    </span>
                                </span>
                            </button>
                        </template>
                        <div class="text-left">
                            <h6 class="dropdown-header">Welcome {{ user.name }}!</h6>
                            <Link class="dropdown-item" :href="route('profile.edit')"><i
                                    class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle">Profile</span></Link>

                            <Link class="dropdown-item" :href="route('logout')" method="post" as="button"><i
                                    class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle" data-key="t-logout">Logout</span></Link>
                        </div>
                    </w-menu>
                </div>


            </div>
        </div>
    </div>
</header>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import ApplicationLogo from '../ApplicationLogo.vue';

const user = usePage().props.auth.user;

defineEmits(['menu-click'])
</script>
