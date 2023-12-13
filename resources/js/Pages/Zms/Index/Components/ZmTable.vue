<template>
    <div class="container overflow-y-auto">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="">Serial Number</th>
                    <th>Name</th>
                    <th>Created On</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(zm, index) in zms" :key="index" class="bg-gray-50">
                    <td>{{ zm.zm_id }}</td>
                    <td>
                        <Link
                            :href="route('zm.edit', zm.zm_id)"
                            class="hover:text-purple-300 text-purple-600"
                            >{{ zm.employee.first_name }}
                            {{ zm.employee.last_name }}</Link
                        >
                    </td>
                    <td>{{ formatCreatedAt(zm.created_at) }}</td>
                    <td>Zm Detail</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { Link, usePage, useForm } from "@inertiajs/vue3";
import { inject } from "vue";
const props = defineProps(["zms"]);
const swal = inject("$swal");
const page = usePage();
const form = useForm({
    employeees_id: null,
});
const formatCreatedAt = (createdAt) => {
    const date = new Date(createdAt);
    return date.toLocaleDateString();
};
const handleLinkClick = async (team) => {
    form.get(route("team.show", team.team_id));
};
</script>
