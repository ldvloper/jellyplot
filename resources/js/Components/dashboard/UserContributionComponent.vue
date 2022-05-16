<!--
  - Jellyplot Copyright (c) 2022.
  -->

<template>
    <section v-cloak class="bg-white">
        <div class="grid grid-cols-2 gap-2 px-5 py-2 text-primary-color">
            <div class="grid grid-cols-2 gap-4">
                <div class="">
                    <select @change="this.changeLapse" class="w-full capitalize text-black dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md text-xs border-gray-300 dark:border-gray-700" id="lapse"
                            v-model="this.lapse.name">
                        <option v-for="value in lapses" :value="value" >{{ value }}</option>
                    </select>
                </div>
                <!--Year & Month-->
                <div v-if="this.lapse.name === 'year' || this.lapse.name === 'month'" class="flex gap-2 items-center">
                    <!--Month-->
                    <div v-if="this.lapse.name === 'month'" class="flex justify-end items-center">
                        <!--BackMonth
                       <div v-if="this.months[this.month] !== months[0]" @click="this.backMonth()" class="px-1 cursor-pointer">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                           </svg>
                       </div>-->
                       <select class="text-black dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md text-xs border-gray-300 dark:border-gray-700" id="month" v-model="this.month" @change="this.updateMonth()">
                           <option v-for="month in months" :value="this.months.indexOf(month)+1">{{ month }}</option>
                       </select>
                        <!--BackMonth
                          <div v-show="this.months[this.month] !== months[months.length - 1]" @click="this.nextMonth()" class="px-1 cursor-pointer">
                              <svg @click="this.nextYear()" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                              </svg>
                          </div>-->
                  </div>

                  <!--Year-->
                        <!--BackYear
                        <div v-if="this.year !== years[0]" @click="this.backYear()" class="px-1 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </div>
                        -->
                    <select class="text-black dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md text-xs border-gray-300 dark:border-gray-700" id="year" v-model="this.year" @change="this.updateYear()">
                        <option v-for="year in years" :value="year">{{ year }}</option>
                    </select>
                    <!--NextYear
                    <div v-show="this.year !== years[years.length - 1]" @click="this.nextYear()" class="px-1 cursor-pointer">
                        <svg @click="this.nextYear()" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    -->

            </div>

        </div>
        <div>
            <div class="flex justify-end">
                <select @change="this.changeType" class="capitalize text-black dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md text-xs border-gray-300 dark:border-gray-700" id="type"
                        v-model="this.type.name">
                    <option v-for="value in types" :value="value" >{{ value }}</option>
                </select>
            </div>
        </div>




    </div>
    <div class="bg-white p-2 text-black rounded-b-md">
        <canvas id="user-projects-contribution" width="400" height="400"></canvas>
    </div>
</section>
</template>
å
<script>
import Chart from 'chart.js/auto';
const Utils = require("moment");
const MONTHS = ["January", "February", "March", "April", "May", "June",
"July", "August", "September", "October", "November", "December"];
export default {
name: "UserContributionComponent",
props: {
    user: {
        type: [Object, Array],
        required: true,
    },

    team: {
        type: [Object, Array],
        required: true,
    }
},

data: function () {
    return {
        year: new Date(Date.now()).getFullYear(),
        month: new Date().getMonth() + 1,
        lapse: {
            id: 0,
            name:"year",
        },
        type: {
            id: 0,
            name: "line",
        },
        chartLabels: Utils.months(),
    }
},

watch:{
    userProjectsCount(newValue) {
        let array = {
            label: 'Projects',
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgb(255, 99, 132)',
            ],
            borderWidth: 1,
            data: newValue.slice()
        }
        this.chart.data.datasets.push(array);
        this.chart.update(0)
    },

    userResourcesCount(newValue) {
        let array = {
            label: 'Resources',
            backgroundColor: [
                'rgba(255, 205, 86, 0.2)',
            ],
            borderColor: [
                'rgb(255, 159, 64)',
            ],
            borderWidth: 1,
            data: newValue.slice()
        }
        this.chart.data.datasets.push(array);
        this.chart.update(0)
    },

    userCustomersCount(newValue){
        let array = {
            label: 'Customers',
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgb(54, 162, 235)',
            ],
            borderWidth: 1,
            data: newValue.slice()
        }
        this.chart.data.datasets.push(array);
        this.chart.update(0)
    },

    userEquipmentCount(newValue){
        let array = {
            label: 'Equipment',
            backgroundColor: [
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgb(153, 102, 255)',
            ],
            borderWidth: 1,
            data: newValue.slice()
        }
        this.chart.data.datasets.push(array);
        this.chart.update(0)
    }
},

