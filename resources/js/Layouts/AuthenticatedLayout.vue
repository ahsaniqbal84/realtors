<template>
    <!-- <div v-if="flashSuccess" class="success">
        {{ flashSuccess }}
    </div> -->
    <div class="flex h-screen bg-indigo-800 font-roboto">
        <Navigation />

        <div class="flex flex-1 flex-col overflow-hidden">
            <Header />

            <main class="flex-1 overflow-y-auto overflow-x-auto bg-white">
                <div class="container mx-auto px-6 py-8">
                    <h3 class="mb-4 text-3xl font-medium text-gray-700">
                        <slot name="header" />
                    </h3>

                    <slot />
                </div>
            </main>
        </div>
    </div>
</template>

<script setup>
import Header from "@/Layouts/Header.vue";
import Navigation from "@/Layouts/Navigation.vue";
import { usePage } from "@inertiajs/vue3";
import { computed } from "@vue/reactivity";
import { inject, watch } from "vue";

const page = usePage();
const flashSuccess = computed(() => page.props.flash.success);
const swal = inject("$swal");

watch(flashSuccess, (newVal) => {
    console.log(" new val is " + newVal);
    if (newVal) {
        showAlertDialog(newVal);
    }
});

function showAlertDialog(message) {
    swal.fire({
        icon: "success",
        title: message,
        showConfirmButton: false,
        timer: 1500,
    });
}
if (flashSuccess.value) {
    swal.fire({
        icon: "success",
        title: flashSuccess.value,
        showConfirmButton: false,
        timer: 1500,
    });
}
</script>

<!-- <style scoped>
.success {
    background-color: green;
    color: white;
}
</style> -->
