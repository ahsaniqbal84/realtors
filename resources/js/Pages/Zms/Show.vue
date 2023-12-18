<template>
    <Head title="Teams" />

    <AuthenticatedLayout>
        <template #header> Zonal Manager Detail </template>
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
                            ZM{{ zm.zm_id }} -
                            {{ zm.employee.first_name }}
                            {{ zm.employee.last_name }}
                        </p>
                        <!-- Add other ZM details here -->
                    </div>
                </div>

                <!-- BCM Details -->
                <div>
                    <h2 class="text-xl font-semibold mb-2">BCMs</h2>
                    <ul>
                        <li
                            class="mb-2"
                            v-if="!zm.bcms || zm.bcms.length === 0"
                        >
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8 mr-2"></div>
                                <span class="text-gray-700"
                                    >No BCM is Assigned</span
                                >
                            </div>
                        </li>
                        <li
                            v-else
                            v-for="(bcm, index) in zm.bcms"
                            :key="index + 1"
                            class="mb-2"
                        >
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8 mr-2"></div>
                                <span class="font-semibold"
                                    >BCM-{{ bcm.bcm_id }}</span
                                >

                                <Link
                                    :href="route('bcm.show', bcm.bcm_id)"
                                    class="hover:text-purple-300 text-purple-600"
                                    >.
                                    {{ bcm.employee.first_name }}
                                    {{ bcm.employee.last_name }}</Link
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
    zm: Object,
});
</script>
