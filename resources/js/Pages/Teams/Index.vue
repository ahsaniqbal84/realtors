<template>
    <Head title="Teams" />

    <AuthenticatedLayout>
        <template #header> Teams </template>

        <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                Sample static text page
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>
