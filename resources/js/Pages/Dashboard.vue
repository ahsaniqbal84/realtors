<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header> Dashboard </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">You're logged in!</div>
        </div>
        <!--Screen-->
        <div class="min-h-screen flex flex-col">
            <div class="flex flex-1">
                <!--Main-->
                <div class="bg-white-300 flex-1 p-3 overflow-hidden">
                    <div class="flex flex-col">
                        <!-- Stats Row Starts Here -->
                        <div
                            class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2"
                        >
                            <div
                                class="shadow-lg bg-violet-500 border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2"
                            >
                                <div class="p-4 flex flex-col">
                                    <a
                                        href="#"
                                        class="no-underline text-white text-2xl"
                                    >
                                        $244
                                    </a>
                                    <a
                                        href="#"
                                        class="no-underline text-white text-lg"
                                    >
                                        Total Sales
                                    </a>
                                </div>
                            </div>

                            <div
                                class="shadow bg-blue-500 border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2"
                            >
                                <div class="p-4 flex flex-col">
                                    <a
                                        href="#"
                                        class="no-underline text-white text-2xl"
                                    >
                                        $199.4
                                    </a>
                                    <a
                                        href="#"
                                        class="no-underline text-white text-lg"
                                    >
                                        Total Expenses
                                    </a>
                                </div>
                            </div>

                            <div
                                class="shadow bg-red-500 border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2"
                            >
                                <div class="p-4 flex flex-col">
                                    <a
                                        href="#"
                                        class="no-underline text-white text-2xl"
                                    >
                                        900
                                    </a>
                                    <a
                                        href="#"
                                        class="no-underline text-white text-lg"
                                    >
                                        Total Agents
                                    </a>
                                </div>
                            </div>

                            <div
                                class="shadow bg-green-500 border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2"
                            >
                                <div class="p-4 flex flex-col">
                                    <a
                                        href="#"
                                        class="no-underline text-white text-2xl"
                                    >
                                        50
                                    </a>
                                    <a
                                        href="#"
                                        class="no-underline text-white text-lg"
                                    >
                                        Total Teams
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- /Stats Row Ends Here -->

                        <!-- Card Sextion Starts Here -->
                        <div
                            class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2"
                        >
                            <!-- card -->

                            <div
                                class="rounded overflow-hidden shadow bg-white mx-2 w-full"
                            >
                                <div
                                    class="px-6 py-2 border-b border-light-grey"
                                >
                                    <div class="font-bold text-xl">Teams</div>
                                </div>
                                <div class="table-responsive">
                                    <table
                                        class="table text-grey-darkest w-full"
                                    >
                                        <thead
                                            class="bg-grey-dark text-white text-normal"
                                        >
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Item</th>
                                                <th scope="col">Last</th>
                                                <th scope="col">Current</th>
                                                <th scope="col">Change</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>
                                                    <button
                                                        class="bg-blue-500 hover:bg-blue-800 text-white font-light py-1 px-2 rounded-full"
                                                    >
                                                        Team 1
                                                    </button>
                                                </td>
                                                <td>4500</td>
                                                <td>4600</td>
                                                <td>
                                                    <span class="text-green-500"
                                                        ><i
                                                            class="fas fa-arrow-up"
                                                        ></i
                                                        >5%</span
                                                    >
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>
                                                    <button
                                                        class="bg-green-500 hover:bg-primary-dark text-white font-light py-1 px-2 rounded-full"
                                                    >
                                                        Team 2
                                                    </button>
                                                </td>
                                                <td>10000</td>
                                                <td>3000</td>
                                                <td>
                                                    <span class="text-red-500"
                                                        ><i
                                                            class="fas fa-arrow-down"
                                                        ></i
                                                        >65%</span
                                                    >
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">3</th>
                                                <td>
                                                    <button
                                                        class="bg-red-500 hover:bg-success-dark text-white font-light py-1 px-2 rounded-full"
                                                    >
                                                        Team 3
                                                    </button>
                                                </td>
                                                <td>10000</td>
                                                <td>3000</td>
                                                <td>
                                                    <span class="text-red-500"
                                                        ><i
                                                            class="fas fa-arrow-down"
                                                        ></i
                                                        >65%</span
                                                    >
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">4</th>
                                                <td>
                                                    <button
                                                        class="bg-blue-500 hover:bg-blue-800 text-white font-light py-1 px-2 rounded-full"
                                                    >
                                                        Team 4
                                                    </button>
                                                </td>
                                                <td>10000</td>
                                                <td>3000</td>
                                                <td>
                                                    <span class="text-green-500"
                                                        ><i
                                                            class="fas fa-arrow-up"
                                                        ></i
                                                        >65%</span
                                                    >
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /card -->
                        </div>
                        <!-- /Cards Section Ends Here -->

                        <!-- Progress Bar -->
                        <div
                            class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 mt-2"
                        >
                            <div
                                class="rounded overflow-hidden shadow bg-white mx-2 w-full pt-2"
                            >
                                <div
                                    class="px-6 py-2 border-b border-light-grey"
                                >
                                    <div class="font-bold text-xl">
                                        Projects
                                    </div>
                                </div>
                                <div class="">
                                    <div class="w-full">
                                        <div
                                            class="shadow w-full bg-grey-light"
                                        >
                                            <div
                                                class="bg-blue-500 text-xs leading-none py-1 text-center text-white"
                                                style="width: 45%"
                                            >
                                                45%
                                            </div>
                                        </div>

                                        <div
                                            class="shadow w-full bg-grey-light mt-2"
                                        >
                                            <div
                                                class="bg-teal-500 text-xs leading-none py-1 text-center text-white"
                                                style="width: 55%"
                                            >
                                                55%
                                            </div>
                                        </div>

                                        <div
                                            class="shadow w-full bg-grey-light mt-2"
                                        >
                                            <div
                                                class="bg-orange-500 text-xs leading-none py-1 text-center text-white"
                                                style="width: 65%"
                                            >
                                                65%
                                            </div>
                                        </div>

                                        <div
                                            class="shadow w-full bg-grey-300 mt-2"
                                        >
                                            <div
                                                class="bg-red-800 text-xs leading-none py-1 text-center text-white"
                                                style="width: 75%"
                                            >
                                                75%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Profile Tabs-->
                        <div
                            class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 p-1 mt-2 mx-auto lg:mx-2 md:mx-2 justify-between"
                        >
                            <!--Top user 1-->
                            <div
                                class="rounded rounded-t-lg overflow-hidden shadow max-w-xs my-3"
                            >
                                <img
                                    src="https://therichpost.com/wp-content/uploads/2021/04/flip-1.jpg"
                                    alt=""
                                    class="w-full"
                                />
                                <div class="flex justify-center -mt-8">
                                    <img
                                        src="https://therichpost.com/wp-content/uploads/2021/03/avatar3.png"
                                        alt=""
                                        class="responsvie-img rounded-full border-solid border-white border-2 -mt-3"
                                    />
                                </div>
                                <div class="text-center px-3 pb-6 pt-2">
                                    <h3
                                        class="text-black text-sm bold font-sans"
                                    >
                                        Olivia Dunham
                                    </h3>
                                    <p
                                        class="mt-2 font-sans font-light text-grey-700"
                                    >
                                        Hello, i'm from another the other side!
                                    </p>
                                </div>
                                <div
                                    class="flex justify-center pb-3 text-grey-dark"
                                >
                                    <div class="text-center mr-3 border-r pr-3">
                                        <h2>34</h2>
                                        <span>Photos</span>
                                    </div>
                                    <div class="text-center">
                                        <h2>42</h2>
                                        <span>Friends</span>
                                    </div>
                                </div>
                            </div>
                            <!--Top user 2-->
                            <div
                                class="rounded rounded-t-lg overflow-hidden shadow max-w-xs my-3"
                            >
                                <img
                                    src="https://therichpost.com/wp-content/uploads/2021/04/flip-2.jpg"
                                    alt=""
                                    class="w-full"
                                />
                                <div class="flex justify-center -mt-8">
                                    <img
                                        src="https://therichpost.com/wp-content/uploads/2021/03/avatar6.png"
                                        alt=""
                                        class="responsvie-img rounded-full border-solid border-white border-2 -mt-3"
                                    />
                                </div>
                                <div class="text-center px-3 pb-6 pt-2">
                                    <h3
                                        class="text-black text-sm bold font-sans"
                                    >
                                        Olivia Dunham
                                    </h3>
                                    <p
                                        class="mt-2 font-sans font-light text-grey-dark"
                                    >
                                        Hello, i'm from another the other side!
                                    </p>
                                </div>
                                <div
                                    class="flex justify-center pb-3 text-grey-dark"
                                >
                                    <div class="text-center mr-3 border-r pr-3">
                                        <h2>34</h2>
                                        <span>Photos</span>
                                    </div>
                                    <div class="text-center">
                                        <h2>42</h2>
                                        <span>Friends</span>
                                    </div>
                                </div>
                            </div>
                            <!--Top user 3-->
                            <div
                                class="rounded rounded-t-lg overflow-hidden shadow max-w-xs my-3"
                            >
                                <img
                                    src="https://therichpost.com/wp-content/uploads/2021/04/flip-3.jpg"
                                    alt=""
                                    class="w-full"
                                />
                                <div class="flex justify-center -mt-8">
                                    <img
                                        src="https://therichpost.com/wp-content/uploads/2021/03/avatar8.png"
                                        alt=""
                                        class="responsvie-img rounded-full border-solid border-white border-2 -mt-3"
                                    />
                                </div>
                                <div class="text-center px-3 pb-6 pt-2">
                                    <h3
                                        class="text-black text-sm bold font-sans"
                                    >
                                        Olivia Dunham
                                    </h3>
                                    <p
                                        class="mt-2 font-sans font-light text-grey-dark"
                                    >
                                        Hello, i'm from another the other side!
                                    </p>
                                </div>
                                <div
                                    class="flex justify-center pb-3 text-grey-dark"
                                >
                                    <div class="text-center mr-3 border-r pr-3">
                                        <h2>34</h2>
                                        <span>Photos</span>
                                    </div>
                                    <div class="text-center">
                                        <h2>42</h2>
                                        <span>Friends</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/Profile Tabs-->
                    </div>
                </div>
                <!--/Main-->
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>
