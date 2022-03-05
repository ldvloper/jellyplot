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



import SchedulerComponent from "./components/SchedulerComponent";
import ModelsComponent from "./components/ModelsComponent";
import DepartmentUsers from "./components/dashboard/DepartmentUsersComponent";
import UserProjectsContribution from "./components/dashboard/UserProjectsContributionComponent";
import TasksStatisticsCosts from "./components/resources/tasks/statistics/CostsComponent";
import NewTaskComponent from "./components/Modals/NewTaskComponent"
import DeleteTaskComponent from './components/Modals/DeleteTaskComponent';
import MoveTaskComponent from './components/Modals/MoveTaskComponent';
import EditTaskComponent from './components/Modals/EditTaskComponent';
import ResourcesTasksComponent from './components/SchedulerChilds/ResourcesTasksComponent';
import LastModificationComponent from './components/SchedulerChilds/LastModificationsComponent';


const vue3App = createApp({});
    vue3App.component('department-users', DepartmentUsers);
    vue3App.component('user-projects-contribution', UserProjectsContribution);
    vue3App.component('scheduler-component', SchedulerComponent);
    vue3App.component('resources-tasks', ResourcesTasksComponent);
    vue3App.component('models-component', ModelsComponent);
    vue3App.component('tasks-statistics-costs', TasksStatisticsCosts);
    vue3App.component('new-task-component', NewTaskComponent);
    vue3App.component('delete-task-component', DeleteTaskComponent);
    vue3App.component('move-task-component', MoveTaskComponent);
    vue3App.component('edit-task-component', EditTaskComponent);
    vue3App.component('last-modifications-component', LastModificationComponent);
    vue3App.use(store).use(VueFullscreen).use(VCalendar, {});

vue3App.mount('#app');

window.Alpine = Alpine;
Alpine.start();








