// *
----------------------------------------------------------------------------------------
* //
<template>
    <div class="w-full h-full">
        <van-nav-bar
            v-if="entry === 0"
            :left-text="$t('buttons.go_back')"
            @click-left="onClickLeft"
            left-arrow
            class="bg-white"
        />
        <QuestionsComponent
            class="pt-8"
            :questions="questions"
            :answers="answers"
            :currentDate="currentDate"
            :entry="entry"
            :isDark="theme === 'dark'"
            @onSubmit="setAnswers"
        />
    </div>
</template>
<script setup>
import { useStore } from "vuex";
import QuestionsComponent from "@/components/QuestionsComponent.vue";
import { computed } from "vue";
import { useRouter } from "vue-router";

const currentDate = new Date();

const store = useStore();
const router = useRouter();

const questions = computed(() => store.state.Auth.questions);
const answers = computed(() => store.state.Auth.answers);
const entry = computed(() => store.state.Auth.entry);
const theme = computed(() => store.state.Auth.theme);

function onClickLeft() {
    return router.back();
}

function setAnswers(answers_model) {
    if (entry.value === 1) {
        store.dispatch("Auth/setAnswers", answers_model);
        store.dispatch("Auth/setCalendar");
        store.dispatch("Auth/setOvulation");
        store.dispatch("Auth/setFertileDates");
        router.push({ name: "PlanView" });
    } else {
        store.dispatch("Auth/updateAnswers", answers_model);
        store.dispatch("Auth/updateCalendarOnAnswers");
        store.dispatch("Auth/updateOvulationOnAnswers");
        store.dispatch("Auth/updateFertileDatesOnAnswers");
        router.push({ name: "HomeView" });
    }
}
</script>
<style scoped></style>
// *
----------------------------------------------------------------------------------------
* //
