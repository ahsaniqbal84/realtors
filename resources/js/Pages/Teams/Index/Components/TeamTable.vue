<template>
    <div class="container overflow-y-auto">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="">Serial Number</th>
                    <th>Name</th>
                    <th>bcm</th>
                    <!-- <th>Action</th> -->
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
                            team.first_name
                                ? team.first_name + " " + team.last_name
                                : "None"
                        }}
                    </td>
                    <!-- <td>
                        <Link
                            class="text-purple-600 hover:text-purple-300"
                            href="
                               #
                            "
                            @click.prevent="handleLinkClick(team)"
                        >
                            Delete
                        </Link>
                    </td> -->
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
    const result = await swal.fire({
        title: "Are you sure?",
        text: "You are about to delete the team " + team.name + " !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel",
    });
    if (result.isConfirmed) {
        form.delete(route("team.destroy", team.team_id));
        console.log("Team deleted successfully");
    }
};
</script>
