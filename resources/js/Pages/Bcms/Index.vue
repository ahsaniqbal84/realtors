<template>
    <Head title="Bcms" />

    <AuthenticatedLayout>
        <template #header>BCMs </template>
        <div>
            <Link
                :href="route('bcm.create')"
                as="button"
                class="btn-primary mb-4"
                >Add Bcm</Link
            >
        </div>

        <BcmTable :bcms="bcms.data"></BcmTable>
        <div
            v-if="bcms.data.length"
            class="w-full flex justify-center mt-8 mb-8"
        >
            <Pagination :links="bcms.links"></Pagination>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BcmTable from "@/Pages/Bcms/Index/Components/BcmTable.vue";
import Pagination from "@/Components/Pagination.vue";
import { Head } from "@inertiajs/vue3";
defineProps({
    bcms: Object,
});
</script>
