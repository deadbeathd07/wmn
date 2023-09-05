// *
----------------------------------------------------------------------------------------
* //
<template>
    <van-config-provider :theme="theme" class="h-full">
        <van-row
            class="h-full bg-no-repeat bg-clip-border bg-origin-border bg-center bg-cover"
            justify="center"
        >
            <van-col span="24" class="h-full">
                <AppLoader :show="loading" />
                <router-view />
            </van-col>
        </van-row>
    </van-config-provider>
</template>
<script setup>
import appBridge from "./mixins/app-bridge";
import AppLoader from "@/components/main/AppLoader";
import { useStore } from "vuex";
import { computed } from "vue";
import { useRouter } from "vue-router";
import { watch } from "vue";

const store = useStore();
const router = useRouter();

const loading = computed(() => store.state.Auth.loading);
const entry = computed(() => store.state.Auth.entry);
const agreement = computed(() => store.state.Auth.agreement);
const guest = computed(() => store.state.Auth.guest);
const theme = computed(() => store.state.Auth.theme);

// // Testing block START
// //--------------------------------------------------------------------------------------------------

// // This authData and authentificate of it below are necessary for entry in browser (for developing)
let authData = {
    uid: "kjsdhfkjsdl37437fsf9sfdsdfshdfksdkjf",
    firebase_token: ";hjjs",
    theme_mode: "light",
    lang: "en",
    google_id_token: "",
    google_access_token: "",
    platform: "ios",
    apple_user_id: "",
    agreement: true,
};

setTimeout(() => {
    return store.dispatch("Auth/authenticate", authData);
}, 4000);

// // Testing block END
// // --------------------------------------------------------------------------------------------------

appBridge.methods.nativeWaitForEvent("authToken", (authData) => {
    store.dispatch("Auth/authenticate", authData);
});

appBridge.methods.nativeWaitForEvent("authTokenListen", (authData) => {
    store.dispatch("Auth/authenticate", authData);
    store.dispatch("Auth/newGoogleAuth");
});

watch(entry, (newEntry, oldEntry) => {
    if (newEntry === 1) {
        router.push({ name: "TermsOfUseView" });
    }
    if (newEntry === 0) {
        store.dispatch("Auth/getAnswers");
        // store.dispatch('Auth/getSelectedPlan');
        store.dispatch("Auth/getCalendar");
        store.dispatch("Auth/getOvulation");
        store.dispatch("Auth/getFertileDates");
        store.dispatch("Auth/getNotesArr");
    }
});

watch(agreement, (newAgreement, oldAgreement) => {
    if (newAgreement === 1) {
        router.push({ name: "AuthorizationView" });
    }
});

watch(guest, (newGuest, oldGuest) => {
    if (newGuest === 0) {
        router.push({ name: "HomeView" });
    }
});

watch(theme, (newTheme, oldTheme) => {
    if (newTheme == "dark") {
        document.body.classList.add(newTheme);
    } else {
        document.body.classList.remove("dark");
    }
});
</script>
<style>
:root {
    --van-primary-color: rgba(103, 58, 183, 1);
}
</style>
// *
----------------------------------------------------------------------------------------
* //
