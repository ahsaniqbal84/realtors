<template>
    <Head title="Employees/create" />

    <AuthenticatedLayout>
        <template #header> Employees/Create </template>
        <form
            @submit.prevent="create"
            class="w-full max-w-screen-md mx-auto p-6 bg-gray-50 rounded-lg shadow-md"
        >
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-6 sm:col-span-3 md:col-span-3">
                    <label class="label">First Name</label>
                    <input
                        type="text"
                        v-model="form.first_name"
                        class="input"
                    />
                    <div v-if="form.errors.first_name" class="input-error">
                        {{ form.errors.first_name }}
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-3 md:col-span-3">
                    <label class="label">Last Name</label>
                    <input type="text" v-model="form.last_name" class="input" />
                    <div v-if="form.errors.last_name" class="input-error">
                        {{ form.errors.last_name }}
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-3 md:col-span-3">
                    <label class="label">Gender</label>
                    <select v-model="form.gender" class="input">
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                    </select>
                    <div v-if="form.errors.gender" class="input-error">
                        {{ form.errors.gender }}
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-3 md:col-span-3">
                    <label class="label">Employee Code</label>
                    <input type="text" v-model="form.code" class="input" />
                    <div v-if="form.errors.code" class="input-error">
                        {{ form.errors.code }}
                    </div>
                </div>
                <div
                    class="col-span-6 sm:col-span-3 md:col-span-3"
                    @change="updateTeamOnDesignation(form.designation_id)"
                >
                    <label class="label">Designation</label>
                    <select v-model="form.designation_id" class="input">
                        <option
                            v-for="designation in designations"
                            :key="designation.designation_id"
                            :value="designation.designation_id"
                        >
                            {{ designation.name }}
                        </option>
                    </select>
                    <div v-if="form.errors.designation_id" class="input-error">
                        {{ form.errors.designation_id }}
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-3 md:col-span-3">
                    <label class="label">Office</label>
                    <select
                        v-model="form.office_id"
                        class="input"
                        @change="updateTeams(form.office_id)"
                    >
                        <option
                            v-for="office in offices"
                            :key="office.office_id"
                            :value="office.office_id"
                        >
                            {{ office.name }}
                        </option>
                    </select>
                    <div v-if="form.errors.office_id" class="input-error">
                        {{ form.errors.office_id }}
                    </div>
                </div>

                <div
                    class="col-span-6 sm:col-span-3 md:col-span-3"
                    v-if="
                        form.designation_id !== 4 && form.designation_id !== 5
                    "
                >
                    <label class="label">Team</label>
                    <select v-model="form.team_id" class="input">
                        <option
                            v-for="team in filteredTeams"
                            :key="team.team_id"
                            :value="team.team_id"
                        >
                            {{ team.name }}
                        </option>
                        <option :value="null">None</option>
                    </select>
                    <div v-if="form.errors.team_id" class="input-error">
                        {{ form.errors.team_id }}
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-3 md:col-span-3">
                    <label class="label">Department</label>
                    <select v-model="form.department_id" class="input">
                        <option
                            v-for="dept in departments"
                            :key="dept.department_id"
                            :value="dept.department_id"
                        >
                            {{ dept.name }}
                        </option>
                    </select>
                    <div v-if="form.errors.department_id" class="input-error">
                        {{ form.errors.department_id }}
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-3 md:col-span-3">
                    <label class="label">Mobile Number</label>
                    <input
                        type="text"
                        v-model="form.mobile_number"
                        class="input"
                    />
                    <div v-if="form.errors.mobile_number" class="input-error">
                        {{ form.errors.mobile_number }}
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-3 md:col-span-3">
                    <label class="label">City</label>
                    <input type="text" v-model="form.city" class="input" />
                    <div v-if="form.errors.city" class="input-error">
                        {{ form.errors.city }}
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-3 md:col-span-3">
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
    </AuthenticatedLayout>
</template>
<script setup>
import { ref } from "vue";
//import { useForm } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const form = useForm({
    first_name: null,
    last_name: null,
    gender: null,
    code: null,
    office_id: null,
    team_id: null,
    zm_id: null,
    department_id: null,
    designation_id: null,
    mobile_number: null,
    status: 1,
    city: null,
});
const props = defineProps({
    offices: Object,
    departments: Object,
    designations: Object,
    teams: Object,
    zms: Object,
});

const filteredTeams = ref([]);

const create = () => form.post(route("employee.store"));

const updateTeams = (officeId) => {
    console.log(officeId);
    // Find the corresponding bcm in the list
    filteredTeams.value = props.teams.filter(
        (team) => team.office_id === officeId
    );
    console.log(filteredTeams.value);
};

const updateTeamOnDesignation = (designationId) => {
    // Check if user have selected any team for Bcm or Zm
    if (designationId == 4 || designationId == 5) {
        form.team_id = null;
    }
};
</script>

<style scope>
label {
    margin-right: 2em;
}
div {
    padding: 2px;
}
</style>