methods: {
    fillData: function () {
        let delayed;
        const ctx = document.getElementById('user-projects-contribution');
        this.chart = new Chart(ctx, {
            type: this.type.name,
            data: {
                labels: this.chartLabels,
                datasets:[],
            },
            options: {
                legend: {
                    labels: {
                        color: "#ffffff",
                        fontSize: 24
                    }
                },
                animation: {
                    onComplete: () => {
                         delayed = true;
                    },
                    delay: (context) => {
                        let delay = 0;
                        if (context.type === 'data' && context.mode === 'default' && !delayed) {
                            delay = context.dataIndex * 300 + context.datasetIndex * 100;
                        }
                        return delay;
                    },
                },
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                        }
                    },
                },
            },

        });
    },

    getApiData: function()
    {
        switch (this.lapse.name) {
            case "year":
                this.chartLabels = Utils.months();
                this.apiContributionRequestYear();
                break;
            case "month":
                let value = new Date(this.year, this.month + 1  ,0).getDate();
                this.chartLabels = Array.from({length: value}, (_, i) => i + 1);
                this.apiContributionRequestMonth();
                break;
            case "today":
                this.chartLabels = this.range(0, 23)
                this.apiContributionRequestDay();
                break;
        }
    },

    range: function (start, end) {
        return Array(end - start + 1). fill(). map((_, idx) => start + idx)
    },



    /**
     * API Requests
     */
    apiContributionRequestYear: function()
    {
        this.$store.dispatch('fetchUserContributionYearProjectsCount',  {'userID': this.user.id, 'yearValue': this.year});
        this.$store.dispatch('fetchUserContributionYearResourcesCount', {'userID': this.user.id, 'yearValue': this.year});
        this.$store.dispatch('fetchUserContributionYearCustomersCount', {'userID': this.user.id, 'yearValue': this.year});
        this.$store.dispatch('fetchUserContributionYearEquipmentCount', {'userID': this.user.id, 'yearValue': this.year});
    },

    apiContributionRequestMonth: function()
    {
        this.$store.dispatch('fetchUserContributionMonthProjectsCount',  {'userID': this.user.id, 'yearValue': this.year, 'monthValue': this.month});
        this.$store.dispatch('fetchUserContributionMonthResourcesCount', {'userID': this.user.id, 'yearValue': this.year, 'monthValue': this.month});
        this.$store.dispatch('fetchUserContributionMonthEquipmentCount', {'userID': this.user.id, 'yearValue': this.year, 'monthValue': this.month});
        this.$store.dispatch('fetchUserContributionMonthCustomersCount', {'userID': this.user.id, 'yearValue': this.year, 'monthValue': this.month});
    },

    apiContributionRequestDay: function()
    {
        let today = new Date().getDate();
        this.$store.dispatch('fetchUserContributionDayProjectsCount',  {'userID': this.user.id, 'yearValue': this.year, 'monthValue': this.month, 'dayValue': today});
        this.$store.dispatch('fetchUserContributionDayResourcesCount', {'userID': this.user.id, 'yearValue': this.year, 'monthValue': this.month, 'dayValue': today});
        this.$store.dispatch('fetchUserContributionDayCustomersCount', {'userID': this.user.id, 'yearValue': this.year, 'monthValue': this.month, 'dayValue': today});
        this.$store.dispatch('fetchUserContributionDayEquipmentCount', {'userID': this.user.id, 'yearValue': this.year, 'monthValue': this.month, 'dayValue': today});
    },

    updateYear: function()
    {
        while (this.chart.data.datasets.length) {
            this.chart.data.datasets.pop();
        }
        this.getApiData();
    },

    updateMonth: function()
    {
        while (this.chart.data.datasets.length) {
            this.chart.data.datasets.pop();
        }
        this.getApiData();
    },

    updateDay: function()
    {
        while (this.chart.data.datasets.length) {
            this.chart.data.datasets.pop();
        }
        this.getApiData();
    },

    changeLapse: function(){
        this.chart.destroy();
        this.getApiData();
        this.fillData()
    },

    changeType: function(){
        this.chart.destroy();
        this.getApiData();
        this.fillData()
    },

    backYear: function (){
        if(this.year !== this.years[0])
        {
            this.year = this.year - 1;
            this.updateYear();
        }
    },

   nextYear: function (){
        if(this.year !== this.years[this.years.length - 1])
        {
            this.year = this.year + 1;
            this.updateYear();
        }
    },

    backMonth: function (){
        if(this.month !== 0)
        {
            this.month = this.month - 1;
            this.updateMonth();
        }
    },

   nextMonth: function (){
        if(this.month !== this.months.length - 1)
        {
            this.month = this.month+ 1;
            this.updateMonth();
        }
    }
},
computed: {

    years: function() {
        const year = new Date().getFullYear()
        return Array.from({length: year - 2009}, (value, index) => 2010 + index)
    },

    months: function() {
        return Utils.months()
    },

    types: function(){
        return ['line','bar', 'radar'];
    },

    lapses: function(){
        return ['year', 'month', 'today']
     },

    userProjectsCount: function (){
         return this.$store.getters.userContributionProjectsCount;
    },
    userResourcesCount: function (){
        return this.$store.getters.userContributionResourcesCount;
    },
    userCustomersCount: function (){
        return this.$store.getters.userContributionCustomersCount;
    },
    userEquipmentCount: function (){
        return this.$store.getters.userContributionEquipmentCount;
    },

},

beforeMount() {
  this.getApiData();
},

async mounted() {
    this.fillData()
},

}
</script>
