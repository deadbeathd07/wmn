// *
----------------------------------------------------------------------------------------
* //
<template>
    <NotesLayout
        :leftText="$t('buttons.go_back')"
        :date="note.date"
        @onClickLeft="onClickLeft"
    >
        <div class="w-full flex items-center justify-around">
            <h2 class="text-decor text-rotate text-5xl text-product-color-500">
                {{ $t("routes.MoodView") }}
            </h2>
        </div>
        <div class="w-full">
            <div class="w-full flex flex-col">
                <div class="flex flex-1 flex-col items-center">
                    <img
                        src="../../assets/smile.png"
                        alt="men-wemen_icon"
                        class="h-28 w-28 m-4 border-2 border-transparent rounded-md p-1 transition-colors hover:border-red-600"
                        :class="{ 'border-red-600': mood == 2 }"
                        @click="setMood(2)"
                    />
                </div>
                <div class="flex flex-1 flex-col items-center">
                    <img
                        src="../../assets/straight.png"
                        alt="men-wemen_icon"
                        :class="{ 'border-red-600': mood == 1 }"
                        class="h-28 w-28 m-4 border-2 border-transparent rounded-md p-1 transition-colors hover:border-red-600"
                        @click="setMood(1)"
                    />
                </div>
                <div class="flex flex-1 flex-col items-center">
                    <img
                        src="../../assets/sad.png"
                        alt="men-wemen_icon"
                        :class="{ 'border-red-600': mood == 0 }"
                        class="h-28 w-28 m-4 border-2 border-transparent rounded-md p-1 transition-colors hover:border-red-600"
                        @click="setMood(0)"
                    />
                </div>
            </div>
        </div>
        <van-button
            icon="success"
            type="success"
            class="w-12 h-12 mt-2"
            @click="onClick"
        />
    </NotesLayout>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import { useStore } from "vuex";

const store = useStore();
const router = useRouter();

const note = ref(store.state.Auth.notes);

const mood = ref(store.state.Auth.notes.mood);

function onClickLeft() {
    router.back();
}

function setMood(num) {
    mood.value = mood.value == num ? null : num;
}

function onClick() {
    store.dispatch("Auth/setMood", mood.value);
    router.push({ name: "NotesView" });
}
</script>

<style></style>
// *
----------------------------------------------------------------------------------------
* //
