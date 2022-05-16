import { createWebHistory, createRouter } from "vue-router";
import DashboardComponent from "../Components/dashboard/DashboardComponent";
import SchedulerComponent from "../Components/SchedulerComponent";
import TeamChatComponent from "../Components/dashboard/TeamChatComponent";

const routes = [
    {
        path: "/",
        name: "Dashboard",
        component: DashboardComponent,
    },
    {
        path: "/scheduler",
        name: "Scheduler",
        component: SchedulerComponent,
    },
    {
      path: "/team-chat",
      name: "TeamChat",
      component: TeamChatComponent,
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
