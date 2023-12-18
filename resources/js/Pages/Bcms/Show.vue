<template>
    <Head title="Teams" />

    <AuthenticatedLayout>
        <template #header> BCM - {{ bcm.bcm_id }} Detail </template>
        <div class="max-w-3xl mx-auto p-4">
            <div class="bg-gray-50 rounded-lg shadow-md p-6">
                <!-- ZM Details -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-2">Zonal Manager</h2>
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-8 w-8 mr-2">
                            <!-- Add an icon or image for ZM -->
                        </div>
                        <p class="text-gray-700">
                            ZM{{ bcm.zm.zm_id }} -
                            {{ bcm.zm.employee.first_name }}
                            {{ bcm.zm.employee.last_name }}
                        </p>
                        <!-- Add other ZM details here -->
                    </div>
                </div>

                <!-- BCM Details -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-2">
                        Branch center Manager
                    </h2>
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-8 w-8 mr-2">
                            <!-- Add an icon or image for BCM -->
                        </div>
                        <p class="text-gray-700">
                            BCM{{ bcm.bcm_id }} - {{ bcm.employee.first_name }}
                            {{ bcm.employee.last_name }}
                        </p>
                        <!-- Add other BCM details here -->
                    </div>
                </div>

                <!-- Team Members -->
                <div>
                    <h2 class="text-xl font-semibold mb-2">Teams</h2>
                    <ul>
                        <li
                            class="mb-2"
                            v-if="!bcm.teams || bcm.teams.length === 0"
                        >
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8 mr-2"></div>
                                <span class="text-gray-700"
                                    >No Team is Assigned</span
                                >
                            </div>
                        </li>
                        <li
                            v-else
                            v-for="(team, index) in bcm.teams"
                            :key="index + 1"
                            class="mb-2"
                        >
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8 mr-2"></div>
                                <span class="font-semibold">{{
                                    index + 1
                                }}</span>
                                -
                                <Link
                                    :href="route('team.show', team.team_id)"
                                    class="hover:text-purple-300 text-purple-600"
                                    >{{ team.name }}</Link
                                >
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
defineProps({
    bcm: Object,
    zm: Object,
    members: Array,
});
</script>
