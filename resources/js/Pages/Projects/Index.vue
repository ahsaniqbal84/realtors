<template>
    <Head title="Projects" />

    <AuthenticatedLayout>
        <template #header>Projects </template>
        <div>
            <Link
                :href="route('project.create')"
                as="button"
                class="btn-primary mb-4"
                ><i class="fa-solid fa-plus text-sm"></i> Projects</Link
            >
        </div>

        <ProjectTable :projects="projects.data"></ProjectTable>
        <div
            v-if="projects.data.length"
            class="w-full flex justify-center mt-8 mb-8"
        >
            <Pagination :links="projects.links"></Pagination>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ProjectTable from "@/Pages/Projects/Index/Components/ProjectTable.vue";
import Pagination from "@/Components/Pagination.vue";
import { Head } from "@inertiajs/vue3";
defineProps({
    projects: Object,
});
</script>
