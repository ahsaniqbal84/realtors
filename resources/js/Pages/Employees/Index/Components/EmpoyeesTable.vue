<template>
    <div class="container overflow-y-auto">
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
                            href="
                               #
                            "
                            @click.prevent="handleLinkClick(employee)"
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
import { Link, usePage, useForm } from "@inertiajs/vue3";
import { inject } from "vue";
const props = defineProps(["employees"]);
const swal = inject("$swal");
const page = usePage();
const form = useForm({
    employeees_id: null,
});
const handleLinkClick = async (employee) => {
    const result = await swal.fire({
        title: "Are you sure?",
        text:
            "You are about to delete the employee " +
            employee.first_name +
            " " +
            employee.last_name +
            " !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel",
    });
    if (result.isConfirmed) {
        form.delete(route("employees.destroy", employee.employee_id));
        console.log("Employee deleted successfully");
    }
};
</script>
