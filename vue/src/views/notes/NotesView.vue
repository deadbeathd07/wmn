<template>
	<NotesLayout
		:leftText="$t('buttons.go_back')"
		:date="note.date"
		@onClickLeft="onClickLeft"
	>
		<h2
			class="my-6 text-4xl font-semibold text-white text-decor bg-product-color-400 py-2 px-4 rounded-md"
		>
			{{ $t('routes.NotesView') }}
		</h2>
		<van-cell-group inset class="w-full">
			<van-cell is-link :to="{ name: 'SexualActView' }">
				<template #title>
					<div class="flex items-center">
						<span class="align-middle mr-2">{{
							$t('page_links.SexualActView')
						}}</span>
						<font-awesome-icon icon="fa-solid fa-heart" class="text-red-600" />
					</div>
				</template>
			</van-cell>
			<van-cell is-link :to="{ name: 'PillsView' }" v-if="plan_id !== 3">
				<template #title>
					<div class="flex items-center">
						<span class="align-middle mr-2">{{
							$t('page_links.PillsView')
						}}</span>
						<font-awesome-icon icon="fa-solid fa-pills" class="text-gray-500" />
					</div>
				</template>
			</van-cell>
			<van-cell is-link :to="{ name: 'WeightView' }" v-if="plan_id !== 3">
				<template #title>
					<div class="flex items-center">
						<span class="align-middle mr-2">{{
							$t('page_links.WeightView')
						}}</span>
						<font-awesome-icon
							icon="fa-solid fa-weight-scale"
							class="text-blue-600"
						/>
					</div>
				</template>
			</van-cell>
			<van-cell is-link :to="{ name: 'TemperatureView' }" v-if="plan_id !== 3">
				<template #title>
					<div class="flex items-center">
						<span class="align-middle mr-2">{{
							$t('page_links.TemperatureView')
						}}</span>
						<font-awesome-icon
							icon="fa-solid fa-thermometer"
							class="text-gray-500"
						/>
					</div>
				</template>
			</van-cell>
			<van-cell is-link :to="{ name: 'MoodView' }" v-if="plan_id !== 3">
				<template #title>
					<div class="flex items-center">
						<span class="align-middle mr-2">{{
							$t('page_links.MoodView')
						}}</span>
						<font-awesome-icon
							icon="fa-solid fa-face-smile"
							class="text-yellow-500"
						/>
					</div>
				</template>
			</van-cell>
			<van-cell is-link :to="{ name: 'NoteView' }" v-if="plan_id !== 3">
				<template #title>
					<div class="flex items-center">
						<span class="align-middle mr-2">{{
							$t('page_links.NoteView')
						}}</span>
						<font-awesome-icon
							icon="fa-solid fa-note-sticky"
							class="text-yellow-500"
						/>
					</div>
				</template>
			</van-cell>
			<van-cell is-link :to="{ name: 'WaterView' }" v-if="plan_id !== 3">
				<template #title>
					<div class="flex items-center">
						<span class="align-middle mr-2">{{
							$t('page_links.WaterView')
						}}</span>
						<font-awesome-icon
							icon="fa-solid fa-glass-water"
							class="text-blue-600"
						/>
					</div>
				</template>
			</van-cell>
			<van-cell is-link :to="{ name: 'SymptomsView' }" v-if="plan_id !== 3">
				<template #title>
					<div class="flex items-center">
						<span class="align-middle mr-2">{{
							$t('page_links.SymptomsView')
						}}</span>
						<font-awesome-icon
							icon="fa-solid fa-kit-medical"
							class="text-red-600"
						/>
					</div>
				</template>
			</van-cell>
			<van-button
				icon="success"
				type="success"
				class="my-2"
				title="Confirm"
				@click="onClick"
			/>
		</van-cell-group>
	</NotesLayout>
</template>

<script setup>
import calendarFunctions from '@/mixins/calendar-functions';
import NotesLayout from '@/components/layouts/NotesLayout.vue';
import { computed, ref } from 'vue';
import { useRouter } from 'vue-router';
import { useStore } from 'vuex';

const store = useStore();
const router = useRouter();

const note = ref(store.state.Auth.notes);
const notesArr = ref(store.state.Auth.notesArr);

const plan_id = computed(() => store.state.Auth.plan_id);

let j = calendarFunctions.methods.doesHaveDate(notesArr.value, note.value.date);

function onClickLeft() {
	router.push({ name: 'HomeView' });
}

function onClick() {
	if (j >= 0) {
		notesArr.value.splice(j, 1, note.value);
	} else {
		notesArr.value.push(note.value);
	}

	store.dispatch('Auth/setNotesArr', notesArr.value);
	store.dispatch('Auth/setNotes', {
		date: null,
		sexual_act_protected: false,
		sexual_act_unprotected: false,
		orgasm: null,
		pills: null,
		weight: null,
		temperature: null,
		mood: null,
		notes: null,
		water: null,
		symptoms: null,
	});

	router.push({ name: 'HomeView' });
}
</script>

<style></style>
