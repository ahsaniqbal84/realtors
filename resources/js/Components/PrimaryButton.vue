<template>
    <button
        :type="type"
        class="rounded-md bg-purple-700 px-4 py-2 text-center text-sm text-white hover:bg-purple-500"
    >
        <slot />
    </button>
</template>

<script setup>
defineProps({
    type: {
        type: String,
        default: "submit",
    },
});
</script>
