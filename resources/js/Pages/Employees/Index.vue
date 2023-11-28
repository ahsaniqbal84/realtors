<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header> Employees </template>
        <div>
            <Link
                :href="route('employees.create')"
                as="button"
                class="btn-primary"
                >Add Employee</Link
            >
        </div>
        <EmployeesTable :employees="employees"></EmployeesTable>
    </AuthenticatedLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import EmployeesTable from "@/Pages/Employees/Index/Components/EmpoyeesTable.vue";
import { Head } from "@inertiajs/vue3";
defineProps({
    employees: Array,
});
// const dummyEmployeeData = [
//     {
//         name: "John Doe",
//         code: "JD001",
//         phone: "123-456-7890",
//         department: "IT",
//         city: "New York",
//         team: "Dev Team",
//         status: "Active",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
//     {
//         name: "Jane Smith",
//         code: "JS002",
//         phone: "987-654-3210",
//         department: "HR",
//         city: "San Francisco",
//         team: "HR Team",
//         status: "Inactive",
//     },
// ];
</script>
