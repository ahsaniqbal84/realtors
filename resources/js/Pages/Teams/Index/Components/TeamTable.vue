<template>
    <div class="container overflow-y-auto">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="">Serial Number</th>
                    <th>Name</th>
                    <th>bcm</th>
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
