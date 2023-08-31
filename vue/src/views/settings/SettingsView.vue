// *
----------------------------------------------------------------------------------------
* //
<template>
    <van-row justify="center" class="h-full bg-white">
        <van-col span="24" class="flex flex-col">
            <van-nav-bar
                :left-text="$t('buttons.go_back')"
                @click-left="onClickLeft"
                left-arrow
            />
            <van-cell-group class="w-full pt-4">
                <van-cell><AuthorizationButtons /></van-cell>
                <ThemeSwitch :initialTheme="theme" />
                <LanguagePicker :locale="locale" />
                <van-cell
                    is-link
                    :title="$t('settings.questions')"
                    :to="{ name: 'QuestionsView' }"
                />
                <van-cell
                    is-link
                    :title="$t('terms_of_use.offer')"
                    :to="{ name: 'OfferView' }"
                />
                <van-cell
                    is-link
                    :title="$t('terms_of_use.policy')"
                    :to="{ name: 'PolicyView' }"
                />
            </van-cell-group>
        </van-col>
    </van-row>
</template>
<script setup>
import AuthorizationButtons from "@/components/specific/AuthorizationButtons.vue";
import ThemeSwitch from "@/components/specific/ThemeSwitch.vue";
import LanguagePicker from "@/components/specific/LanguagePicker.vue";
import { useRouter } from "vue-router";
import { computed } from "vue";
import { useStore } from "vuex";

const store = useStore();
const router = useRouter();

const locale = computed(() => store.state.Auth.locale);
const theme = computed(() => store.state.Auth.theme);

function onClickLeft() {
    router.push({ name: "HomeView" });
}
</script>
<style></style>
// *
----------------------------------------------------------------------------------------
* //
