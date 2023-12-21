<template>
    <Head title="Customers" />

    <AuthenticatedLayout>
        <template #header>Customers </template>
        <div>
            <Link
                :href="route('customer.create')"
                as="button"
                class="btn-primary mb-4"
                ><i class="fa-solid fa-plus text-sm"></i> Customers</Link
            >
        </div>

        <CustomerTable :customers="customers.data"></CustomerTable>
        <div
            v-if="customers.data.length"
            class="w-full flex justify-center mt-8 mb-8"
        >
            <Pagination :links="customers.links"></Pagination>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CustomerTable from "@/Pages/Customers/Index/Components/CustomerTable.vue";
import Pagination from "@/Components/Pagination.vue";
import { Head } from "@inertiajs/vue3";
defineProps({
    customers: Object,
});
</script>
