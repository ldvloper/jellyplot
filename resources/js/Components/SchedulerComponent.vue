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
        <div class="hidden sm:block" v-cloak>
            <div class="bg-gray-50">
                <div>
                    <resources-tasks-component
                        :department="department"
                        :user="this.user"
                        :team="this.team">
                    </resources-tasks-component>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import ResourcesTasksComponent from "./SchedulerChilds/ResourcesTasksComponent";

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
        },
        team: {
            type: [Object, Array],
            required: true,
        }
    },
    data: function () {
        return {

        }
    },

    methods: {

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

