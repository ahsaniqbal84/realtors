<template>
    <header
        class="flex items-center justify-between border-b-4 border-purple-900 bg-purple-600 text-white px-6 py-4"
    >
        <div class="flex items-center">
            <button
                @click="
                    $page.props.showingMobileMenu =
                        !$page.props.showingMobileMenu
                "
                class="text-white focus:outline-none lg:hidden"
            >
                <svg
                    class="h-6 w-6"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M4 6H20M4 12H20M4 18H11"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </button>
            <button @click="goBack" class="text-white focus:outline-none mr-4">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="40"
                    height="30"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M19 12H6M12 5l-7 7 7 7"></path>
                </svg>
            </button>

            <button
                v-if="canGoForward"
                @click="goForward"
                class="text-white focus:outline-none"
            >
                <!-- SVG for forward arrow -->
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="40"
                    height="30"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M5 12h13M12 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>

        <div class="flex items-center">
            <dropdown>
                <template #trigger>
                    <button
                        @click="dropdownOpen = !dropdownOpen"
                        class="relative block overflow-hidden"
                    >
                        {{ $page.props.auth.user.user_name }}
                    </button>
                </template>

                <template #content>
                    <dropdown-link :href="route('profile.edit')">
                        Profile
                    </dropdown-link>

                    <dropdown-link
                        class="w-full text-left"
                        :href="route('logout')"
                        method="post"
                        as="button"
                    >
                        Log out
                    </dropdown-link>
                </template>
            </dropdown>
        </div>
    </header>
</template>

<script setup>
import { useRouter } from "vue-router";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";

const router = useRouter();

const goBack = () => {
    router.go(-1); // Go back one step in history
};

const goForward = () => {
    router.go(1); // Go forward one step in history
};

let canGoForward = true;
</script>
