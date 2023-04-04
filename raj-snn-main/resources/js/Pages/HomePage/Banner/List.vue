<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import BreadCrumb from '@/Components/BreadCrumb.vue';
import NoData from '@/Components/NoData.vue';
import Pagination from '@/Components/Pagination.vue';
import Search from '@/Components/Search.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SuccessButton from '@/Components/Buttons/SuccessButton.vue';

defineOptions({ layout: MainLayout })

defineProps({
    banners: {
        type: Object || null,
    },
    filters: {
        type: Object || null
    }
});

const deleteHandler = (id) => {
    router.delete(route('banner.delete', id), {preserveState: true});
}

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
                                    <SuccessButton size="md" :type_button="false" :href="route('banner.create')">
                                        <i class="ri-add-line align-bottom me-1"></i> Create
                                    </SuccessButton>
                                </div>
                            </div>
                            <div class="col-sm">
                                <Search v-if="banners.data.length>0" :link="route('banner.list')" :filter="filters?.filter?.search" />
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
                                            <div class="d-flex gap-2 align-items-center">
                                                <div class="edit">
                                                    <PrimaryButton :type_button="false" :href="route('banner.edit', item.id)">
                                                        Edit
                                                    </PrimaryButton>
                                                </div>
                                                <div class="remove">
                                                    <w-confirm
                                                        style="background-color: red;padding: 3px 3px; border-radius: 5px;"
                                                        :tooltip="{ label: 'Delete this?', bgColor: 'error', top: true, transition: 'twist' }"
                                                        @confirm="deleteHandler(item.id)">
                                                            Delete
                                                    </w-confirm>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <NoData v-else />

                    <Pagination :pagination="banners?.meta?.links" />
                </div>
            </div><!-- end card -->
        </div>
    </div>
</div></template>
