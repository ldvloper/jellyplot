<!--
  - Jellyplot Copyright (c) 2022.
  -->

<template>
    <div class="bg-white p-2 text-black rounded-b-md">
        <canvas id="task-cost" width="300" height="300"></canvas>
    </div>
</template>

<script>
import Chart from 'chart.js/auto';
const Utils = require("moment");


export default {
    name: "CostsComponent",
    props: {
        task: {
            type: [Object, Array],
            required: true,
        },
    },

    data: function () {
        return{

        };
    },

    methods: {

        getCost:function() {
            let result = [];
            let value = 0;
            for (let i = 0; i < this.task.total_days.length; i++)
            {
                let data = value + this.task.resource.price_hour/100 * this.task.shift.total_hours;
                result.push(data);
                value = data;
            }
            return result;
        },
        fillData: function () {
            const ctx = document.getElementById('task-cost');
            this.chart = new Chart(ctx, {
                type: 'line',
                data:{
                    labels:this.task.total_days,
                    datasets: [{
                        label: 'Cost',
                        data: this.getCost(),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                        }
                    }
                }
            });
        },
    },
    computed: {

    },

    beforeMount() {

    },

    async mounted() {
        this.fillData()
    },

}

</script>

<style scoped>

</style>
