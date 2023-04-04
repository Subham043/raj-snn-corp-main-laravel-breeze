<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import BreadCrumb from '@/Components/BreadCrumb.vue';
import NoData from '@/Components/NoData.vue';
import Pagination from '@/Components/Pagination.vue';
import Search from '@/Components/Search.vue';

defineOptions({ layout: MainLayout })

defineProps({
    banners: {
        type: Object || null,
    },
    filters: {
        type: Object || null
    }
});

</script>

<template>
    <Head title="Banner" />
    <BreadCrumb page="Banner" />
    <div class="row mt-5">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Banner</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <Link :href="route('banner.create')" style="background:green;border-color:green;"
                                        type="button" class="btn btn-success add-btn" id="create-btn"><i
                                            class="ri-add-line align-bottom me-1"></i> Create</Link>
                                </div>
                            </div>
                            <div class="col-sm">
                                <Search :link="route('banner.list')" :filter="filters?.filter?.search" />
                            </div>
                        </div>
                        <div v-if="banners.data.length>0" class="table-responsive table-card mt-3 mb-1">

                            <table class="table align-middle table-nowrap" id="customerTable">
                                <thead class="table-light">
                                    <tr>
                                        <th class="sort" data-sort="customer_name">Title</th>
                                        <th class="sort" data-sort="customer_name">Image</th>
                                        <th class="sort" data-sort="date">Created On</th>
                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">

                                    <tr v-for="item in banners.data" :key="item.id">
                                        <td class="customer_name">{{ item.title }}</td>
                                        <td class="customer_name">{{ item.image }}</td>
                                        <td class="date">{{ item.created_at }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <Link :href="route('banner.edit', item.id)"
                                                        style="background:yellow;color:black;border-color:yellow;"
                                                        class="btn btn-sm btn-success edit-item-btn">Edit</Link>
                                                </div>
                                                <div class="remove">
                                                    <button class="btn btn-sm btn-danger remove-item-btn"
                                                        style="background:red">Delete</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <NoData v-else />

                    <Pagination />
                </div>
            </div><!-- end card -->
        </div>
    </div>
</div></template>
