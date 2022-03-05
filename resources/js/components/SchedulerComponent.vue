<template>
    <div>
        <!--Rotate your device advice-->
        <div class="sm:hidden">
            <div class="h-96 flex justify-center items-center">
                <span class="phone"></span>
            </div>
            <p class="text-xl text-gray-900 text-center">Please rotate your device</p>
        </div>

        <!--Scheduler-->
        <div class="hidden sm:block" @click.meta="showLastModifications" v-cloak>
            <div class="bg-gray-50" v-bind:class="{'grid grid-cols-2 gap-4 max-h-1/2':this.timelineGrid}">
                <div>
                    <resources-tasks-component
                        @lastModifications="showLastModifications"
                        :department="department"
                        :user="user">
                    </resources-tasks-component>
                </div>
                <transition>
                    <div v-show="this.timelineGrid" class="h-screen transition duration-700 ease-in-out">
                        <last-modifications-component></last-modifications-component>
                    </div>
                </transition>
            </div>
        </div>
    </div>
</template>


<script>
import ResourcesTasksComponent from "./SchedulerChilds/ResourcesTasksComponent";
import LastModificationComponent from "./SchedulerChilds/LastModificationsComponent";
/**
 * Listeners
 * */

export default {
    components: {
        ResourcesTasksComponent,
    },
    name: "SchedulerComponent",
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
            //UX
            timelineGrid:false,
        }
    },

    methods: {
        showLastModifications(){
           this.timelineGrid = !this.timelineGrid;
        }
    },


    async mounted() {
    },


}
</script>

<style scoped>
@keyframes rotate {
    0% {
        transform: rotate(0deg)
    }
    50% {
        transform: rotate(-90deg)
    }
    100% {
        transform: rotate(-90deg)
    }
}

.phone {
    height: 50px;
    width: 100px;
    border: 3px solid black;
    border-radius: 10px;
    animation: rotate 1.5s ease-in-out infinite alternate;
    /* display: none; */
}



.morning{
    background-color: rgba(255, 255, 0, 0.6);
}
.afternoon{
    background-color: rgba(51, 102, 255, 0.6);
}
.night{
    background-color: rgba(153, 153, 102,0.6);
}

/* we will explain what these classes do next! */
.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}

</style>

