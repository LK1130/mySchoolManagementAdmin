<template>
    <div class="fixed headercustomleft w-full h-32 customblack z-10">
        <div class="flex justify-between py-8 px-6">
            <div class="ml-5">
                <div class="text-white text-xl flex flex-row">
                    <span>{{ year }}/{{ month }}/{{ date }}</span>
                    <span class="ml-1"
                        >{{ hour }}:{{ minute }}:{{ seconds }}</span
                    >
                    <span class="ml-1">({{ day }})</span>
                </div>
                <div class="flex flex-row mt-10">
                    <div
                        class="text-white font-bold sm:text-2xl text-sm"
                        :class="{ dpnone: classaddmode }"
                    >
                        {{ headername }}
                    </div>
                </div>
            </div>

            <div class="flex text-white">
                <div class="">
                    <div class="text-xl">{{ $page.props.auth.username }}</div>
                    <div
                        class="opacity-80 text-right font-semibold sm:text-base md:text-lg text-yellowTextColor"
                    >
                        {{ $page.props.auth.userrole }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";
export default {
    data() {
        return {
            condition: true,
            year: 0,
            month: 0,
            date: 0,
            day: "",
            hour: 0,
            minute: 0,
            seconds: 0,
            message: "",
        };
    },
    methods: {
        gettime() {
            setInterval(() => {
                var today = new Date();
                this.seconds = moment().format('ss');
                this.minute = moment().format('mm');
                this.hour = moment().format('hh');
                this.year = moment().format('YYYY');
                this.month = moment().format('MM');
                this.date = moment().format('DD');
                this.day = moment().format('ddd');
                // switch (days) {
                //     case 0:
                //         this.day = "SUN";
                //         break;

                //     case 1:
                //         this.day = "MON";
                //         break;

                //     case 2:
                //         this.day = "TUE";
                //         break;

                //     case 3:
                //         this.day = "WED";
                //         break;

                //     case 4:
                //         this.day = "THU";
                //         break;

                //     case 5:
                //         this.day = "FRI";
                //         break;

                //     case 6:
                //         this.day = "SAT";
                //         break;
                // }
            }, 1000);
        },
        show() {
            console.log("text");
        },
    },
    props: {
        classid: Number,
        headername: String,
        classviewmode: Boolean,
        classaddmode: Boolean,
    },
    mounted() {
        this.gettime();
    },
};
</script>

<style scoped>
.btnblock {
    display: block !important;
}
.addclasscss {
    background-color: #2b2b2b;
    border: 1px solid white;
    border-radius: 1em;
    width: 52%;
}
.classnameinput {
    background-color: #2b2b2b;
    border-radius: 1em;
    border: #2b2b2b;
    width: 90%;
}
.classnameinput:focus {
    border: #2b2b2b;
}
.dpnone {
    display: none;
}
@media screen and (max-width: 640px) {
    .addclasscss {
        width: 90%;
    }
}
</style>
