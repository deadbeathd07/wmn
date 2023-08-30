<template>
	<div class="bg-white">
		<van-nav-bar
			:left-text="leftText"
			@click-left="emits('onClickLeft')"
			left-arrow
		/>
		<slot></slot>
	</div>
</template>

<script setup>
const { leftText } = defineProps({
	leftText: String,
});

const emits = defineEmits(['onClickLeft']);
</script>

<style></style>
