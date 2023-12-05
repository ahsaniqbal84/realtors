<template>
    <Head title="Employees" />

    <AuthenticatedLayout>
        <template #header> Employees </template>
        <div>
            <Link
                :href="route('employee.create')"
                as="button"
                class="btn-primary"
                >Add Employee</Link
            >
        </div>
        <Filter
            :teams="teams"
            :designations="designations"
            :filters="filters"
        ></Filter>
        <EmployeesTable :employees="employees.data"></EmployeesTable>
        <div
            v-if="employees.data.length"
            class="w-full flex justify-center mt-8 mb-8"
        >
            <Pagination :links="employees.links"></Pagination>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import EmployeesTable from "@/Pages/Employees/Index/Components/EmpoyeesTable.vue";
import Filter from "@/Pages/Employees/Index/Components/Filter.vue";
import Pagination from "@/Components/Pagination.vue";
import { Head } from "@inertiajs/vue3";
defineProps({
    employees: Object,
    teams: Object,
    designations: Object,
    filters: Object,
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
