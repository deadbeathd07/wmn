// *
----------------------------------------------------------------------------------------
* //
<template>
    <NotesLayout
        :leftText="$t('buttons.go_back')"
        :date="note.date"
        @onClickLeft="onClickLeft"
    >
        <Fireworks class="w-full h-full absolute" v-if="pli"></Fireworks>
        <div class="w-full flex items-center justify-around">
            <h2 class="text-decor text-rotate text-5xl text-product-color-500">
                {{ $t("routes.WaterView") }}
            </h2>
            <img
                src="../../assets/glass-of-water.png"
                alt="glass of water"
                class="h-32 w-32"
            />
        </div>
        <div class="flex items-center">
            <van-button
                icon="minus"
                round
                type="danger"
                class="w-12 h-12 bg-red-400 text-white border-none"
                @click="onRemoveWater"
            />
            <van-circle
                v-model:current-rate="currentRate"
                :rate="rate"
                :speed="100"
                :text="text"
                :stroke-width="40"
                :color="gradientColor"
                layer-color="#D3D3D3"
                size="200px"
                class="circle my-5 mx-3"
            />
            <van-button
                icon="plus"
                round
                class="w-12 h-12 bg-blue-400 text-white border-none"
                @click="onAddWater"
            />
        </div>
        <van-button
            icon="success"
            type="success"
            class="w-12 h-12 mt-6"
            @click="onClick"
        />
    </NotesLayout>
</template>

<script setup>
import { computed, ref } from "vue";
import { useRouter } from "vue-router";
import { useStore } from "vuex";
import Fireworks from "@fireworks-js/vue";

const store = useStore();
const router = useRouter();

const maxWater = 1.5;
const gradientColor = {
    "0%": "#3fecff",
    "100%": "#6149f6",
};

const water = ref(store.state.Auth.notes.water);
const currentRate = ref(0);
const rate = ref((store.state.Auth.notes.water * 100) / 1.5);
const note = ref(store.state.Auth.notes);
const pli = ref(false);

if (water.value == null) {
    water.value = 0;
}

const text = computed(() => `${water.value}/${maxWater}`);

function onClickLeft() {
    router.back();
}

function onAddWater() {
    if (water.value < maxWater) {
        water.value += 0.25;
        rate.value += 25 / 1.5;
    }
    if (water.value === maxWater) {
        pli.value = true;
        setTimeout(() => {
            pli.value = false;
        }, 3000);
    }
}

function onRemoveWater() {
    if (water.value > 0) {
        water.value -= 0.25;
        rate.value -= 25 / 1.5;
    }
}

function onClick() {
    store.dispatch("Auth/setWater", water.value);
    router.push({ name: "NotesView" });
}
</script>

<style>
.circle > .van-circle__text {
    font-size: 2rem;
    font-weight: 500;
}
</style>
// *
----------------------------------------------------------------------------------------
* //
