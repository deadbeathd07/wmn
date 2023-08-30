<template>
	<router-view />
	<!-- <global-error :show="showError" /> -->
</template>

<script setup>
//import GlobalError from "../content/GlobalError";
import { computed } from 'vue';
import { useStore } from 'vuex';

const store = useStore();
// const showError = computed(() => store.state.Api.requestError);
</script>
