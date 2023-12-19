<template>
    <Head title="Teams" />

    <AuthenticatedLayout>
        <template #header> Teams </template>
        <div>
            <Link
                :href="route('team.create')"
                as="button"
                class="btn-primary mb-4"
                ><i class="fa-solid fa-plus text-sm"></i> Team</Link
            >
        </div>

        <TeamTable :teams="teams.data"></TeamTable>
        <div
            v-if="teams.data.length"
            class="w-full flex justify-center mt-8 mb-8"
        >
            <Pagination :links="teams.links"></Pagination>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import TeamTable from "@/Pages/Teams/Index/Components/TeamTable.vue";
import Pagination from "@/Components/Pagination.vue";
import { Head } from "@inertiajs/vue3";
defineProps({
    teams: Object,
});
</script>
