<!--
  - Jellyplot Copyright (c) 2022.
  -->

<template>
    <div class="px-4">
        <!--Scheduler Filter Menu-->
        <div class="w-full bg-gray-50 flex justify-center items-center">
            <div class="text-primary-color hover:text-secondary-color cursor-pointer">
                <svg @click="this.showFilters = !this.showFilters" v-if="this.showFilters" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                </svg>
                <svg  @click="this.showFilters = !this.showFilters" v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>

        <div class="bg-gray-50 px-4">
            <filters-component v-cloak
                               v-if="this.showFilters"
                               @focusToday="focusToday"
                               @resizeDates="resize"
                               @showWorkingTime="hideWeekendsNonProductiveHours"
                               @openNewTaskModal="showNewTaskModel"
                               :user="this.user">
            </filters-component>
            <div class="grid justify-items-end grid-cols-2 gap-8 p-5 w-full">
                <a class="hidden lg:block justify-self-start text-primary-color transform-gpu hover:-translate-y-1 cursor-pointer" @click="toggleFullscreen">
                    <arrows-expand-icon  class="h-6 w-6">
                    </arrows-expand-icon>
                </a>
            </div>
        </div>

        <fullscreen v-model="fullscreen">
            <div id="visualization" class="bg-gray-50 h-screen dark:bg-black relative"></div>
        </fullscreen>

        <transition-group name="fade" id="vuejs-modals">
            <new-task-component
                v-cloak
                v-if="this.modals.newTask"
                @closeNewTaskModal="hideNewTaskModel">
            </new-task-component>
            <delete-task-component
                v-cloak
                :open="this.modals.deleteTask">
            </delete-task-component>
        </transition-group>
    </div>
</template>

<script>
//VisJS
import {Timeline} from "vis-timeline/standalone";
import {DataSet} from "vis-data/standalone";
import {ArrowsExpandIcon} from '@heroicons/vue/outline';

//UI Helpers
import * as ui from '../helpers/ui.js';

//Components
import FiltersComponent from "./FiltersComponent";
import NewTaskComponent from "../Modals/NewTaskComponent";
import DeleteTaskComponent from "../Modals/DeleteTaskComponent";
//Poppers
import Popper from "vue3-popper";
/**
 * Function
 * @return {number}
 */
function getMapHeight() {
    return (window.innerHeight);
}

/**
 * Defining the VisJS Timeline variable
 * @object Timeline
 */
let vis = null;

if((!localStorage.startUserSelection) || (!localStorage.endUserSelection))
{
    localStorage.startUserSelection = Date.now();
    localStorage.endUserSelection = Date.now()+ 4*24*3600*1000;
}
//Defining Start & End Date
let defaultStart =  Date.now();
let defaultEnd = Date.now()+ 4*24*3600*1000;
let showDeleteModal = false;

