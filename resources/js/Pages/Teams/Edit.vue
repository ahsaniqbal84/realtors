<template>
    <Head title="Teams/edit" />

    <AuthenticatedLayout>
        <form
            @submit.prevent="update"
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
                            {{ bcm.first_name }} {{ bcm.last_name }}
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
    bcms: Array,
    team: Object,
    zms: Array,
});

const form = useForm({
    name: props.team.name,
    bcm_id: props.team.bcm_id,
    zm: null,
    zm_id: null,
});

const update = () => form.put(route("team.update", { id: props.team.team_id }));

const updateZMs = async (bcmId) => {
    console.log(bcmId);
    if (bcmId) {
        // Find the corresponding bcm in the list
        const selectedBcm = props.bcms.find((bcm) => bcm.bcm_id === bcmId);
        // Check if the selected bcm exists and has a zm_id
        if (selectedBcm && selectedBcm.zm_id) {
            form.zm =
                selectedBcm.zonal_manager_first_name +
                " " +
                selectedBcm.zonal_manager_last_name;
        } else {
            form.zm = null;
        }
    } else {
        form.zm = null;
    }
};

if (props.team.bcm_id) {
    updateZMs(props.team.bcm_id);
}
</script>

<style scope>
label {
    margin-right: 2em;
}
div {
    padding: 2px;
}
</style>
