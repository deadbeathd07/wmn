<template>
	<van-space wrap class="w-full mt-3 text-sm grid grid-cols-2">
		<p v-if="note.sexual_act_protected || note.sexual_act_unprotected">
			<font-awesome-icon icon="fa-solid fa-heart" class="text-red-600" />
			{{
				(note.sexual_act_protected && $t('SexualActView.condom')) ||
				(note.sexual_act_unprotected && $t('SexualActView.no_condom'))
			}}
		</p>
		<p v-if="note.weight">
			<font-awesome-icon
				icon="fa-solid fa-weight-scale"
				class="text-blue-600"
			/>
			{{ note.weight }}
		</p>
		<p v-if="note.mood">
			<font-awesome-icon
				icon="fa-solid fa-face-smile"
				class="text-yellow-500"
			/>
			{{
				(note.mood == 2 && 'Good') ||
				(note.mood == 1 && 'Straight') ||
				(note.mood == 0 && 'Bad')
			}}
		</p>
		<p v-if="note.temperature">
			<font-awesome-icon icon="fa-solid fa-thermometer" class="text-gray-500" />
			{{ note.temperature }}
		</p>

		<p v-if="note.water">
			<font-awesome-icon icon="fa-solid fa-glass-water" class="text-blue-600" />
			{{ note.water }}
		</p>

		<p v-if="note.pills" class="max-w-xs van-ellipsis">
			<font-awesome-icon icon="fa-solid fa-pills" class="text-gray-500" />
			{{ note.pills }}
		</p>
		<p v-if="note.notes" class="max-w-xs van-ellipsis">
			<font-awesome-icon
				icon="fa-solid fa-note-sticky"
				class="text-yellow-500"
			/>
			{{ note.notes }}
		</p>
		<p v-if="note.symptoms" class="max-w-xs van-ellipsis">
			<font-awesome-icon icon="fa-solid fa-kit-medical" class="text-red-600" />
			{{ note.symptoms }}
		</p>
	</van-space>
</template>

<script setup>
const { note } = defineProps({ note: Object });
</script>

<style></style>
