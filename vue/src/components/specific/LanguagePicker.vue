// *
----------------------------------------------------------------------------------------*
//
<template>
    <van-field
        v-model="selectedLocale"
        center
        isLink
        readonly
        :label="$t('settings.components.picker.lang')"
        @click="showPicker = true"
    />
    <van-popup v-model:show="showPicker" round position="bottom">
        <van-picker
            v-model="language_model"
            :columns="locales"
            @cancel="showPicker = false"
            @confirm="onConfirm"
        />
    </van-popup>
</template>
<script setup>
import { ref } from "vue";
import { useStore } from "vuex";

const store = useStore();

const { locale } = defineProps({ locale: String });

const locales = process.env.VUE_APP_I18N_SUPPORTED_LOCALE.split(",").map(
    (elem) => {
        return { text: elem, value: elem };
    }
);

const selectedLocale = ref(locale);
const language_model = ref([locale]);

const showPicker = ref(false);

function onConfirm({ selectedOptions }) {
    selectedLocale.value = selectedOptions[0]?.text;
    showPicker.value = false;
    store.dispatch("Auth/putLanguage", selectedLocale.value);
    store.dispatch("Auth/getQuestions", selectedLocale.value);
}
</script>
<style scoped></style>
// *
----------------------------------------------------------------------------------------*
//
