<template>
    <Head title="Employees/create" />

    <AuthenticatedLayout>
        <template #header> Teams/Create </template>
        <form
            @submit.prevent="create"
            class="w-full max-w-screen-md mx-auto p-6 bg-gray-50 rounded-lg shadow-md"
        >
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-6 sm:col-span-3 md:col-span-3">
                    <label class="label">Team Name</label>
                    <input type="text" v-model="form.name" class="input" />
                    <div v-if="form.errors.name" class="input-error">
                        {{ form.errors.name }}
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-3 md:col-span-3">
                    <label class="label">Office</label>
                    <select v-model="form.office_id" class="input">
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

                <div class="col-span-6 sm:col-span-3 md:col-span-3">
                    <label class="label">Bcm</label>
                    <select
                        v-model="form.bcm_id"
                        class="input"
                        @change="updateZMs(form.bcm_id)"
                    >
                        <option
                            v-for="bcm in bcms"
                            :key="bcm.bcm_id"
                            :value="bcm.bcm_id"
                        >
                            {{ bcm.employee.first_name }}
                            {{ bcm.employee.last_name }} BCM-{{ bcm.bcm_id }}
                        </option>
                        <option :value="null">None</option>
                    </select>
                    <div v-if="form.errors.bcm_id" class="input-error">
                        {{ form.errors.bcm_id }}
                    </div>
                </div>

                <div
                    v-if="form.zm"
                    class="col-span-6 sm:col-span-3 md:col-span-3"
                >
                    <label class="label">Zm</label>
                    <!-- <select v-model="form.zm" class="input">
                        <option :value="form.zm">{{ form.zm }}</option>
                    </select> -->
                    <input v-model="form.zm" class="input" readonly />
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
import { reactive } from "vue";
//import { useForm } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const form = useForm({
    name: null,
    office_id: null,
    bcm_id: null,
    zm: null,
    zm_id: null,
});
const props = defineProps({
    bcms: Array,
    offices: Array,
});

const create = () => form.post(route("team.store"));

const updateZMs = (bcmId) => {
    console.log(bcmId);
    if (bcmId) {
        // Find the corresponding bcm in the list
        const selectedBcm = props.bcms.find((bcm) => bcm.bcm_id === bcmId);
        // Check if the selected bcm exists and has a zm_id
        if (selectedBcm && selectedBcm.zm_id) {
            form.zm =
                selectedBcm.zm.employee.first_name +
                " " +
                selectedBcm.zm.employee.last_name;
        } else {
            form.zm = null;
        }
    } else {
        form.zm = null;
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
