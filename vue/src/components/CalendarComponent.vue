<template>
	<VCalendar
		:locale="locale"
		:initial-page="initial_page"
		:attributes="attributes"
		:disabled-dates="disabledDates"
		:rows="rows"
		borderless
		expanded
		:is-dark="theme === 'dark'"
		class="mb-0 my-calendar"
		@dayclick="dayclick"
	/>
</template>

<script setup>
import { computed, ref } from 'vue';
import { useStore } from 'vuex';

const store = useStore();

const { rows, attributes, initial_page, disabledDates } = defineProps({
	rows: Number,
	attributes: Array,
	initial_page: Object,
	disabledDates: Object,
});

const emit = defineEmits(['click']);

const locale = computed(() => store.state.Auth.locale);
const theme = computed(() => store.state.Auth.theme);

function dayclick(day) {
	return emit('click', day);
}
</script>

<style>
.vc-product-pink {
	--vc-accent-50: #fdf0f2;
	--vc-accent-100: #f8c8d1;
	--vc-accent-200: #f4a4b2;
	--vc-accent-300: #f08396;
	--vc-accent-400: #ec657c;
	--vc-accent-500: #e84762;
	--vc-accent-600: #e52c4b;
	--vc-accent-700: #db1b3b;
	--vc-accent-800: #c51835;
	--vc-accent-900: #b11630;
}

.my-calendar .vc-weekdays {
	background-color: #7345c4;
	margin-top: 10px;
	border-radius: 3px;
	color: white;
}

.my-calendar .vc-weeks {
	background: transparent;
}
.my-calendar .vc-weekday {
	color: white;
}

.my-calendar .is-today .vc-day-content {
	border-radius: 3px;
	background: rgba(103, 58, 183, 0.4);
}

.my-calendar .vc-day {
	margin: 1px;
	padding: 3px 1px;
}

.my-calendar .vc-highlight {
	border-radius: 3px;
	bottom: 0;
}

.my-calendar .vc-day-content:hover {
	background-color: rgba(185, 162, 225, 0.2);
	border-radius: 3px;
}

.my-calendar .vc-dot {
	position: absolute;
	bottom: 5px;
}

.my-calendar .vc-dot.fertile {
	background-color: #e52c4b;
	width: 5px;
	height: 5px;
}

.my-calendar .vc-dot.notes {
	background-color: gray;
	border-radius: 50%;
	width: 6px;
	height: 6px;
	right: 4px;
	top: 3px;
}

.my-calendar .vc-dot.ovulation {
	background-color: #f08396;
	width: 10px;
	height: 10px;
	margin-bottom: -3px;
}

.my-calendar .vc-dot.protected {
	left: 4px;
	bottom: 2px;
	background-color: transparent;
	background-image: url('../assets/heart.png');
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
	width: 10px;
	height: 8px;
	border-radius: 0;
}

.my-calendar .vc-dot.unprotected {
	left: 2px;
	bottom: 1px;
	background-color: transparent;
	background-image: url('../assets/heart-contur.png');
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
	width: 10px;
	height: 8px;
	border-radius: 0;
}
</style>
