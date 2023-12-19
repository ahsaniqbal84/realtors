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
                <p class="text-sm text-gray-600">Teams table</p>
            </div>
        </div>
    </div>

    <div class="container overflow-y-auto">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="">Serial Number</th>
                    <th>Name</th>
                    <th>BCM</th>
                    <th>Office</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="(team, index) in teams"
                    :key="index"
                    class="bg-gray-50"
                >
                    <td>{{ team.team_id }}</td>
                    <td>
                        <Link
                            :href="route('team.edit', team.team_id)"
                            class="hover:text-purple-300 text-purple-600"
                            >{{ team.name }}</Link
                        >
                    </td>
                    <td>
                        {{
                            team.bcm
                                ? team.bcm.employee.first_name +
                                  " " +
                                  team.bcm.employee.last_name
                                : "None"
                        }}
                    </td>
                    <td>
                        {{ team.office.name }}
                    </td>
                    <td>
                        <Link
                            class="text-purple-600 hover:text-purple-300"
                            :href="route('team.show', team.team_id)"
                        >
                            Team Detail
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
const props = defineProps(["teams"]);
const swal = inject("$swal");
const page = usePage();
const form = useForm({
    employeees_id: null,
});
const handleLinkClick = async (team) => {
    form.get(route("team.show", team.team_id));
};
</script>
