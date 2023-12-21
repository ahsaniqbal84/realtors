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
                <p class="text-sm text-gray-600">Customers table</p>
            </div>
        </div>
    </div>

    <div class="container overflow-y-auto">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="">Serial Number</th>
                    <th>Name</th>
                    <th>Agent</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="(customer, index) in customers"
                    :key="index"
                    class="bg-gray-50"
                >
                    <td>{{ customer.customer_id }}</td>
                    <td>
                        <Link
                            :href="route('customer.edit', customer.customer_id)"
                            class="hover:text-purple-300 text-purple-600"
                            >{{ customer.first_name }}
                            {{ customer.last_name }}</Link
                        >
                    </td>
                    <td>
                        {{ customer.employee.first_name }}
                        {{ customer.employee.last_name }}
                    </td>
                    <td>
                        <Link
                            :href="route('bcm.show', customer.customer_id)"
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
defineProps(["customers"]);
</script>
