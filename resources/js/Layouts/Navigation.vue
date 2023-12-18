<template>
    <div
        :class="$page.props.showingMobileMenu ? 'block' : 'hidden'"
        @click="$page.props.showingMobileMenu = false"
        class="fixed inset-0 z-20 bg-black opacity-50 transition-opacity lg:hidden"
    ></div>

    <div
        :class="
            $page.props.showingMobileMenu
                ? 'translate-x-0 ease-out'
                : '-translate-x-full ease-in'
        "
        class="overflow-y-auto fixed inset-y-0 left-0 z-30 w-64 bg-purple-900 transition duration-300 transform lg:translate-x-0 lg:static lg:inset-0"
    >
        <div class="flex justify-center items-center mt-8">
            <div class="flex items-center">
                <i class="fas fa-tachometer-alt w-12 h-12 text-white"></i>
                <span class="mx-2 text-2xl font-semibold text-white"
                    >Dashboard</span
                >
            </div>
        </div>

        <nav class="mt-10" x-data="{ isMultiLevelMenuOpen: false }">
            <nav-link
                :href="route('dashboard')"
                :active="route().current('dashboard')"
            >
                <template #icon>
                    <i class="fas fa-chart-line w-6 h-6"></i>
                </template>
                Dashboard
            </nav-link>

            <nav-link
                :href="route('employee.index')"
                :active="
                    route().current('employee.index') ||
                    route().current('employee.create') ||
                    route().current('employee.edit')
                "
            >
                <template #icon>
                    <i class="fas fa-users w-5 h-5"></i>
                </template>
                Employees
            </nav-link>

            <a
                class="flex items-center mt-4 py-2 px-6 text-gray-100"
                href="#"
                @click="showingTwoLevelMenu = !showingTwoLevelMenu"
                :class="{ 'bg-white bg-opacity-25': isTeamManagementActive }"
            >
                <i class="fas fa-users-cog w-5 h-5"></i>
                <span class="mx-3">Team Management</span>
            </a>

            <!-- ... (existing code) ... -->

            <transition
                enter-to-class="transition-all duration-300 ease-in-out"
                enter-from-class="max-h-0 opacity-25"
                leave-from-class="opacity-100 max-h-xl"
                leave-to-class="max-h-0 opacity-0"
            >
                <div v-show="showingTwoLevelMenu">
                    <ul
                        class="overflow-hidden p-2 mx-4 mt-2 space-y-2 text-sm font-medium text-white bg-gray-700 bg-opacity-50 rounded-md shadow-inner"
                        aria-label="submenu"
                    >
                        <li class="px-2 py-1 transition-colors duration-150">
                            <Link class="w-full" :href="route('team.index')">
                                <i class="fas fa-users w-5 h-5"></i> Teams
                            </Link>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150">
                            <Link class="w-full" :href="route('bcm.index')">
                                <i class="fas fa-building w-5 h-5"></i> Bcms
                            </Link>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150">
                            <Link class="w-full" :href="route('zm.index')">
                                <i class="fas fa-user-tie w-5 h-5"></i> Zms
                            </Link>
                        </li>
                    </ul>
                </div>
            </transition>

            <!-- <nav-link
                :href="route('team.index')"
                :active="route().current('team.index')"
            >
                <template #icon>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        height="16"
                        width="20"
                        viewBox="0 0 640 512"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            fill="white"
                            d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 
                            288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 
                            65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 
                            0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 
                            32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 
                            112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 
                            56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 
                            32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 
                            42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 
                            17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z"
                        />
                    </svg>
                </template>
                Teams
            </nav-link> -->
            <a
                class="flex items-center mt-4 py-2 px-6 text-gray-100"
                href="#"
                @click="showingSaleManagementMenu = !showingSaleManagementMenu"
                :class="{ 'bg-white bg-opacity-25': isSaleManagementActive }"
            >
                <i class="fa-solid fa-money-check-dollar"></i>
                <span class="mx-3">Sale Management</span>
            </a>

            <transition
                enter-to-class="transition-all duration-300 ease-in-out"
                enter-from-class="max-h-0 opacity-25"
                leave-from-class="opacity-100 max-h-xl"
                leave-to-class="max-h-0 opacity-0"
            >
                <div v-show="showingSaleManagementMenu">
                    <ul
                        class="overflow-hidden p-2 mx-4 mt-2 space-y-2 text-sm font-medium text-white bg-gray-700 bg-opacity-50 rounded-md shadow-inner"
                        aria-label="sale-management-submenu"
                    >
                        <li class="px-2 py-1 transition-colors duration-150">
                            <Link class="w-full" :href="route('team.index')">
                                <i class="fas fa-dollar-sign w-5 h-5"></i> Sales
                            </Link>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150">
                            <Link class="w-full" :href="route('team.index')">
                                <i
                                    class="fas fa-file-invoice-dollar w-5 h-5"
                                ></i>
                                Invoices
                            </Link>
                        </li>
                        <!-- Add more submenu items as needed -->
                    </ul>
                </div>
            </transition>
            <nav-link
                :href="route('users.index')"
                :active="route().current('users.index')"
            >
                <template #icon>
                    <i class="fas fa-user w-5 h-5"></i>
                </template>
                Users
            </nav-link>

            <nav-link :href="route('about')" :active="route().current('about')">
                <template #icon>
                    <i class="fas fa-info-circle w-5 h-5"></i>
                </template>
                About us
            </nav-link>
        </nav>
    </div>
</template>

<script setup>
import NavLink from "@/Components/NavLink.vue";
import { Link } from "@inertiajs/vue3";
import { ref, computed } from "vue";

let showingTwoLevelMenu = ref(false);
let showingSaleManagementMenu = ref(false);

const isTeamManagementActive = computed(() => {
    const teamManagementRoutes = [
        "team.index",
        "team.create",
        "team.edit",
        "team.show",
        "bcm.index",
        "bcm.create",
        "bcm.edit",
        "bcm.show",
        "zm.index",
        "zm.create",
        "zm.edit",
        "zm.show",
    ];
    return teamManagementRoutes.some((routeName) => route().current(routeName));
});

const isSaleManagementActive = computed(() => {
    const saleManagementRoutes = [];
    return saleManagementRoutes.some((routeName) => route().current(routeName));
});
</script>

<style scoped></style>
