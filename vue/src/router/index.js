import { createRouter, createWebHistory } from "vue-router";
import "@/plugins/nativescript-webview-interface.js";
import PlugView from "@/views/PlugView";
import TermsOfUseView from "@/views/authorization/TermsOfUseView";
import AuthorizationView from "@/views/authorization/AuthorizationView.vue";
import OfferView from "@/views/authorization/OfferView";
import PolicyView from "@/views/authorization/PolicyView";
import QuestionsView from "@/views/QuestionsView";
import HomeView from "@/views/HomeView";
import SettingsView from "@/views/settings/SettingsView";
import NotesView from "@/views/notes/NotesView";
import SexualActView from "@/views/notes/SexualActView";
import PillsView from "@/views/notes/PillsView";
import WeightView from "@/views/notes/WeightView";
import TemperatureView from "@/views/notes/TemperatureView";
import MoodView from "@/views/notes/MoodView";
import NoteView from "@/views/notes/NoteView";
import WaterView from "@/views/notes/WaterView";
import SymptomsView from "@/views/notes/SymptomsView";
import CalendarView from "@/views/CalendarView";
import PlanView from "@/views/plan/PlanView";
import NotFoundView from "@/views/NotFoundView";
import store from "@/store";

// * ----------------------------------------------------------------------------------------* //
const routes = [
    {
        path: "/",
        name: "PlugView",
        component: PlugView,
    },
    {
        path: "/terms-of-use",
        name: "TermsOfUseView",
        component: TermsOfUseView,
    },
    {
        path: "/offer",
        name: "OfferView",
        component: OfferView,
    },
    {
        path: "/policy",
        name: "PolicyView",
        component: PolicyView,
    },
    {
        path: "/auth",
        name: "AuthorizationView",
        component: AuthorizationView,
    },
    {
        path: "/questions",
        name: "QuestionsView",
        component: QuestionsView,
    },
    {
        path: "/home",
        name: "HomeView",
        component: HomeView,
    },
    {
        path: "/settings",
        name: "SettingsView",
        component: SettingsView,
    },
    {
        path: "/notes",
        name: "NotesView",
        component: NotesView,
    },
    {
        path: "/sexual-act",
        name: "SexualActView",
        component: SexualActView,
    },
    {
        path: "/pills",
        name: "PillsView",
        component: PillsView,
    },
    {
        path: "/weight",
        name: "WeightView",
        component: WeightView,
    },
    {
        path: "/temperature",
        name: "TemperatureView",
        component: TemperatureView,
    },
    {
        path: "/mood",
        name: "MoodView",
        component: MoodView,
    },
    {
        path: "/note",
        name: "NoteView",
        component: NoteView,
    },
    {
        path: "/water",
        name: "WaterView",
        component: WaterView,
    },
    {
        path: "/symptoms",
        name: "SymptomsView",
        component: SymptomsView,
    },
    {
        path: "/calendar",
        name: "CalendarView",
        component: CalendarView,
    },
    {
        path: "/plan",
        name: "PlanView",
        component: PlanView,
    },
    {
        path: "/:pathMatch(.*)*",
        name: "NotFoundView",
        component: NotFoundView,
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;
// * ----------------------------------------------------------------------------------------* //
