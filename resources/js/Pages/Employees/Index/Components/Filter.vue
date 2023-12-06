<template>
    <form @submit.prevent="filter">
        <div class="mb-8 mt-4 flex flex-wrap gap-1">
            <div class="flex flex-nowrap items-center">
                <input
                    type="text"
                    placeholder="Name"
                    class="input-filter-l w-28"
                    v-model="filterForm.name"
                />
                <input
                    type="number"
                    placeholder="Employee Code"
                    class="input-filter-r w-36"
                    v-model.number="filterForm.code"
                />
            </div>

            <div class="flex flex-nowrap items-center">
                <select class="input-filter-l" v-model="filterForm.gender">
                    <option :value="null">Gender</option>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                </select>
                <select class="input-filter-r" v-model="filterForm.status">
                    <option :value="null">Status</option>
                    <option value="0">Not Active</option>
                    <option value="1">Active</option>
                </select>
            </div>

            <div class="flex flex-nowrap items-center">
                <select
                    class="input-filter-l w-40"
                    v-model="filterForm.designation"
                >
                    <option :value="null">Designation</option>
                    <option
                        v-for="(designation, index) in designations"
                        :key="index"
                        :value="designation.designation_id"
                    >
                        {{ designation.name }}
                    </option></select
                ><select class="input-filter-r w-40" v-model="filterForm.team">
                    <option :value="null">Team</option>
                    <option value="none">No Team</option>
                    <option
                        v-for="team in teams"
                        :key="team.team_id"
                        :value="team.team_id"
                    >
                        {{ team.name }}
                    </option>
                </select>
            </div>

            <button
                type="submit"
                class="btn-primary w-full sm:w-full md:w-12 lg:w-auto"
            >
                Filter
            </button>
            <button
                type="reset"
                @click="reset"
                class="w-full sm:w-full md:w-12 lg:w-auto"
            >
                Clear
            </button>
        </div>
    </form>
</template>
<script setup>
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    teams: Array,
    designations: Array,
    filters: Object,
});

const filterForm = useForm({
    name: props.filters.name ?? null,
    code: props.filters.code ?? null,
    gender: props.filters.gender ?? null,
    status: props.filters.status ?? null,
    designation: props.filters.designation ?? null,
    team: props.filters.team ?? null,
});

const filter = () => {
    filterForm.get(route("employee.index"), {
        preserveState: true,
        preserveScroll: true,
    });
};

const reset = () => {
    filterForm.name = null;
    filterForm.code = null;
    filterForm.gender = null;
    filterForm.status = null;
    filterForm.designation = null;
    filterForm.team = null;
    filter();
};
</script>
