// *
----------------------------------------------------------------------------------------
* //
<template>
    <div class="p-4 flex flex-col items-center h-full">
        <IconLogoWmn :width="80" />
        <div
            class="flex flex-col items-center justify-between text-center flex-1 bg-white w-full mb-2 py-6 px-3"
        >
            <div class="flex flex-0 items-center justify-center">
                <h2 class="text-5xl text-decor">
                    {{ $t("plan.title") }}
                </h2>
                <van-icon
                    name="question"
                    size="30"
                    color="#936FD1"
                    class="ml-2"
                    @click="onClick"
                />
                <van-dialog v-model:show="show">
                    <p class="p-5 text-lg">{{ plan[1].description }}</p>
                </van-dialog>
            </div>
            <p class="flex-0 text-center text-decor text-4xl px-12 m-4">
                {{ $t("plan.message") }}
            </p>
            <div class="flex flex-1 w-full mb-6">
                <div
                    class="flex flex-col items-center justify-center flex-1 rounded-md border-4 border-gray-400"
                >
                    <h4 class="text-xl font-medium">{{ $t("plan.basic") }}</h4>
                    <p class="text-2xl font-medium mt-4">
                        {{ plan[1].price }} €/mon
                    </p>
                </div>
                <div
                    class="flex flex-col items-center justify-center flex-1 rounded-md border-4 border-yellow-500 ml-2"
                >
                    <h4 class="text-xl font-medium">
                        {{ $t("plan.premium") }}
                    </h4>
                    <p class="text-2xl font-medium mt-4">
                        {{ plan[2].price }} €/year
                    </p>
                    <p
                        class="px-3 py-1 rounded-md bg-product-color-300 text-3xl text-white"
                    >
                        -50%
                    </p>
                </div>
            </div>
            <van-button type="primary">{{
                $t("buttons.plan_free")
            }}</van-button>
            <router-link
                class="flex flex-0 mt-6 items-center cursor-pointer font-medium text-l transition-colors hover:text-product-color-pink-600"
                :to="{ name: 'HomeView' }"
                @click="getFreePlan"
            >
                <span class="inline-block pb-1">{{ $t("buttons.skip") }}</span>
                <van-icon name="arrow" size="15" class="ml-2" />
            </router-link>
        </div>
    </div>
</template>
<script setup>
import "@/plugins/nativescript-webview-interface.js";
import IconLogoWmn from "@/components/icons/IconLogoWmn.vue";
import { computed, ref } from "vue";
import { useRouter } from "vue-router";
import { useStore } from "vuex";

const store = useStore();
const router = useRouter();

const show = ref(false);

const plan = computed(() => store.state.Auth.plan);
const theme = computed(() => store.state.Auth.theme);

function onClick() {
    show.value = true;
}

function getFreePlan() {
    // store.dispatch('Auth/putSelectedPlan', plan.value[0].plan_id);
    store.dispatch("Auth/putEntry", 0);
    router.push({ name: "HomeView" });
}
</script>
<style>
.text-decor {
    font-family: "Caveat", cursive;
}
.text-rotate {
    rotate: -15deg;
}
</style>
// *
----------------------------------------------------------------------------------------
* //
