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
                {{ $t("routes.SexualActView") }}
            </h2>
            <img
                src="../../assets/genders.png"
                alt="men-wemen_icon"
                class="h-32 w-32"
            />
        </div>
        <div class="w-full">
            <h3 class="text-lg font-medium">
                {{ $t("SexualActView.protection") }}
            </h3>
            <div class="w-full flex bg-pink-200 rounded-md">
                <div class="flex flex-1 flex-col items-center">
                    <img
                        src="../../assets/condom.png"
                        alt="men-wemen_icon"
                        class="h-28 w-28 m-4 border-2 border-transparent rounded-md p-1 transition-colors hover:border-red-600"
                        :class="{
                            'border-red-600':
                                sexualActOptions.sexual_act_protected,
                        }"
                        @click="getProtectOption(1)"
                    />
                    <p class="w-full p-2 text-sm">
                        {{ $t("SexualActView.condom") }}
                    </p>
                </div>
                <div class="flex flex-1 flex-col items-center">
                    <img
                        src="../../assets/no-condom.png"
                        alt="men-wemen_icon"
                        :class="{
                            'border-red-600':
                                sexualActOptions.sexual_act_unprotected,
                        }"
                        class="h-28 w-28 m-4 border-2 border-transparent rounded-md p-1 transition-colors hover:border-red-600"
                        @click="getProtectOption(0)"
                    />
                    <p class="w-full p-2 text-sm">
                        {{ $t("SexualActView.no_condom") }}
                    </p>
                </div>
            </div>
        </div>
        <div class="w-full mt-3">
            <h3 class="text-lg font-medium">
                {{ $t("SexualActView.orgasm") }}
            </h3>
            <div class="w-full flex bg-white rounded-md">
                <div class="flex flex-1 flex-col items-center">
                    <img
                        src="../../assets/smile.png"
                        alt="men-wemen_icon"
                        :class="{ 'border-red-600': sexualActOptions.orgasm }"
                        class="h-28 w-28 m-1 border-2 border-transparent rounded-md p-1 transition-colors hover:border-red-600"
                        @click="getOrgasmOption(true)"
                    />
                    <p class="w-full bg-white p-2 rounded-bl-md">
                        {{ $t("SexualActView.buttons.yes") }}
                    </p>
                </div>
                <div class="flex flex-1 flex-col items-center">
                    <img
                        src="../../assets/sad.png"
                        alt="men-wemen_icon"
                        :class="{
                            'border-red-600': sexualActOptions.orgasm == false,
                        }"
                        class="h-28 w-28 m-1 border-2 border-transparent rounded-md p-1 transition-colors hover:border-red-600"
                        @click="getOrgasmOption(false)"
                    />
                    <p class="w-full bg-white p-2 rounded-br-md">
                        {{ $t("SexualActView.buttons.no") }}
                    </p>
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

const sexualActOptions = ref(store.state.Auth.notes);

function getProtectOption(num) {
    switch (num) {
        case 1:
            sexualActOptions.value.sexual_act_protected =
                !sexualActOptions.value.sexual_act_protected;
            sexualActOptions.value.sexual_act_unprotected = false;
            break;
        case 0:
            sexualActOptions.value.sexual_act_unprotected =
                !sexualActOptions.value.sexual_act_unprotected;
            sexualActOptions.value.sexual_act_protected = false;
            break;
    }
}

function getOrgasmOption(bool) {
    switch (bool) {
        case true:
            sexualActOptions.value.orgasm = sexualActOptions.value.orgasm
                ? null
                : bool;
            break;
        case false:
            sexualActOptions.value.orgasm =
                sexualActOptions.value.orgasm == false ? null : bool;
    }
}

function onClickLeft() {
    router.back();
}

function onClick() {
    store.dispatch("Auth/setSexualOptions", sexualActOptions.value);
    router.push({ name: "NotesView" });
}
</script>

<style></style>
// *
----------------------------------------------------------------------------------------
* //
