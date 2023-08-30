<template>
	<NotesLayout
		:leftText="$t('buttons.go_back')"
		:date="note.date"
		@onClickLeft="onClickLeft"
	>
		<div class="w-full flex items-center justify-around">
			<h2 class="text-decor text-rotate text-5xl text-product-color-500">
				{{ $t('routes.PillsView') }}
			</h2>
			<img
				src="../../assets/pills.png"
				alt="men-wemen_icon"
				class="h-32 w-32"
			/>
		</div>
		<van-cell-group
			inset
			class="w-full mt-5 border-2 transition-colors hover:border-product-color-50 focus:border-product-color-50"
		>
			<van-field
				v-model="pillsText"
				rows="5"
				autosize
				type="textarea"
				maxlength="100"
			/>
		</van-cell-group>
		<van-button
			icon="success"
			type="success"
			class="w-12 h-12 mt-2"
			@click="onClick"
		/>
	</NotesLayout>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import { useStore } from 'vuex';

const store = useStore();
const router = useRouter();

const note = ref(store.state.Auth.notes);

const pillsText = ref(store.state.Auth.notes.pills);

function onClickLeft() {
	router.back();
}

function onClick() {
	store.dispatch('Auth/setPillsText', pillsText.value);
	router.push({ name: 'NotesView' });
}
</script>

<style></style>
