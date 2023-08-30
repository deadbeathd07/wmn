<template>
	<div class="w-full h-full">
		<van-nav-bar
			left-arrow
			:left-text="$t('buttons.go_back')"
			@click-left="onClickLeft"
			@click-right="onClickRight"
		>
			<template #right>
				<van-icon name="setting" size="30" />
			</template>
		</van-nav-bar>
		<div class="flex flex-col items-center px-5">
			<CalendarComponent
				:initial_page="initial_page"
				:disabled-dates="disabledDates"
				:rows="2"
				:attributes="attributes"
				:currentDate="currentDate"
				@click="dayClick"
			/>
		</div>
	</div>
</template>

<script setup>
import CalendarComponent from '@/components/CalendarComponent.vue';
import secondaryFunctions from '@/mixins/secondary-functions';
import calendarFunctions from '@/mixins/calendar-functions';
import { ref } from 'vue';
import { computed } from 'vue';
import { useRouter } from 'vue-router';
import { useStore } from 'vuex';

const store = useStore();
const router = useRouter();
const currentDate = new Date(secondaryFunctions.methods.formatter(new Date()));
const initial_page = {
	month: currentDate.getMonth() + 1,
	year: currentDate.getFullYear(),
};
const disabledDates = ref([
	{
		start: new Date(
			currentDate.getFullYear(),
			currentDate.getMonth(),
			currentDate.getDate() + 1
		),
		end: null,
	},
]);
const calendar = computed(() => store.state.Auth.calendar);
const ovulation = computed(() => store.state.Auth.ovulation);
const fertileDates = computed(() => store.state.Auth.fertileDates);
const answers = computed(() => store.state.Auth.answers);

const attributes = ref(
	calendarFunctions.methods.getAttrs(
		calendar.value,
		ovulation.value,
		fertileDates.value,
		currentDate
	)
);
const activeDay = ref(store.state.Auth.notes.date);

function dayClick(day) {
	if (!(new Date(day.id).getTime() > currentDate.getTime())) {
		activeDay.value = day.id;
		let i = calendarFunctions.methods.doesHaveDate(calendar.value, day.id);
		if (i == -1) {
			calendar.value.push({ date: day.id });
		} else {
			calendar.value.splice(i, 1);
		}
		store.dispatch('Auth/setActiveDay', day.id);
	} else {
		activeDay.value = null;
		store.dispatch('Auth/setActiveDay', null);
		store.dispatch('Auth/setNotes', patternNote);
	}
	attributes.value = calendarFunctions.methods.getAttrs(
		calendar.value,
		ovulation.value,
		fertileDates.value,
		currentDate
	);
	store.dispatch(
		'Auth/updateCalendar',
		calendarFunctions.methods.addIndexDay(
			calendarFunctions.methods.sortDates(calendar.value)
		)
	);
}

function onClickLeft() {
	router.back();
}

function onClickRight() {
	router.push({ name: 'SettingsView' });
}
</script>

<style></style>
