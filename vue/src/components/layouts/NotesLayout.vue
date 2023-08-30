<template>
	<van-nav-bar
		:left-text="leftText"
		:title="date"
		left-arrow
		@click-left="emits('onClickLeft')"
		class="w-full"
	/>
	<div class="flex flex-col text-center items-center px-5">
		<slot></slot>
	</div>
</template>

<script setup>
const { leftText, date } = defineProps({
	leftText: String,
	date: String,
});

const emits = defineEmits(['onClickLeft']);
</script>

<style>
.van-nav-bar {
	background: transparent;
}
</style>
