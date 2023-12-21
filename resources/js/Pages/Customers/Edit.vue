<template>
    <Head title="Employees/create" />

    <AuthenticatedLayout>
        <template #header> BCMs/Edit </template>
        <form
            @submit.prevent="update"
            class="w-full max-w-screen-md mx-auto p-6 bg-gray-50 rounded-lg shadow-md"
        >
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-6 sm:col-span-3 md:col-span-3">
                    <label class="label">New Bcm</label>
                    <select v-model="form.employee_id" class="input">
                        <option
                            v-for="manager in investmentManagers"
                            :key="manager.employee_id"
                            :value="manager.employee_id"
                        >
                            {{ manager.first_name }}
                            {{ manager.last_name }}
                        </option>
                    </select>
                    <div v-if="form.errors.employee_id" class="input-error">
                        please select new BCM
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-3 md:col-span-3">
                    <label class="label">Zonal Manager</label>
                    <select v-model="form.zm_id" class="input">
                        <option
                            v-for="zm in zms"
                            :key="zm.zm_id"
                            :value="zm.zm_id"
                        >
                            {{ zm.employee.first_name }}
                            {{ zm.employee.last_name }}
                        </option>
                        <!-- <option :value="null">None</option> -->
                    </select>
                    <div v-if="form.errors.zm_id" class="input-error">
                        Zonal manager field is required
                    </div>
                </div>

                <div class="col-span-6">
                    <button type="submit" class="btn-primary">Update</button>
                </div>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    investmentManagers: Array,
    zms: Array,
    bcm: Object,
});

const form = useForm({
    employee_id: props.bcm.employee_id ?? null,
    zm_id: props.bcm.zm_id ?? null,
});

const update = () => form.put(route("bcm.update", props.bcm.bcm_id));
</script>

<style scope>
label {
    margin-right: 2em;
}
div {
    padding: 2px;
}
</style>
