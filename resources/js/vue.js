import Alpine from "alpinejs";

require('./bootstrap');
import { createApp } from 'vue';
import VueFullscreen from 'vue-fullscreen';
import store from './store/index';
/**
 * V-Calendar
 */
import 'v-calendar/dist/style.css';
import VCalendar from 'v-calendar';
import router from './Router';


import SchedulerComponent from "./Components/SchedulerComponent";
import ModelsComponent from "./Components/ModelsComponent";
import DepartmentUsers from "./Components/dashboard/DepartmentUsersComponent";
import UserContribution from "./Components/dashboard/UserContributionComponent";
import TasksStatisticsCosts from "./Components/resources/tasks/statistics/CostsComponent";
import NewTaskComponent from "./Components/Modals/NewTaskComponent"
import DeleteTaskComponent from './Components/Modals/DeleteTaskComponent';
import MoveTaskComponent from './Components/Modals/MoveTaskComponent';
import EditTaskComponent from './Components/Modals/EditTaskComponent';
import ResourcesTasksComponent from './Components/SchedulerChilds/ResourcesTasksComponent';
import LastModificationComponent from './Components/SchedulerChilds/LastModificationsComponent';
import LatestTasksComponent from "./Components/dashboard/LatestTasksComponent";


const vue3App = createApp({});
    vue3App.component('department-users', DepartmentUsers);
    vue3App.component('user-contribution', UserContribution);
    vue3App.component('scheduler-component', SchedulerComponent);
    vue3App.component('resources-tasks', ResourcesTasksComponent);
    vue3App.component('models-component', ModelsComponent);
    vue3App.component('tasks-statistics-costs', TasksStatisticsCosts);
    vue3App.component('new-task-component', NewTaskComponent);
    vue3App.component('delete-task-component', DeleteTaskComponent);
    vue3App.component('move-task-component', MoveTaskComponent);
    vue3App.component('edit-task-component', EditTaskComponent);
    vue3App.component('last-modifications-component', LastModificationComponent);
    vue3App.component('latest-tasks', LatestTasksComponent);

    vue3App.use(store).use(VueFullscreen).use(VCalendar, {}).use(router);

vue3App.mount('#app');

window.Alpine = Alpine;
Alpine.start();








