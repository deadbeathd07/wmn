// *
----------------------------------------------------------------------------------------*
//
<template>
    <van-cell
        center
        :title="
            checked ? $t('settings.theme.dark') : $t('settings.theme.light')
        "
    >
        <template #right-icon>
            <van-switch v-model="checked" @change="changeTheme" />
        </template>
    </van-cell>
</template>

<script setup>
import appBridge from "@/mixins/app-bridge";
import { ref } from "vue";
import { onMounted } from "vue";
import { useStore } from "vuex";

const store = useStore();

const checked = ref(false);

const theme = ref(store.state.Auth.theme);

onMounted(() => {
    if (theme.value === "dark") {
        checked.value = true;
    }
});

function changeTheme() {
    if (checked.value) {
        store.dispatch("Auth/putTheme", "dark");
        // appBridge.methods.nativeSendEvent('setThemeMode', 'dark');
    } else {
        store.dispatch("Auth/putTheme", "light");
        // appBridge.methods.nativeSendEvent('setThemeMode', 'light');
    }
}
</script>

<style scoped></style>
// *
----------------------------------------------------------------------------------------*
//
