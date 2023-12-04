<template>
    <div class="container mt-5 overflow-y-auto">
        <table class="">
            <thead>
                <tr>
                    <th class="">Serial Number</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Designation</th>
                    <th>Team</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="(employee, index) in employees"
                    :key="index"
                    class="bg-gray-50"
                    :class="{ 'bg-red-200': employee.status === 0 }"
                >
                    <td>{{ employee.employee_id }}</td>
                    <td>
                        <Link
                            :href="
                                route('employees.edit', employee.employee_id)
                            "
                            class="hover:text-purple-300 text-purple-600"
                            >{{ employee.first_name }}
                            {{ employee.last_name }}</Link
                        >
                    </td>
                    <td>{{ employee.code }}</td>
                    <td>{{ employee.designation_name }}</td>
                    <td>
                        <span v-if="employee.team_id === null"
                            >No Team Assigned</span
                        >
                        <span v-else>{{ employee.team_name }}</span>
                    </td>
                    <td>{{ employee.mobile_number }}</td>
                    <td>{{ employee.city }}</td>
                    <td>{{ employee.status }}</td>
                    <td>
                        <Link
                            class="text-purple-600 hover:text-purple-300"
                            :href="
                                route('employees.destroy', employee.employee_id)
                            "
                            method="DELETE"
                            as="button"
                        >
                            Delete
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
const props = defineProps(["employees"]);
</script>

<style scoped>
/* Add your styling here */

/* table {
    width: 100%;
    border-collapse: collapse;
    overflow-x: scroll;
}

table th {
    border-bottom: 2px solid #e2e8f0;
    background-color: #edf2f7;
    padding: 0.75rem 1.25rem;
    text-align: left;
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    color: #718096;
}

table td {
    border-bottom: 1px solid #e2e8f0;
    background-color: #fcfcfc;
    padding: 1rem 1.25rem;
    font-size: 0.875rem;
    line-height: 1.25rem;
    color: #4a5568;
}

table tr {
    border-bottom: 1px solid #e2e8f0;
    background-color: #f7fafc;
    text-align: left;
    font-size: 0.875rem;
    line-height: 1.25rem;
    color: #4a5568;
}

.container {
    display: inline-block;
    min-width: 100%;
    border-radius: 0.375rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
        0 2px 4px -1px rgba(0, 0, 0, 0.06);
} */
</style>
