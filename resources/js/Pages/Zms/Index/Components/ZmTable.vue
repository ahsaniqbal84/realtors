<template>
    <div
        class="mb-4 inline-flex w-full overflow-hidden rounded-lg bg-gray-50 shadow-md"
    >
        <div class="flex w-12 items-center justify-center bg-purple-500">
            <i class="fas fa-info-circle text-white"></i>
        </div>

        <div class="-mx-3 px-4 py-2">
            <div class="mx-3">
                <span class="font-semibold text-purple-500">Info</span>
                <p class="text-sm text-gray-600">Zonal Managers table</p>
            </div>
        </div>
    </div>

    <div class="container overflow-y-auto">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="">Serial Number</th>
                    <th>Name</th>
                    <th>Created On</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(zm, index) in zms" :key="index" class="bg-gray-50">
                    <td>{{ zm.zm_id }}</td>
                    <td>
                        <Link
                            :href="route('zm.edit', zm.zm_id)"
                            class="hover:text-purple-300 text-purple-600"
                            >{{ zm.employee.first_name }}
                            {{ zm.employee.last_name }}</Link
                        >
                    </td>
                    <td>{{ new Date(zm.created_at).toLocaleDateString() }}</td>
                    <td>
                        <Link
                            :href="route('zm.show', zm.zm_id)"
                            class="hover:text-purple-300 text-purple-600"
                            >View Detail</Link
                        >
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
defineProps(["zms"]);
</script>
