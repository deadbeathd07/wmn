// *
----------------------------------------------------------------------------------------
* //
<template>
    <div class="flex flex-col w-full h-full items-center p-4">
        <div
            class="flex-1 flex flex-col items-center w-full bg-cloud bg-no-repeat bg-clip-border bg-origin-border bg-center bg-contain"
        >
            <p
                class="flex-0 mt-14 text-5xl font-bold text-decor text-rotate text-product-color-400"
            >
                {{ $t("messages.greeting") }}
            </p>
            <div
                class="flex-1 flex flex-col items-center justify-between w-full text-product-color-400 text-center mt-24"
            >
                <div class="text-decor text-2xl mb-4">
                    {{ $t("authorization.title") }}
                </div>
                <AuthorizationButtons className="w-48 h-full" />
            </div>
        </div>
        <router-link
            class="block flex-0 font-medium text-2xl transition-colors hover:text-product-color-pink-600"
            :to="{ name: entry === 1 ? 'QuestionsView' : 'HomeView' }"
            @click="onClick"
        >
            <span
                class="inline-block pb-1 text-product-color-700 transition-colors hover:text-product-color-300"
                >{{ $t("buttons.skip") }}</span
            >
        </router-link>
    </div>
</template>
<script setup>
import "@/plugins/nativescript-webview-interface.js";
import AuthorizationButtons from "@/components/specific/AuthorizationButtons.vue";
import { computed } from "vue";
import { useStore } from "vuex";

const store = useStore();
const entry = computed(() => store.state.Auth.entry);

function onClick() {
    return store.dispatch("Auth/putGuest", true);
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
