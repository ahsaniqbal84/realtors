<template>
    <Head title="Zonal Managers" />

    <AuthenticatedLayout>
        <template #header> Zonal managers </template>
        <div>
            <Link
                :href="route('team.create')"
                as="button"
                class="btn-primary mb-4"
                >Add ZM</Link
            >
        </div>

        <zm-table :zms="zms.data"></zm-table>
        <div
            v-if="zms.data.length"
            class="w-full flex justify-center mt-8 mb-8"
        >
            <Pagination :links="zms.links"></Pagination>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ZmTable from "@/Pages/Zms/Index/Components/ZmTable.vue";
import Pagination from "@/Components/Pagination.vue";
import { Head } from "@inertiajs/vue3";
defineProps({
    zms: Object,
});
</script>
