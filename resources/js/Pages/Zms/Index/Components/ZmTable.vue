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
                    <td>{{ new Date(zm.created_at).toLocaleDateString() }}</td>
                    <td>
                        <Link
                            :href="route('zm.show', zm.zm_id)"
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
import { Link } from "@inertiajs/vue3";
defineProps(["zms"]);
</script>
