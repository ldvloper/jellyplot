<!--
  - Jellyplot Copyright (c) 2022.
  -->

<template>
    <section v-cloak>
        <div class="bg-white grid grid-cols-2 gap-4 px-5 py-2 text-primary-color">
            <div>
                <select  @change="this.changeType" class="capitalize text-black dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md text-xs border-gray-300 dark:border-gray-700" id="year"
                        v-model="this.type">
                    <option v-for="value in types" :value="value" >{{ value }}</option>
                </select>
            </div>
            <div class="flex justify-end items-center">
                <div v-if="this.year !== years[0]" @click="this.backYear()" class="px-2 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </div>

                <select class="text-black dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md text-xs border-gray-300 dark:border-gray-700" id="year" v-model="this.year" @change="this.updateYear()">
                    <option v-for="year in years" :value="year">{{ year }}</option>
                </select>

                <div v-show="this.year !== years[years.length - 1]" @click="this.next()" class="px-2 cursor-pointer">
                    <svg @click="this.nextYear()" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white p-2 text-black rounded-b-md">
            <canvas id="user-projects-contribution" width="400" height="400"></canvas>
        </div>
    </section>
</template>

<script>
import Chart from 'chart.js/auto'
const Utils = require("moment");

export default {
    name: "UserProjectsContributionComponent",
    props: {
        user: {
            type: [Object, Array],
            required: true,
        }
    },

    data: function () {
        return {
            year: new Date(Date.now()).getFullYear(),
            type: 'line',
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
                type: this.type,
                data: {
                    labels: Utils.months(),
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
                    title: {
                        display: true,
                        text: 'Users in each department'
                    },
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
            this.$store.dispatch('fetchUserProjectsCount',  {'userID': this.user.id, 'yearValue': this.year});
            this.$store.dispatch('fetchUserResourcesCount', {'userID': this.user.id, 'yearValue': this.year});
            this.$store.dispatch('fetchUserCustomersCount', {'userID': this.user.id, 'yearValue': this.year});
            this.$store.dispatch('fetchUserEquipmentCount', {'userID': this.user.id, 'yearValue': this.year});
        },

        updateYear: function()
        {
            while (this.chart.data.datasets.length) {
                this.chart.data.datasets.pop();
            }
            this.getApiData();
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
            if(this.year !== this.years[this.years.length -1])
            {
                this.year = this.year +1;
                this.updateYear();
            }
        }
    },
    computed: {

        years: function() {
            const year = new Date().getFullYear()
            return Array.from({length: year - 2009}, (value, index) => 2010 + index)
        },

        types: function(){
            return ['line','bar', 'radar'];
        },

        userProjectsCount: function (){
             return this.$store.getters.userProjectsCount;
        },
        userResourcesCount: function (){
            return this.$store.getters.userResourcesCount;
        },
        userCustomersCount: function (){
            return this.$store.getters.userCustomersCount;
        },
        userEquipmentCount: function (){
            return this.$store.getters.userEquipmentCount;
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
