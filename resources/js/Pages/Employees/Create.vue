<template>
    <form @submit.prevent="create">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <label class="label">First Name</label>
                <input type="text" v-model="form.first_name" class="input" />
                <div v-if="form.errors.first_name" class="input-error">
                    {{ form.errors.first_name }}
                </div>
            </div>
            <div class="col-span-2">
                <label class="label">Last Name</label>
                <input type="text" v-model="form.last_name" class="input" />
                <div v-if="form.errors.last_name" class="input-error">
                    {{ form.errors.last_name }}
                </div>
            </div>
            <div class="col-span-2">
                <label class="label">Gender</label>
                <select v-model="form.gender" class="input">
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                </select>
                <div v-if="form.errors.gender" class="input-error">
                    {{ form.errors.gender }}
                </div>
            </div>
            <div class="col-span-2">
                <label class="label">Employee Code</label>
                <input type="text" v-model="form.employee_code" class="input" />
                <div v-if="form.errors.employee_code" class="input-error">
                    {{ form.errors.employee_code }}
                </div>
            </div>
            <div class="col-span-2">
                <label class="label">Office</label>
                <select v-model="form.office" class="input">
                    <option
                        v-for="office in offices"
                        :key="office.office_id"
                        :value="office.office_id"
                    >
                        {{ office.name }}
                    </option>
                </select>
                <div v-if="form.errors.office" class="input-error">
                    {{ form.errors.office }}
                </div>
            </div>
            <div class="col-span-2">
                <label class="label">Team</label>
                <select v-model="form.team" class="input">
                    <option
                        v-for="team in teams"
                        :key="team.team_id"
                        :value="team.team_id"
                    >
                        {{ team.name }}
                    </option>
                    <option :value="null">Not Assign</option>
                </select>
                <div v-if="form.errors.team" class="input-error">
                    {{ form.errors.team }}
                </div>
            </div>
            <div class="col-span-2">
                <label class="label">Department</label>
                <select v-model="form.department" class="input">
                    <option
                        v-for="dept in departments"
                        :key="dept.department_id"
                        :value="dept.department_id"
                    >
                        {{ dept.name }}
                    </option>
                </select>
                <div v-if="form.errors.department" class="input-error">
                    {{ form.errors.department }}
                </div>
            </div>
            <div class="col-span-2">
                <label class="label">Designation</label>
                <select v-model="form.designation" class="input">
                    <option
                        v-for="designation in designations"
                        :key="designation.designation_id"
                        :value="designation.designation_id"
                    >
                        {{ designation.name }}
                    </option>
                </select>
                <div v-if="form.errors.designation" class="input-error">
                    {{ form.errors.designation }}
                </div>
            </div>
            <div class="col-span-2">
                <label class="label">Mobile Number</label>
                <input type="text" v-model="form.mobile_number" class="input" />
                <div v-if="form.errors.mobile_number" class="input-error">
                    {{ form.errors.mobile_number }}
                </div>
            </div>
            <div class="col-span-2">
                <label class="label">City</label>
                <input type="text" v-model="form.city" class="input" />
                <div v-if="form.errors.city" class="input-error">
                    {{ form.errors.city }}
                </div>
            </div>
            <div class="col-span-2">
                <label class="label">Status</label>
                <select v-model="form.status" class="input">
                    <option value="1">Active</option>
                    <option value="0">Not Active</option>
                </select>
                <div v-if="form.errors.status" class="input-error">
                    {{ form.errors.status }}
                </div>
            </div>
            <div class="col-span-6">
                <button type="submit" class="btn-primary">Create</button>
            </div>
        </div>
    </form>
</template>
<script setup>
import { reactive } from "vue";
//import { useForm } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/vue3";
const form = useForm({
    first_name: null,
    last_name: null,
    gender: null,
    employee_code: null,
    office: null,
    team: null,
    department: null,
    designation: null,
    mobile_number: null,
    status: 1,
    city: null,
});
defineProps({
    offices: Object,
    departments: Object,
    designations: Object,
    teams: Object,
});

const create = () => form.post(route("employees.store"));
</script>

<style scope>
label {
    margin-right: 2em;
}
div {
    padding: 2px;
}
</style>
