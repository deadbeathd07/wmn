<template>
	<NotesLayout
		:leftText="$t('buttons.go_back')"
		:date="note.date"
		@onClickLeft="onClickLeft"
	>
		<div class="w-full flex items-center justify-around">
			<h2 class="text-decor text-rotate text-5xl">
				{{ $t('routes.TemperatureView') }}
			</h2>
			<img
				src="../../assets/thermometer.png"
				alt="thermometer"
				class="h-32 w-32"
			/>
		</div>
		<van-cell-group
			inset
			class="w-full mt-5 border-2 transition-colors hover:border-product-color-50 focus:border-product-color-50"
		>
			<van-field
				v-model="fieldValue"
				is-link
				readonly
				@click="showPicker = true"
			/>
			<van-popup v-model:show="showPicker" round position="bottom">
				<van-picker
					:columns="columns"
					@cancel="showPicker = false"
					@confirm="onConfirm"
				/>
			</van-popup>
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
import secondaryFunctions from '../../mixins/secondary-functions.js';

const store = useStore();
const router = useRouter();
const columns = secondaryFunctions.methods.getDoubleColumns(36, 42, 0, 9);

const note = ref(store.state.Auth.notes);

const fieldValue = ref(store.state.Auth.notes.temperature);
const showPicker = ref(false);

function onClickLeft() {
	router.back();
}

function onConfirm({ selectedOptions }) {
	showPicker.value = false;
	fieldValue.value = Number(
		`${selectedOptions[0].text}.${selectedOptions[1].text}`
	);
}

function onClick() {
	store.dispatch('Auth/setTemperature', fieldValue.value);
	router.push({ name: 'NotesView' });
}
</script>

<style></style>
