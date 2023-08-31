// *
----------------------------------------------------------------------------------------
* //
<template>
    <div class="w-full h-full">
        <van-nav-bar @click-right="onClickRight">
            <template #right>
                <van-icon name="setting" size="30" />
            </template>
        </van-nav-bar>
        <div class="flex flex-col items-center px-5">
            <CalendarComponent
                :initial_page="initial_page"
                :attributes="attributes"
                :currentDate="currentDate"
                @click="dayClick"
            />
            <van-button
                icon="edit"
                type="primary"
                class="mb-6 text-decor text-xl"
                :to="{ name: 'CalendarView' }"
                >{{ $t("buttons.change_period_dates") }}</van-button
            >
            <div
                class="w-100 flex flex-col items-center justify-center mt-4 bg-purple-100 p-4 rounded-md"
                @click="onClickActiveDay"
            >
                <p
                    class="text-decor text-2xl text-center transition-colors text-product-color-700 hover:text-product-color-300"
                >
                    {{ activeDay }}
                </p>
                <NotesList :note="note" />
                <p
                    class="text-decor text-xl text-center transition-colors text-product-color-700 hover:text-product-color-300"
                >
                    {{ $t("buttons.add_note") }}
                </p>
            </div>
        </div>
    </div>
</template>
<script setup>
import CalendarComponent from "@/components/CalendarComponent.vue";
import NotesList from "@/components/NotesList.vue";
import secondaryFunctions from "@/mixins/secondary-functions";
import calendarFunctions from "@/mixins/calendar-functions";
import { computed, ref } from "vue";
import { useRouter } from "vue-router";
import { useStore } from "vuex";

const store = useStore();
const router = useRouter();

const currentDate = new Date(secondaryFunctions.methods.formatter(new Date()));
const initial_page = {
    month: currentDate.getMonth() + 1,
    year: currentDate.getFullYear(),
};
const calendar = computed(() => store.state.Auth.calendar);
const ovulation = computed(() => store.state.Auth.ovulation);
const fertileDates = computed(() => store.state.Auth.fertileDates);
const notesArr = computed(() => store.state.Auth.notesArr);
const note = computed(() => store.state.Auth.notes);

const attributes = ref(
    calendarFunctions.methods.getAttrsWithNotes(
        calendar.value,
        ovulation.value,
        fertileDates.value,
        notesArr.value,
        currentDate
    )
);
const activeDay = ref(store.state.Auth.notes.date);

const patternNote = {
    date: null,
    sexual_act_protected: null,
    sexual_act_unprotected: null,
    orgasm: null,
    pills: null,
    notes: null,
    symptoms: null,
    temperature: null,
    weight: null,
    water: 0,
    mood: null,
};

function dayClick(day) {
    activeDay.value = day.id;
    let j = calendarFunctions.methods.doesHaveDate(notesArr.value, day.id);
    if (j == -1) {
        store.dispatch("Auth/setNotes", patternNote);
    } else {
        store.dispatch("Auth/setNotes", notesArr.value[j]);
    }
    store.dispatch("Auth/setActiveDay", day.id);

    attributes.value = calendarFunctions.methods.getAttrsWithNotes(
        calendar.value,
        ovulation.value,
        fertileDates.value,
        notesArr.value,
        currentDate
    );
}

function onClickActiveDay() {
    if (activeDay.value) {
        router.push({ name: "NotesView" });
    }
}

function onClickRight() {
    router.push({ name: "SettingsView" });
}
</script>
<style scoped></style>
// *
----------------------------------------------------------------------------------------
* //
