<template>
    <table class="table bg-white">
        <thead>
            <tr>
                <th>Serial Number</th>
                <th>Name</th>
                <th>Code</th>
                <th>Phone</th>
                <th>Department</th>
                <th>City</th>
                <th>Team</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(employee, index) in employees" :key="index">
                <td>{{ index + 1 }}</td>
                <td>{{ employee.name }}</td>
                <td>{{ employee.code }}</td>
                <td>{{ employee.phone }}</td>
                <td>{{ employee.department }}</td>
                <td>{{ employee.city }}</td>
                <td>{{ employee.team }}</td>
                <td>{{ employee.status }}</td>
                <td>
                    <!-- Add your action buttons or links here -->
                    <button @click="editEmployee(employee)">Edit</button>
                    <button @click="deleteEmployee(employee)">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script setup>
const props = defineProps(["employees"]);

const editEmployee = (employee) => {
    console.log("Edit employee:", employee);
};

const deleteEmployee = (employee) => {
    console.log("Delete employee:", employee);
};
</script>

<style scoped>
/* Add your styling here */
.table-container {
    max-height: 300px; /* Set a max height to enable vertical scrollbar */
    overflow-y: auto; /* Enable vertical scrollbar when content overflows */
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    white-space: nowrap; /* Prevent text wrapping for horizontal scrollbar */
    overflow-x: auto; /* Enable horizontal scrollbar when content overflows */
}

.table th,
.table td {
    border: 1px solid purple;
    padding: 8px;
    text-align: left;
}

.table th {
    background-color: #f2f2f2;
    font-weight: bold;
}
</style>
