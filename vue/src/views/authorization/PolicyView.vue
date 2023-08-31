// *
----------------------------------------------------------------------------------------
* //
<template>
    <AgreementLayout
        :leftText="$t('buttons.go_back')"
        @onClickLeft="onClickLeft"
    >
        <div class="w-100 text-center">
            <p class="mt-10">There is Policy</p>
        </div>
    </AgreementLayout>
</template>
<script setup>
import AgreementLayout from "@/components/layouts/AgreementLayout.vue";
import { computed } from "vue";
import { useRouter } from "vue-router";
import { useStore } from "vuex";

const store = useStore();
const router = useRouter();

const entry = computed(() => store.state.Auth.entry);

function onClickLeft() {
    return entry.value === 1
        ? router.push({ name: "TermsOfUseView" })
        : router.push({ name: "SettingsView" });
}
</script>
// *
----------------------------------------------------------------------------------------
* //
