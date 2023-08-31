// *
----------------------------------------------------------------------------------------*
//
<template>
    <van-space direction="vertical" class="w-full h-full">
        <van-button
            v-if="nativeData.platform === 'ios'"
            type="primary"
            size="large"
            color="#1d1d1d"
            round
            @click="appleSign"
        >
            <template v-slot:icon>
                <font-awesome-icon
                    icon="fa-brands fa-apple"
                    size="lg"
                    class="mr-1"
                />
            </template>
            {{ "Apple" }}
        </van-button>
        <van-button
            type="primary"
            plain
            size="large"
            color="#1d1d1d"
            round
            @click="googleSign"
        >
            <template v-slot:icon>
                <font-awesome-icon icon="fa-brands fa-google" />
            </template>
            {{ "Google" }}
        </van-button>
    </van-space>
</template>

<script setup>
import appBridge from "@/mixins/app-bridge";
import { useStore } from "vuex";
import { computed } from "vue";

const store = useStore();

const nativeData = computed(() => store.state.Auth.nativeData);

function googleSign() {
    appBridge.methods.nativeSendEvent("googleSignin");
}

function appleSign() {
    appBridge.methods.nativeSendEvent("appleSignin");
}
</script>

<style></style>
// *
----------------------------------------------------------------------------------------*
//
