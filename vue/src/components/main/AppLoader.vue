<template>
	<van-overlay :show="show">
		<div class="flex items-center justify-center h-full">
			<van-loading
				:color="theme == 'dark' ? '#059669' : '#E52C4B'"
				size="60"
				type="spinner"
			/>
		</div>
	</van-overlay>
</template>

<script setup>
import { computed } from 'vue';
import { useStore } from 'vuex';

const store = useStore();

const { show } = defineProps({
	show: Boolean,
});

const theme = computed(() => store.state.Auth.theme);
</script>
<style scoped></style>
