// *
----------------------------------------------------------------------------------------
* //
<template>
    <div class="px-4 h-full flex flex-col items-center py-6">
        <IconLogoWmn :width="150" />
        <p class="text-xl font-semibold text-black">
            {{ $t("product.name") }}
        </p>
        <div
            class="bg-no-repeat bg-clip-border bg-origin-border bg-center bg-contain flex-1 flex flex-col items-center justify-center text-center font-medium"
        >
            <p class="md:max-w-xl text-sm mb-8 px-7">
                {{ $t("terms_of_use.description") }}
            </p>
            <router-link
                class="cursor-pointer transition-colors text-product-color-700 hover:text-product-color-300 mb-3"
                :to="{ name: 'OfferView' }"
            >
                {{ $t("terms_of_use.offer") }}
            </router-link>
            <router-link
                class="cursor-pointer transition-colors text-product-color-700 hover:text-product-color-300"
                :to="{ name: 'PolicyView' }"
            >
                {{ $t("terms_of_use.policy") }}
            </router-link>
        </div>
        <van-button
            type="primary"
            size="large"
            color="primary"
            :to="{ name: 'AuthorizationView' }"
            @click="confirm"
        >
            <span class="text-white">{{ $t("buttons.accept") }}</span>
        </van-button>
    </div>
</template>

<script setup>
import IconLogoWmn from "@/components/icons/IconLogoWmn.vue";
import { useStore } from "vuex";

const store = useStore();

function confirm() {
    store.dispatch("Auth/putAgreement", true);
}
</script>

<style></style>
// *
----------------------------------------------------------------------------------------
* //
