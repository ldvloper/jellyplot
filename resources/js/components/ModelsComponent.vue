<template>
    <div id="visualization" class="bg-transparent h-96 "></div>
</template>

<script>
import {Network} from "vis-network/standalone"
import {DataSet} from "vis-data/standalone"
let vis = null;

export default {
    name: "ModelsComponent",
    async mounted() {
        let container = document.getElementById('visualization');
        let data = {
            nodes: this.nodes,
            edges: this.edges,
        };
        vis = new Network(container, data, this.options);
    },
    data: function () {
        return {
            nodes: new DataSet([
                { id: 0, label: "Department", group: "source" },
                { id: 6, label: "Project", group: "projects" },
                { id: 7, label: "Resource", group: "dotsWithLabel" },
                { id: 8, label: "Task", group: "diamonds" },
                { id: 9, label: "Customer", group: "customers" },
                { id: 10, label: "Equipment", group: "equipment" },
                { id: 11, label: "User", group: "users" },
                { id: 12, label: "Team", group: "teams" },

            ]),

            // create an array with edges
            edges: new DataSet([
                { from: 6, to: 9 },
                { from: 7, to: 0 },
                { from: 8, to: 6 },
                { from: 8, to: 7 },
                { from: 9, to: 0 },
                { from: 10, to: 0 },
                { from: 10, to: 8 },
                { from: 11, to: 0 },
                { from: 11, to: 12 },
                { from: 12, to: 0 },

            ]),
            options: {
                nodes: {
                    shape: "dot",
                    size: 20,
                    font: {
                        size: 15,
                        color: "#000000",
                    },
                    borderWidth: 2,
                },
                edges: {
                    width: 2,
                },
                groups: {
                    diamonds: {
                        color: { background: "pink", border: "violet" },
                        shape: "diamond",
                    },
                    dotsWithLabel: {
                        shape: "dot",
                        color: "cyan",
                    },
                    projects: { color: "rgb(0,255,140)" },
                    department: {
                        shape: "icon",
                        icon: {
                            face: "FontAwesome",
                            code: "\uf0c0",
                            size: 50,
                            color: "orange",
                        },
                    },
                    customers: {
                        color: { background: "red", border: "red" },
                    },
                    equipment: {
                        color: { background: "yellow", border: "gold" },
                    },
                    users: {
                        color: { background: "purple", border: "violet" },
                    },
                    teams:{
                        color: { background: "black", border: "gray" },
                    }
                },
            },
        }
    }
}
</script>

<style scoped>

</style>
