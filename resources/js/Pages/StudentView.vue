<script setup>
import NavBar from "../Components/NavBar.vue";
import Header from "../Components/Header.vue";
import { Navigation, Pagination } from "swiper";
import { Swiper, SwiperSlide } from "swiper/vue";
import Chart from "../Components/LineChart.vue";
import { ref } from "vue";

// Import Swiper styles
import "swiper/css";
import "swiper/css/bundle";
//

let segment = ref(1);

// Studnet Line Chart

let days = [];
let examMark = [];
for (let index = 0; index < 11; index++) {
    days.push("Aug " + [index + 1]);
}
for (let index = 0; index < 11; index++) {
    examMark.push(index);
}
console.log(days);
console.log();

const chartOptions = ref({
    chart: {
        toolbar: {
            show: false,
        },
        id: "basic-bar",
    },
    grid: {
        borderColor: "#fff",
        row: {
            colors: ["#fff", ""],
            opacity: 0,
        },
    },
    title: {
        text: "Over All",
        style: {
            color: "#ffffff",
        },
        align: "left",
    },
    stroke: {
        curve: "smooth",
    },
    dataLabels: {
        enabled: true,
    },
    xaxis: {
        categories: days,
        title: {
            text: "Days",
        },
        labels: {
            style: {
                colors: [
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                ],
            },
        },
        min: 0,
        max: 11,
    },
    yaxis: {
        title: {
            text: "Mark",
            style: {
                color: "#ffffff",
            },
        },
        labels: {
            style: {
                colors: [
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                    "#ffffff",
                ],
            },
        },

        min: 0,
        max: 11,
    },
});
const series = ref([
    {
        name: "series-1",
        data: examMark,
    },
]);

const props = defineProps({
    students: {
        type: Object,
    },
});
let studentDetail = props.students;
console.log(studentDetail);
</script>

