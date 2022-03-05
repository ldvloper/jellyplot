<template>
    <div class="border-dotted border-2 border-primary-color grid grid-cols-1 lg:grid-cols-6 2xl:grid-cols-9 gap-4 bg-gray-50 rounded-md p-5">
        <div>
            <Popper :content="new Date(Date.now()).toLocaleDateString()" :hover="true" placement="right">
                <button v-on:click="this.filterFocusToday" class="text-white px-4 w-auto h-10 bg-primary-color rounded-full filter hover:brightness-75 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block mr-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Today</span>
                </button>
            </Popper>
        </div>
        <div class="lg:col-span-2">
            <div class="grid grid-cols-2">
                <div class="grid grid-cols-2">
                    <v-date-picker @dayclick="this.filterResize" v-model="this.filter.lapse" :model-config="modelConfig" :color="this.primaryColorSimple" is-range>
                        <template v-slot="{ inputValue, inputEvents, isDragging }">
                            <div class="flex flex-col sm:flex-row justify-start items-center">
                                <div class="relative flex-grow">
                                    <svg
                                        class="text-primary-color w-4 h-full mx-2 absolute pointer-events-none"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        ></path>
                                    </svg>
                                    <input
                                        class="flex-grow px-8 pr-2 py-1 bg-gray-100 border rounded w-full"
                                        :class="isDragging ? 'text-gray-600' : 'text-gray-900'"
                                        :value="inputValue.start"
                                        v-on="inputEvents.start"
                                    />
                                </div>
                                <span class="flex-shrink-0 m-2">
                                  <svg
                                      class="w-4 h-4 stroke-current text-gray-600"
                                      viewBox="0 0 24 24"
                                  >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"
                                    />
                                  </svg>
                                </span>
                                <div class="relative flex-grow">
                                    <svg
                                        class="text-primary-color w-4 h-full mx-2 absolute pointer-events-none"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        ></path>
                                    </svg>
                                    <input
                                        class="flex-grow px-8 pr-2 py-1 bg-gray-100 border rounded w-full"
                                        :class="isDragging ? 'text-gray-600' : 'text-gray-900'"
                                        :value="inputValue.end"
                                        v-on="inputEvents.end"
                                    />
                                </div>
                            </div>
                        </template>
                    </v-date-picker>
                </div>
            </div>
        </div>
        <!--
        <div class="mt-5 md:mt-2">
            <Slider :min="1" :max="12" :steps="1" v-model="sliderMonths" :format="sliderMonthsFormat" class="z-10 slider-orange"></Slider>
        </div>-->
        <div class="mt-2">
            <div class="flex items-start">
                <!--Show or hide weekends-->
                <div class="flex items-center h-5">
                    <input v-bind:id="filter.noWorkingDays.id"  v-model="filter.noWorkingDays.value" v-on:change="this.filterHideNoWorking" id="showNoWorkingDaysHours" name="showNoWorkingDaysHours" type="checkbox" class="focus:ring-primary-color h-4 w-4 text-primary-color border-gray-300 rounded"/>
                </div>
                <div class="ml-3 text-sm">
                    <label for="showNoWorkingDaysHours" class="font-medium text-gray-700">No Working Days/Hours</label>
                </div>
            </div>
        </div>
        <!--Add new Task-->
        <div class="justify-self-end">
            <a @click="this.showNewTaskModal" href="/tasks/create" class="flex items-center text-white px-4 h-10 bg-green-600 rounded-md filter hover:brightness-75 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none">
                <CalendarIcon class="mr-1 h-5 w-5"/>
                <span>Add Task</span>
            </a>
        </div>
    </div>
</template>

<script>
//Forms
import moment from 'moment';
//Poppers
import {CalendarIcon} from '@heroicons/vue/outline';
import Popper from "vue3-popper";

/**
 * Function to get the date interval value from the localStorage
 */
  if((!localStorage.startUserSelection) || (!localStorage.endUserSelection))
  {
    localStorage.startUserSelection = Date.now() - 7*24*3600*1000
    localStorage.endUserSelection = Date.now() + 7*24*3600*1000
  }
  //Defining Start & End Date
  let defaultStart = moment.unix(localStorage.startUserSelection/1000).format("YYYY-MM-DD");
  let defaultEnd =  moment.unix(localStorage.endUserSelection/1000).format("YYYY-MM-DD");

export default {
    name: "FiltersComponent",
    components: {
        //Icons
        CalendarIcon,
        //Libraries
        Popper,
    },
    props: {
        user: {
            type: [Object, Array],
            required: true,
        },
    },
    emits: ['focusToday','changeDepartment','resize', 'showWorkingTime', 'openNewTaskModal'],
    //Data
    data: function () {
        return {
                /**
                 *  UI
                 *  1-Show/Hide
                 *  2-Filters
                 **/
                filter: {
                    noWorkingDays: {
                        id: 'no-working-days-hours',
                        value: true,
                    },
                    lapse:{
                        start: new Date(defaultStart),
                        end: new Date(defaultEnd),
                    },
                },

                modals: {
                    newTask: false,
                },
                modelConfig:{
                    type:'string',
                    mask:'YYYY-MM-DD',
                }
        }
    },
    computed:{
        primaryColorSimple: function(){
            return this.$store.state.primaryColorSimple;
        }
    },
    async mounted(){
        this.$store.dispatch('fetchPrimaryColorSimple');
    },

    //Methods
    methods: {
        /**
         * Emits
         */
        filterFocusToday: function ()
        {
            this.$emit("focusToday");
        },
        filterResize: function()
        {
            this.$emit("resizeDates", this.filter.lapse);
        },
        filterHideNoWorking: function ()
        {
            this.$emit("showWorkingTime");
        },
        showNewTaskModal:function ()
        {
            this.$emit("openNewTaskModal");
        },


    },
}
</script>

<style scoped>

</style>
