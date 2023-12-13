<template>
    <Head title="Teams" />

    <AuthenticatedLayout>
        <template #header> Team Detail </template>
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
                            ZM{{ zm.zm_id }} - {{ zm.employee.first_name }}
                            {{ zm.employee.last_name }}
                        </p>
                        <!-- Add other ZM details here -->
                    </div>
                </div>

                <!-- BCM Details -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-2">
                        Branch Channel Manager
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
                    <h2 class="text-xl font-semibold mb-2">Team Members</h2>
                    <ul>
                        <li
                            v-for="member in members"
                            :key="member.id"
                            class="mb-2"
                        >
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8 mr-2"></div>
                                <span class="font-semibold"
                                    >{{ member.first_name }}
                                    {{ member.last_name }}</span
                                >
                                -
                                <span class="text-gray-700">{{
                                    member.designation.name
                                }}</span>
                                <!-- Add other member details here -->
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
import { Head } from "@inertiajs/vue3";
defineProps({
    bcm: Object,
    zm: Object,
    members: Array,
});
</script>
