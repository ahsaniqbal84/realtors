<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header> Employees </template>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Pagination from "@/Components/Pagination.vue";
import { Head } from "@inertiajs/vue3";
</script>
