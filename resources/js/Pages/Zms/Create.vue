<template>
    <Head title="Employees/create" />

    <AuthenticatedLayout>
        <template #header> ZMs/Create </template>
        <form
            @submit.prevent="create"
            class="w-full max-w-screen-md mx-auto p-6 bg-gray-50 rounded-lg shadow-md"
        >
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-6 sm:col-span-3 md:col-span-3">
                    <label class="label">New Zm</label>
                    <select v-model="form.employee_id" class="input">
                        <option
                            v-for="zm in zms"
                            :key="zm.employee_id"
                            :value="zm.employee_id"
                        >
                            {{ zm.first_name }}
                            {{ zm.last_name }}
                        </option>
                    </select>
                    <div v-if="form.errors.employee_id" class="input-error">
                        please select new Zm
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
import { useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    zms: Array,
});

const form = useForm({
    employee_id: null,
});

const create = () => form.post(route("zm.store"));
</script>

<style scope>
label {
    margin-right: 2em;
}
div {
    padding: 2px;
}
</style>
