<template>
	<van-grid :column-num="1" :border="false" :center="true" class="text-center">
		<van-grid-item>
			<icon-logo-wmn class="w-32 h-auto md:w-52" />
		</van-grid-item>
		<van-grid-item>
			<p class="md:max-w-xl">{{ $t('product.slogan') }}</p>
		</van-grid-item>
	</van-grid>
</template>

<script setup>
import IconLogoWmn from '@/components/icons/IconLogoWmn.vue';
</script>

<style></style>
