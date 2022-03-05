<!--
  - Jellyplot Copyright (c) 2022.
  -->
<template>
    <section>
        <div class="bg-white p-2 text-black rounded-b-md">
            <canvas id="departments-users" width="300" height="300"></canvas>
        </div>
    </section>
</template>

<script>
import Chart from 'chart.js/auto'

export default {
    name: "DepartmentUsersComponent",

    data: function()
    {
        return {

        }
    },
    watch: {
        departmentsColors(newValue) {
            this.chart.data.datasets[0].backgroundColor = newValue.slice();
            this.chart.update(0);
        },
        departments(newValue) {
            this.chart.data.labels = newValue.slice();
            this.chart.update(0);
        },
        departmentsUsers(newValue){
            this.chart.data.datasets[0].data = newValue.slice();
            this.chart.update(0)
        }
    },

    methods: {
        fillData: function () {
            const ctx = document.getElementById('departments-users');
            const image = new Image();
            image.src = "/img/logo.svg"
            this.chart = new Chart(ctx, {
                type: 'doughnut',
                    data: {
                    labels: this.departments,
                        datasets:[{
                        label: "Users",
                        backgroundColor: this.departmentsColors,
                        data: this.departmentsUsers
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    title: {
                        display: true,
                            text: 'Users in each department'
                    }
                },
                plugin: {
                    id: 'departments-users',
                    beforeDraw: (chart) => {
                        if (image.complete) {
                            const ctx = chart.ctx;
                            const {top, left, width, height} = chart.chartArea;
                            const x = left + width / 2 - image.width / 2;
                            const y = top + height / 2 - image.height / 2;
                            ctx.drawImage(image, x, y);
                        } else {
                            image.onload = () => chart.draw();
                        }
                    }
                },
            });
        },

    },

    computed:{
        departmentsColors: function()
        {
            let value = [];
            for (let x in this.$store.getters.departments)
            {
                value.push(this.$store.getters.departments[x].color)
            }
            return value;
        },
        departments: function()
        {
            let value = [];
            for (let x in this.$store.getters.departments)
            {
                value.push(this.$store.getters.departments[x].name_show)
            }
            return value;
        },

        departmentsUsers: function ()
        {
            return this.$store.getters.departmentsUsers;
        }
    },

    beforeMount() {
        /*  Before the component is mounted, we dispatch
            an action which makes an API request
            and sets data in the store */
        this.$store.dispatch('fetchDepartmentsUsers');
        this.$store.dispatch('fetchDepartments');
    },

    async mounted() {
        this.fillData();
    }
}
</script>