<template>
    <!-------------------- Navbar&header -------------------->
    <NavBar />
    <Header />
    <!---------------- body ----------------------->
    <div
        class="absolute h-screen w-5/6 headercustomleft top-32 bg-primaryBackground"
    >
        <div class="flex flex-col items-center">
            <!-- Student Card Start -->
            <div
                class="bg-elementBackground flex md:flex-row flex-col justify-center items-center md:justify-around p-5 w-full lg:w-3/6 mb-16 h-full md:h-96 text-whiteTextColor rounded-3xl border-2 border-slate-300"
            >
                <div class="items-center justify-center flex px-4 md:w-3/6">
                    <img
                        src="../../../public/img/studentpp.jpeg"
                        alt=""
                        srcset=""
                        class="w-32 rounded-full"
                    />
                </div>
                <div class="bg-white md:w-0.5 md:h-5/6 w-5/6 h-0.5 mt-6"></div>
                <div class="items-center w-full md:3/6 md:space-y-4 space-y-2">
                    <h3 class="text-3xl font-bold justify-center flex mt-7">
                        {{ studentDetail.name }}
                    </h3>
                    <div class="items-center flex flex-row mb-2 md:gap-8">
                        <div class="w-2/6 md:justify-end justify-start flex">
                            <p class="md:text-base text-sm font-semibold">
                                Class
                            </p>
                        </div>

                        <div
                            class="w-4/6 flex flex-row jstify-center text-sm underline-offset-4 underline text-yellowTextColor"
                        >
                            <a href="">Java</a>
                            <!-- <a href="">Japanese</a>
                            <a href="">WebDev</a>
                            <a href="">SEJ</a> -->
                        </div>
                    </div>
                    <div class="items-center flex flex-row mb-2 md:gap-8">
                        <div class="w-2/6 md:justify-end justify-start flex">
                            <p class="md:text-base text-sm font-semibold">
                                Address
                            </p>
                        </div>

                        <div class="w-4/6 flex flex-row jstify-center">
                            <p>{{ studentDetail.address }}</p>
                        </div>
                    </div>
                    <div class="items-center flex flex-row mb-2 md:gap-8">
                        <div class="w-2/6 md:justify-end justify-start flex">
                            <p class="md:text-base text-sm font-semibold">
                                Ph No.
                            </p>
                        </div>

                        <div class="w-4/6 flex flex-row jstify-center">
                            <p>{{ studentDetail.phone }}</p>
                        </div>
                    </div>
                    <div class="items-center flex flex-row mb-2 md:gap-8">
                        <div class="w-2/6 md:justify-end justify-start flex">
                            <p class="md:text-base text-sm font-semibold">
                                Age
                            </p>
                        </div>

                        <div class="w-4/6 flex flex-row jstify-center">
                            <p>{{ studentDetail.age }}</p>
                        </div>
                    </div>
                    <div class="items-center flex flex-row mb-2 md:gap-8">
                        <div class="w-2/6 md:justify-end justify-start flex">
                            <p class="md:text-base text-sm font-semibold">
                                Email
                            </p>
                        </div>

                        <div class="w-4/6 flex flex-row jstify-center">
                            <p>{{ studentDetail.email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card End -->
            <div class="text-white w-11/12 text-4xl border-white border-t pt-6">
                <h2>2 Classes Joined</h2>
            </div>
            <!-- Student Swiper Slide Start -->
            <swiper
                :slides-per-view="1"
                :space-between="50"
                :modules="[Navigation, Pagination]"
                navigation
                :pagination="{ clickable: true, dynamicBullets: ture }"
                grab-cursor
                class="w-5/6 md:4/6"
                @slideChange="
                    (event) => {
                        activeIndex = event.activeIndex;
                    }
                "
            >
                <swiper-slide v-for="n in 3" :key="n" :virtual-index="n">
                    <div
                        class="p-4 md:p-8 lg:w-10/12 xl:w-8/12 md:w-5/6 w-5/6 mx-auto"
                    >
                        <div
                            class="flex flex-col bg-elementBackground rounded-3xl border-2 border-slate-300 lg:space-y-14 space-y-10 text-white md:p-8 p-5 w-full mb-4 md:mb-0 overflow-hidden card"
                        >
                            <div
                                class="flex flex-col justify-between items-center"
                            >
                                <div class="flex flex-col space-y-3">
                                    <h1
                                        class="font-medium text-lg md:text-4xl tracking-wide"
                                    >
                                        {{ studentDetail.name }}
                                    </h1>
                                </div>
                                <div
                                    class="relative flex flex-col lg:flex-row space-y-3 items-center justify-between w-full"
                                >
                                    <div
                                        class="md:flex flex-col items-center justify-center hidden"
                                    >
                                        <p
                                            class="text-yellowTextColor font-bold text-xl md:text-4xl"
                                        >
                                            80%
                                        </p>
                                        <p
                                            class="text-lg md:text-xl font-medium md:font-semibold"
                                        >
                                            Attendance
                                        </p>
                                    </div>
                                    <div
                                        class="relative flex flex-row items-center justify-center"
                                    >
                                        <svg
                                            width="80"
                                            height="90"
                                            viewBox="0 0 114 130"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M33.21 4.55C42.0257 2.15313 51.3938 0 57 0C62.6063 0 71.9744 2.15313 80.79 4.55C89.8088 6.9875 98.9007 9.87187 104.247 11.6187C106.482 12.3569 108.464 13.7107 109.964 15.5244C111.465 17.3382 112.423 19.5385 112.729 21.8725C117.572 58.2481 106.335 85.2069 92.7013 103.041C86.9199 110.67 80.0262 117.389 72.2507 122.972C69.562 124.904 66.7133 126.603 63.7357 128.05C61.4607 129.122 59.015 130 57 130C54.985 130 52.5475 129.122 50.2644 128.05C47.2867 126.603 44.438 124.904 41.7494 122.972C33.974 117.389 27.0804 110.67 21.2988 103.041C7.66504 85.2069 -3.57183 58.2481 1.27067 21.8725C1.57688 19.5385 2.53527 17.3382 4.03574 15.5244C5.53622 13.7107 7.51791 12.3569 9.75317 11.6187C17.5141 9.07407 25.3353 6.71714 33.21 4.55Z"
                                                fill="#FFC652"
                                            />
                                        </svg>
                                        <p
                                            class="text-4xl font-bold rank absolute text-blackTextColor"
                                        >
                                            10
                                        </p>
                                    </div>
                                    <div
                                        class="flex flex-col items-center justify-center md:hidden"
                                    >
                                        <p
                                            class="text-yellowTextColor font-bold text-xl md:text-4xl"
                                        >
                                            80%
                                        </p>
                                        <p
                                            class="text-lg md:text-xl font-medium md:font-semibold"
                                        >
                                            Attendance
                                        </p>
                                    </div>
                                    <div
                                        class="flex flex-col items-center justify-center"
                                    >
                                        <p
                                            class="text-yellowTextColor font-bold text-xl md:text-4xl"
                                        >
                                            70%
                                        </p>
                                        <p
                                            class="text-base sm:text-lg md:text-xl font-medium md:font-semibold"
                                        >
                                            Daily Exam Work
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="mt-10 flex justify-center items-center space-y-4"
                                >
                                    <div class="text-xl font-semibold">
                                        Batch 6 N4
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
            </swiper>

            <!-- Student Swiper Slide End -->
            <!-- Student Table Start -->
            <div class="md:w-4/6 w-full flex flex-col h-full mt-10">
                <div class="w-full h-full flex flex-row text-white text-center">
                    <!-- <button @click="hello()">Tabe change</button> -->
                    <div
                        class="md:w-4/6 w-full h-12 rounded-tl-xl bg-elementBackground pt-3 md:text-xl"
                        @click="segment = 1"
                    >
                        Overall Table
                    </div>
                    <div
                        class="md:w-4/6 w-full h-12 rounded-tr-xl pt-3 bg-green-300 md:text-xl"
                        @click="segment = 2"
                    >
                        Self Rank
                    </div>
                </div>
                <div
                    v-if="segment == 1"
                    class="overflow-x-auto relative w-full"
                >
                    <table class="w-full text-sm text-left text-whiteTextColor">
                        <thead
                            class="text-lg font-semibold uppercase bg-elementBackground"
                        >
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Product name
                                </th>
                                <th scope="col" class="py-3 px-6">Color</th>
                                <th scope="col" class="py-3 px-6">Category</th>
                                <th scope="col" class="py-3 px-6">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-gray-800" v-for="n in 12" :key="n">
                                <th
                                    scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                >
                                    Apple MacBook Pro 17"
                                </th>

                                <td class="py-4 px-6">Blue</td>
                                <td class="py-4 px-6">Laptop</td>
                                <td class="py-4 px-6">$2999</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Student Table End -->
            <!-- Student Self Rank Chart Start-->
            <div
                v-if="segment == 2"
                class="md:w-4/6 w-full flex flex-col h-96 bg-elementBackground justify-center items-center"
            >
                <Chart :options="chartOptions" :series="series" class="chart" />
            </div>
            <!-- Student Self Rank Chart end-->
            <div class="w-4/6 text-white justify-start mt-5 mb-10">
                <button>
                    <a
                        href=""
                        class="underline underline-offset-4 hidden md:block"
                        >BACK
                    </a>
                </button>
            </div>
        </div>
    </div>
</template>