export default {
    name: "ResourcesTasksComponent",
    components: {
        DeleteTaskComponent,
        NewTaskComponent,
        FiltersComponent,
        ArrowsExpandIcon,
        Popper,
    },
    props: {
        department: {
            type: [Object, Array],
            required: true,
        },
        user: {
            type: [Object, Array],
            required: true,
        }
    },
    data: function () {
        return {
            //FullScreen
            fullscreen: false,

            //Filters
            showFilters: false,

            //Timeline Margins
            start: defaultStart,
            end: defaultEnd,

            //Weekends
            dynamicHiddenWeekends: {
                start: '2017-03-04 00:00:00',
                end: '2017-03-06 00:00:00',
                repeat: 'weekly',
                id:"hiddenWeekends"
            },
            //Non Working Hours
            dynamicHiddenHours: {
                start: '2017-03-04 00:00:00',
                end: '2017-03-04 08:00:00',
                repeat: 'daily',
                id:"hiddenHours"
            },
            /**
             * Tasks
             */
            modals: {
                newTask: false,
                deleteTask: showDeleteModal,
            },
            /**
             * VisJS Timeline
             * 1-Groups
             * 2-Items
             * 3-Options
             **/
            //Groups(Resources): Define DataSet Model for assign the Resources VUEX API GETTER value
            groups: new DataSet([]),
            //Items(Tasks): Define DataSet Model for assign the tasks VUEX API GETTER value
            items: new DataSet([]),
            //Options
            options: {
                height: '100%',
                template: function (item,element, data) {
                    return(
                        '<div class="task-info">'+
                        '<h1 class="description">'+item.customer.name+' '+ item.project+
                        '</h1>'+
                        '</div>')
                },
                format: {
                    minorLabels: {
                        millisecond:'SSS',
                        second:'s',
                        minute:'HH:mm',
                        hour:'HH:mm',
                        weekday:'ddd D',
                        day:'D',
                        week:'w',
                        month:'MMM',
                        year:'YYYY'
                    },
                    majorLabels: {
                        millisecond:'HH:mm:ss',
                        second:     'D MMMM HH:mm',
                        minute:     'ddd D MMMM',
                        hour:       'ddd D MMMM',
                        weekday:    'MMMM YYYY',
                        day:        'MMMM YYYY',
                        week: 'MMMM YYYY',
                        month:      'YYYY',
                        year:       ''
                    }
                },
                tooltip: {
                    followMouse: false,
                },
                onRemove: function(item, callback){
                    showDeleteModal = true;
                },
                showTooltips: true,
                //Zoom
                verticalScroll: true,
                horizontalScroll: true,
                zoomKey: 'ctrlKey',
                zoomMax: (157680000000), //5 Years
                zoomMin: (51600000),//Divided in 4 Hours

                //Edit
                multiselect: true,
                showCurrentTime: true,
                //Scale
                start: defaultStart,
                end: defaultEnd,
                showWeekScale: true,
                orientation: 'both',
                //Hidden Dates
                hiddenDates: [],
                //Actions
                groupEditable: {
                    order: true,
                    remove:true,
                },


                editable: {
                    updateTime: true,  // drag items horizontally
                    updateGroup: false, // drag items from one group to another
                    remove: true,       // delete an item by tapping the delete button top right
                    overrideItems: false  // allow these options to override item.editable
                },
                onMove: function (item, callback) {
                    let title = 'Do you really want to move the item to\n' +
                        'start: ' + item.start + '\n' +
                        'end: ' + item.end + '?';
                    console.log(title);
                },
            },
        }
    },
    computed: {
        /**
         * VUEX: API RESPONSES
         * 1-Resources (Rooms)
         *  Transform Resources Eloquent APIv0 response into DataSet Model
         * 2-Tasks (Reserves)
         * 3-Projects
         * 4-Users
         */
        //1-Resources
        resources: function() {
            let groups = [];
            for (let x in this.$store.getters.resources) {
                groups.push({
                    "content": this.$store.getters.resources[x].name,
                    "id": this.$store.getters.resources[x].id,
                    "value": this.$store.getters.resources[x].order_planning,
                    "style": "color:" + ui.textColorByBg(this.$store.getters.resources[x].color)
                        + ";background-color:" + this.$store.getters.resources[x].color,
                })
            }
            return groups;
        },

        tasks: function(){
            let tasks = [];
            for (let x in this.$store.getters.tasks) {
                for (let i in this.$store.getters.tasks[x].total_days) {
                    if((this.$store.getters.tasks[x].test_manager) && (this.$store.getters.tasks[x].technician)){
                        tasks.push({
                            "content": this.$store.getters.tasks[x].title,
                            "start": new Date(this.$store.getters.tasks[x].total_days[i]).getTime()
                                + (this.$store.getters.tasks[x].shift.from-1) * 2*3600 * 1000,
                            "end": new Date(this.$store.getters.tasks[x].total_days[i]).getTime()
                                + (this.$store.getters.tasks[x].shift.to-1) * 3600 * 1000,
                            "group": this.$store.getters.tasks[x].resource_id,
                            "id": this.$store.getters.tasks[x].id+"-"+i,
                            "project": this.$store.getters.tasks[x].project.reference,
                            "customer": this.$store.getters.tasks[x].project.customer,
                            "resource": this.$store.getters.tasks[x].resource.name,
                            "status": this.$store.getters.tasks[x].project.billing_status,
                            "duration":     this.$store.getters.tasks[x].shift.total_hours  + 'h ' +
                                '('+this.$store.getters.tasks[x].shift.name_capitalized+')',
                            "taskManager": this.$store.getters.tasks[x].test_manager.name,
                            "technician":  this.$store.getters.tasks[x].technician.name,
                            "creator": this.$store.getters.tasks[x].creator.name,
                            "created_at": new Date(this.$store.getters.tasks[x].created_at).toLocaleString(),
                            "title":
                                '<table class="tg">'+
                                '<thead>'+
                                '<tr>'+
                                '<td><b>Project: </b></td>'+
                                '<td>'+this.$store.getters.tasks[x].project.reference+'</td>'+
                                '</tr>'+
                                '<tr>' +
                                '<td><b>Resource: </b></td>'+
                                '<td>'+this.$store.getters.tasks[x].resource.name+'</td>'+
                                '</tr>'+
                                '<tr>' +
                                '<td><b>Status: </b></th>'+
                                '<td>'+this.$store.getters.tasks[x].project.billing_status+'</th>'+
                                '</tr>'+
                                '<tr>' +
                                '<td><b>Duration: </b></td>'+
                                '<td class="tg-0lax">'+
                                this.$store.getters.tasks[x].shift.total_hours  + 'h ' +
                                '('+this.$store.getters.tasks[x].shift.name_capitalized+')'+
                                '</td>'+
                                '</tr>'+
                                '<tr>' +
                                '<td><b>Test Manager: </b></td>'+
                                '<td class="tg-0lax">'+
                                this.$store.getters.tasks[x].test_manager.name +
                                '</td>'+
                                '</tr>'+
                                '<tr>' +
                                '<td><b>Technician: </b></td>'+
                                '<td class="tg-0lax">'+
                                this.$store.getters.tasks[x].technician.name +
                                '</td>'+
                                '</tr>'+
                                '</thead>'+
                                '<tbody>'+
                                '<tr>'+
                                '<td class="tg-0lax">Created By</td>'+
                                '<td class="tg-0lax"><b>'+this.$store.getters.tasks[x].creator.name+'</b> by '+ new Date(this.$store.getters.tasks[x].created_at).toLocaleString()+'</td>'+
                                '</tr>'+
                                '</tbody>'+
                                '</table>',
                            "style": "border-radius: 5px;border: 1px solid #FF6900; color:" + ui.textColorByBg(this.$store.getters.tasks[x].project.color)
                                + ";background-color:" + this.$store.getters.tasks[x].project.color,
                        })
                    }
                    else{
                        if((this.$store.getters.tasks[x].test_manager) && !(this.$store.getters.tasks[x].technician)){
                            tasks.push({
                                "className": "font-black",
                                "content": this.$store.getters.tasks[x].title,
                                "start": new Date(this.$store.getters.tasks[x].total_days[i]).getTime()
                                    + (this.$store.getters.tasks[x].shift.from-1) * 3600 * 1000,
                                "end": new Date(this.$store.getters.tasks[x].total_days[i]).getTime()
                                    + (this.$store.getters.tasks[x].shift.to-1) * 3600 * 1000,
                                "group": this.$store.getters.tasks[x].resource_id,
                                "id": this.$store.getters.tasks[x].id+"-"+i,
                                "project": this.$store.getters.tasks[x].project.reference,
                                "customer": this.$store.getters.tasks[x].project.customer,
                                "resource": this.$store.getters.tasks[x].resource.name,
                                "status": this.$store.getters.tasks[x].project.billing_status,
                                "duration":     this.$store.getters.tasks[x].shift.total_hours  + 'h ' +
                                    '('+this.$store.getters.tasks[x].shift.name_capitalized+')',
                                "taskManager": this.$store.getters.tasks[x].test_manager.name,
                                "creator": this.$store.getters.tasks[x].creator.name,
                                "created_at": new Date(this.$store.getters.tasks[x].created_at).toLocaleString(),
                                "title":
                                    '<table class="tg">'+
                                    '<thead>'+
                                    '<tr>'+
                                    '<td><b>Project: </b></td>'+
                                    '<td>'+this.$store.getters.tasks[x].project.reference+'</td>'+
                                    '</tr>'+
                                    '<tr>' +
                                    '<td><b>Resource: </b></td>'+
                                    '<td>'+this.$store.getters.tasks[x].resource.name+'</td>'+
                                    '</tr>'+
                                    '<tr>' +
                                    '<td><b>Status: </b></th>'+
                                    '<td>'+this.$store.getters.tasks[x].project.billing_status+'</th>'+
                                    '</tr>'+
                                    '<tr>' +
                                    '<td><b>Duration: </b></td>'+
                                    '<td class="tg-0lax">'+
                                    this.$store.getters.tasks[x].shift.total_hours  + 'h ' +
                                    '('+this.$store.getters.tasks[x].shift.name_capitalized+')'+
                                    '</td>'+
                                    '</tr>'+
                                    '<tr>' +
                                    '<td><b>Test Manager: </b></td>'+
                                    '<td class="tg-0lax">'+
                                    this.$store.getters.tasks[x].test_manager.name +
                                    '</td>'+
                                    '</tr>'+
                                    '</thead>'+
                                    '<tbody>'+
                                    '<tr>'+
                                    '<td class="tg-0lax">Created By</td>'+
                                    '<td class="tg-0lax"><b>'+this.$store.getters.tasks[x].creator.name+'</b> by '+ new Date(this.$store.getters.tasks[x].created_at).toLocaleString()+'</td>'+
                                    '</tr>'+
                                    '</tbody>'+
                                    '</table>',
                                "style":"border-radius: 5px;border: 1px solid #FF6900; color:"  + ui.textColorByBg(this.$store.getters.tasks[x].project.color)
                                    + ";background-color:" + this.$store.getters.tasks[x].project.color,
                            })
                        }
                        else{
                            if(!(this.$store.getters.tasks[x].test_manager) && (this.$store.getters.tasks[x].technician)){
                                tasks.push({
                                    "className": "antialiased text-xs",
                                    "content": this.$store.getters.tasks[x].title,
                                    "start": new Date(this.$store.getters.tasks[x].total_days[i]).getTime()
                                        + (this.$store.getters.tasks[x].shift.from-1) * 3600 * 1000,
                                    "end": new Date(this.$store.getters.tasks[x].total_days[i]).getTime()
                                        + (this.$store.getters.tasks[x].shift.to-1) * 3600 * 1000,
                                    "group": this.$store.getters.tasks[x].resource_id,
                                    "id": this.$store.getters.tasks[x].id+"-"+i,
                                    "project": this.$store.getters.tasks[x].project.reference,
                                    "customer": this.$store.getters.tasks[x].project.customer,
                                    "resource": this.$store.getters.tasks[x].resource.name,
                                    "status": this.$store.getters.tasks[x].project.billing_status,
                                    "duration":     this.$store.getters.tasks[x].shift.total_hours  + 'h ' +
                                        '('+this.$store.getters.tasks[x].shift.name_capitalized+')',
                                    "technician":  this.$store.getters.tasks[x].technician.name,
                                    "creator": this.$store.getters.tasks[x].creator.name,
                                    "created_at": new Date(this.$store.getters.tasks[x].created_at).toLocaleString(),
                                    "title":
                                        '<table class="tg">'+
                                        '<thead>'+
                                        '<tr>'+
                                        '<td><b>Project: </b></td>'+
                                        '<td>'+this.$store.getters.tasks[x].project.reference+'</td>'+
                                        '</tr>'+
                                        '<tr>' +
                                        '<td><b>Resource: </b></td>'+
                                        '<td>'+this.$store.getters.tasks[x].resource.name+'</td>'+
                                        '</tr>'+
                                        '<tr>' +
                                        '<td><b>Status: </b></th>'+
                                        '<td>'+this.$store.getters.tasks[x].project.billing_status+'</th>'+
                                        '</tr>'+
                                        '<tr>' +
                                        '<td><b>Duration: </b></td>'+
                                        '<td class="tg-0lax">'+
                                        this.$store.getters.tasks[x].shift.total_hours  + 'h ' +
                                        '('+this.$store.getters.tasks[x].shift.name_capitalized+')'+
                                        '</td>'+
                                        '</tr>'+
                                        '<tr>' +
                                        '<td><b>Technician: </b></td>'+
                                        '<td class="tg-0lax">'+
                                        this.$store.getters.tasks[x].technician.name +
                                        '</td>'+
                                        '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                        '<tr>'+
                                        '<td class="tg-0lax">Created By</td>'+
                                        '<td class="tg-0lax"><b>'+this.$store.getters.tasks[x].creator.name+'</b> by '+ new Date(this.$store.getters.tasks[x].created_at).toLocaleString()+'</td>'+
                                        '</tr>'+
                                        '</tbody>'+
                                        '</table>',
                                    "style": "border-radius: 5px; border: 1px solid #FF6900; color:" + ui.textColorByBg(this.$store.getters.tasks[x].project.color)
                                        + ";background-color:" + this.$store.getters.tasks[x].project.color,
                                })
                            }
                            else{
                                tasks.push({
                                    "content": this.$store.getters.tasks[x].title,
                                    "start": new Date(this.$store.getters.tasks[x].total_days[i]).getTime()
                                        + (this.$store.getters.tasks[x].shift.from-1) * 3600 * 1000,
                                    "end": new Date(this.$store.getters.tasks[x].total_days[i]).getTime()
                                        + (this.$store.getters.tasks[x].shift.to-1) * 3600 * 1000,
                                    "group": this.$store.getters.tasks[x].resource_id,
                                    "id": this.$store.getters.tasks[x].id+"-"+i,
                                    "project": this.$store.getters.tasks[x].project.reference,
                                    "customer": this.$store.getters.tasks[x].project.customer,
                                    "resource": this.$store.getters.tasks[x].resource.name,
                                    "status": this.$store.getters.tasks[x].project.billing_status,
                                    "duration":     this.$store.getters.tasks[x].total_duration + 'h ' +
                                        '('+this.$store.getters.tasks[x].shift.name_capitalized+')',
                                    "creator": this.$store.getters.tasks[x].creator.name,
                                    "created_at": new Date(this.$store.getters.tasks[x].created_at).toLocaleString(),
                                    "title":
                                        '<table class="tg">'+
                                        '<thead>'+
                                        '<tr>'+
                                        '<td><b>Project: </b></td>'+
                                        '<td>'+this.$store.getters.tasks[x].project.reference+'</td>'+
                                        '</tr>'+
                                        '<tr>' +
                                        '<td><b>Resource: </b></td>'+
                                        '<td>'+this.$store.getters.tasks[x].resource.name+'</td>'+
                                        '</tr>'+
                                        '<tr>' +
                                        '<td><b>Status: </b></th>'+
                                        '<td>'+this.$store.getters.tasks[x].project.billing_status+'</th>'+
                                        '</tr>'+
                                        '<tr>' +
                                        '<td><b>Duration: </b></td>'+
                                        '<td class="tg-0lax">'+
                                        this.$store.getters.tasks[x].shift.total_hours + 'h ' +
                                        '('+this.$store.getters.tasks[x].shift.name_capitalized+')'+
                                        '</td>'+
                                        '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                        '<tr>'+
                                        '<td class="tg-0lax">Created By</td>'+
                                        '<td class="tg-0lax"><b>'+this.$store.getters.tasks[x].creator.name+'</b> by '+ new Date(this.$store.getters.tasks[x].created_at).toLocaleString()+'</td>'+
                                        '</tr>'+
                                        '</tbody>'+
                                        '</table>',
                                    "style": "color:" + ui.textColorByBg(this.$store.getters.tasks[x].project.color)
                                        + ";background-color:" + this.$store.getters.tasks[x].project.color,
                                })
                            }
                        }
                    }
                }
            }
            return tasks;
        },

        projects: function(){

        },

        users: function(){

        },

    },
    watch: {
        resources:{
            handler(n) {
                this.groups = this.groups.add(_.clone(n));
            },
        },
        tasks:{
            handler(n, o) {
                this.items = this.items.add(_.clone(n));
            },
        },

    },
    async mounted() {
        this.init();
    },
    methods: {

        lastModifications() {
            this.$emit("lastModifications");
        },

        toggleFullscreen () {
            this.fullscreen = !this.fullscreen
        },

        init: function(){
            //Store the API responses
            this.$store.dispatch('fetchResources', this.department.name);
            this.$store.dispatch('fetchTasks', this.department.name);
            vis = new Timeline(document.getElementById('visualization'));

            /**
             * Set the default values GETTERS VIA VUEX APIv0
             */
            vis.setOptions(this.options);
            vis.setGroups(this.groups);
            vis.setItems(this.items);
            //Move today
            this.focusToday();
        },

        reloadGroups: function(value)
        {
            this.groups = new DataSet([]);
            this.$store.dispatch('fetchResources', value);
            vis.setGroups(this.groups);
        },


        /**
         * Planner Methods
         * 1-Filter methods
         *  1.1-Focus Scheduler on Today: focusToday()
         *  1.2-Hide Weekends and non-Working Hours: hideWeekendsNonProductiveHours()
         */

        //Focus the scheduler on today
        focusToday: function (){
            this.$emit("focusToday");
            vis.moveTo(
                Date.now(),
                {
                    animation: {
                        duration: 1200,
                        easingFunction: "easeInOutQuart"
                    }
                }
            )
        },

        resize: function(value){
            let localStart = new Date(value.start).getTime();
            let localEnd = new Date(value.end).getTime();

            //Save on local
            localStorage.startUserSelection = localStart;
            localStorage.endUserSelection = localEnd;

            vis.setWindow(
                localStart,
                localEnd,
                {
                    animation: {
                        duration: 1200,
                        easingFunction: "easeInOutQuart"
                    }
                }
            )
        },

        //Hide and show the non-productive hours and weekends
        hideWeekendsNonProductiveHours: function (){
            if(this.options.hiddenDates.length < 1 ){
                this.options.hiddenDates.push(this.dynamicHiddenWeekends);
                this.options.hiddenDates.push(this.dynamicHiddenHours);
            }
            else{
                Array.prototype.remove =
                    Array.prototype.remove ||
                    function () {
                        this.splice(0, this.length);
                    };

                this.options.hiddenDates.remove();
            }
            vis.redraw();
        },
        onUpdate: function (item, callback) {
            item.content = prompt('Edit items:', item.content);
            if (item.content != null) {
                callback(item); // send back adjusted item
            } else {
                callback(null); // cancel updating the item
            }
        },

        /**
         * Task Listener
         */
        showNewTaskModel: function(){
            this.modals.newTask = true;
        },
        hideNewTaskModel: function(){
            this.modals.newTask = false;
        },

        /**
         * Client System
         */
        getOs: function () {
            let userAgent = window.navigator.userAgent;
            let platform = window.navigator.platform;
            let macosPlatforms = ['Macintosh', 'MacIntel', 'MacPPC', 'Mac68K'];
            let windowsPlatforms = ['Win32', 'Win64', 'Windows', 'WinCE'];
            let iosPlatforms = ['iPhone', 'iPad', 'iPod'];
            let os = null;
            if (macosPlatforms.indexOf(platform) !== -1) {
                os = 0; //MacOs
            } else if (iosPlatforms.indexOf(platform) !== -1) {
                os = 1; //IOS
            } else if (windowsPlatforms.indexOf(platform) !== -1) {
                os = 2; //Windows
            } else if (/Android/.test(userAgent)) {
                os = 3; //Android
            } else if (!os && /Linux/.test(platform)) {
                os = 4; //Linux
            }

            return os;
        }
    },
}
</script>

<style scoped>

</style>
