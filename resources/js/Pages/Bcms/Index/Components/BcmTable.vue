<template>
    <div class="container overflow-y-auto">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="">Serial Number</th>
                    <th>Name</th>
                    <th>Zm</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="(bcm, index) in bcms"
                    :key="index"
                    class="bg-gray-50"
                >
                    <td>{{ bcm.bcm_id }}</td>
                    <td>
                        <Link
                            :href="route('bcm.edit', bcm.bcm_id)"
                            class="hover:text-purple-300 text-purple-600"
                            >{{ bcm.employee.first_name }}
                            {{ bcm.employee.last_name }}</Link
                        >
                    </td>
                    <td>
                        {{ bcm.zm.employee.first_name }}
                        {{ bcm.zm.employee.last_name }}
                    </td>
                    <td>
                        <Link
                            :href="route('bcm.show', bcm.bcm_id)"
                            class="hover:text-purple-300 text-purple-600"
                            >View Detail</Link
                        >
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { Link, usePage, useForm } from "@inertiajs/vue3";
import { inject } from "vue";
const props = defineProps(["bcms"]);
const swal = inject("$swal");
const page = usePage();
const form = useForm({
    employeees_id: null,
});
const handleLinkClick = async (team) => {
    form.get(route("team.show", team.team_id));
};
</script>
