import Account from '@/plugins/api/factories/Account';
import appBridge from '@/mixins/app-bridge';
import secondaryFunctions from '@/mixins/secondary-functions';

export const state = {
	loading: false,
	nativeData: null,
	authToken: null,
	entry: null,
	agreement: null,
	guest: null,
	locale: process.env.VUE_APP_I18N_DEFAULT_LOCALE,
	theme: 'light',
	answers: {
		name: '',
		birth_date: secondaryFunctions.methods.formatter(new Date()),
		duration_period_last: 5,
		duration_cycle_last: 28,
		last_period_date: secondaryFunctions.methods.formatter(new Date()),
	},
	questions: {},
	plan: {},
	plan_id: null,
	calendar: [],
	ovulation: [],
	fertileDates: [],
	notes: {
		date: null,
		sexual_act_protected: null,
		sexual_act_unprotected: null,
		orgasm: null,
		pills: null,
		notes: null,
		symptoms: null,
		temperature: null,
		weight: null,
		water: 0,
		mood: null,
	},
	notesArr: [],
};

export const mutations = {
	SET_LOADING(state, loading) {
		state.loading = loading;
	},
	SET_NATIVE_DATA(state, nativeData) {
		state.nativeData = nativeData;
	},
	SET_AUTH_TOKEN(state, token) {
		state.authToken = token;
	},
	SET_LANGUAGE(state, language) {
		state.locale = language;
	},
	SET_THEME(state, theme) {
		state.theme = theme;
	},
	SET_ENTRY(state, entry) {
		state.entry = Number(entry);
	},
	SET_AGREEMENT(state, agreement) {
		state.agreement = Number(agreement);
	},
	SET_GUEST(state, guest) {
		state.guest = Number(guest);
	},
	SET_QUESTIONS(state, questions) {
		state.questions = questions;
	},
	SET_PLAN(state, plan) {
		state.plan = plan;
	},
	SET_SELECTED_PLAN(state, plan_id) {
		state.plan_id = plan_id;
	},
	SET_ANSWERS(state, answers) {
		state.answers = answers;
	},
	SET_CALENDAR(state, calendar) {
		state.calendar = calendar;
	},
	SET_OVULATION(state, ovulation) {
		state.ovulation = ovulation;
	},
	SET_FERTILE_DATES(state, fertileDates) {
		state.fertileDates = fertileDates;
	},
	SET_ACTIVE_DAY(state, date) {
		state.notes.date = date;
	},
	SET_SEXUAL_OPTIONS(state, sexualOptions) {
		state.notes.sexual_act_protected = sexualOptions.sexual_act_protected;
		state.notes.sexual_act_unprotected = sexualOptions.sexual_act_unprotected;
		state.notes.orgasm = sexualOptions.orgasm;
	},
	SET_PILLS_TEXT(state, pillsText) {
		state.notes.pills = pillsText;
	},
	SET_TEMPERATURE(state, temperature) {
		state.notes.temperature = temperature;
	},
	SET_NOTE_TEXT(state, noteText) {
		state.notes.notes = noteText;
	},
	SET_WEIGHT(state, weight) {
		state.notes.weight = weight;
	},
	SET_SYMPTOMS_TEXT(state, symptomsText) {
		state.notes.symptoms = symptomsText;
	},
	SET_WATER(state, water) {
		state.notes.water = water;
	},
	SET_MOOD(state, mood) {
		state.notes.mood = mood;
	},
	SET_NOTES_ARR(state, notesArr) {
		state.notesArr = notesArr;
	},
	SET_NOTES(state, notes) {
		state.notes = notes;
	},
};

export const actions = {
	authenticate({ dispatch, commit }, authData) {
		commit('SET_NATIVE_DATA', authData);
		dispatch('newNativeData');
	},
	async newNativeData({ state, dispatch, commit }) {
		commit('SET_LOADING', true);
		Account.nativeAuth(state.nativeData)
			.then(res => {
				commit('SET_AUTH_TOKEN', res.data.data.token);
			})
			.finally(() => {
				dispatch('getSettings');
				dispatch('getQuestions', state.locale);
				dispatch('getPlan', state.locale);
				setTimeout(() => {
					commit('SET_LOADING', false);
				}, 1000);
			});
	},
	newGoogleAuth({ state }, callBackFn) {
		Account.googleAuth(state.nativeData, res => {
			callBackFn(res);
		}).then(() => {
			location.reload();
		});
	},
	putSettings({ commit }, settings) {
		commit('SET_LANGUAGE', settings.language);
		commit('SET_THEME', settings.theme_mode);
		commit('SET_ENTRY', settings.first_entry);
		commit('SET_AGREEMENT', settings.agreement);
		commit('SET_GUEST', settings.guest);
		Account.putSettings(settings);
	},
	getSettings({ commit }) {
		Account.getSettings(res => {
			commit('SET_LANGUAGE', res.data.lang);
			commit('SET_THEME', res.data.theme_mode);
			appBridge.methods.nativeSendEvent('setThemeMode', res.data.theme_mode);
			commit('SET_ENTRY', res.data.first_entry);
			commit('SET_AGREEMENT', res.data.agreement);
			commit('SET_GUEST', res.data.guest);
		});
	},
	putLanguage({ commit }, language) {
		commit('SET_LANGUAGE', language);
		Account.putLanguage(language);
	},
	getLanguage({ commit }) {
		Account.getLanguage(res => {
			commit('SET_LANGUAGE', res.lang);
		});
	},
	putTheme({ commit }, theme) {
		commit('SET_THEME', theme);
		Account.putTheme(theme);
	},
	getTheme({ commit }) {
		Account.getTheme(res => {
			commit('SET_THEME', res.theme_mode);
			appBridge.methods.nativeSendEvent('setThemeMode', res.theme_mode);
		});
	},
	putEntry({ commit }, entry) {
		commit('SET_ENTRY', entry);
		Account.putEntry(entry);
	},
	getEntry({ commit }) {
		Account.getEntry(res => {
			commit('SET_ENTRY', res.first_entry);
		});
	},
	putAgreement({ commit }, agreement) {
		commit('SET_AGREEMENT', agreement);
		Account.putAgreement(agreement);
	},
	getAgreement({ commit }) {
		Account.getAgreement(res => {
			commit('SET_AGREEMENT', res.agreement);
		});
	},
	putGuest({ commit }, guest) {
		commit('SET_GUEST', guest);
		Account.putGuest(guest);
	},
	getGuest({ commit }) {
		Account.getGuest(res => {
			commit('SET_GUEST', res.guest);
		});
	},
	getQuestions({ commit }, language) {
		Account.getQuestions(res => {
			commit('SET_QUESTIONS', res.data);
		}, language);
	},
	getPlan({ commit }, language) {
		Account.getPlan(res => {
			commit('SET_PLAN', res.data);
		}, language);
	},
	// putSelectedPlan({ commit }, plan_id) {
	// 	commit('SET_SELECTED_PLAN', plan_id);
	// 	Account.putSelectedPlan(plan_id);
	// },
	// getSelectedPlan({ commit }) {
	// 	Account.getSelectedPlan(res => {
	// 		commit('SET_PLAN', res.plan_id);
	// 	});
	// },
	setAnswers({ dispatch, commit }, answers) {
		commit('SET_ANSWERS', answers);
		Account.setAnswers(answers);
	},
	updateAnswers({ dispatch, commit }, answers) {
		commit('SET_ANSWERS', answers);
		// dispatch('updateCalendarOnVue', answers);
		// dispatch('updateOvulationOnVue', answers);
		// dispatch('setFertileDatesOnVue');
		return Account.updateAnswers(answers);
	},
	getAnswers({ commit }) {
		return Account.getAnswers(response => {
			return commit('SET_ANSWERS', response.data);
		});
	},
	setCalendar({ state, commit }) {
		let calendar = [];
		let day = 24 * 3600 * 1000;
		for (let i = 0; i < 12; i++) {
			let firstDate =
				new Date(state.answers.last_period_date).getTime() +
				i * state.answers.duration_cycle_last * day;
			for (let j = 0; j < state.answers.duration_period_last; j++) {
				let nextDate = firstDate + j * day;
				calendar.push({
					date_index: j,
					date: secondaryFunctions.methods.formatter(new Date(nextDate)),
				});
			}
		}
		commit('SET_CALENDAR', calendar);
		return Account.setCalendar(calendar);
	},
	updateCalendarOnAnswers({ state, commit }, answers) {
		let currentDate = new Date().getTime();
		let firstDates = state.calendar.filter(
			elem =>
				elem.date_index == 0 && new Date(elem.date).getTime() < currentDate
		);
		state.answers.last_period_date = firstDates[firstDates.length - 1].date;
		let prevCalendar = state.calendar.filter(
			elem =>
				new Date(elem.date).getTime() <
				new Date(state.answers.last_period_date).getTime()
		);
		let formattedPrevCalendar = prevCalendar.map(elem => {
			return { date_index: elem.date_index, date: elem.date };
		});
		let calendar = [];
		let day = 24 * 3600 * 1000;
		for (let i = 0; i < 12; i++) {
			let firstDate =
				new Date(state.answers.last_period_date).getTime() +
				i * state.answers.duration_cycle_last * day;
			for (let j = 0; j < state.answers.duration_period_last; j++) {
				let nextDate = firstDate + j * day;
				calendar.push({
					date_index: j,
					date: secondaryFunctions.methods.formatter(new Date(nextDate)),
				});
			}
		}
		let result = [...formattedPrevCalendar, ...calendar];
		commit('SET_CALENDAR', result);
		return Account.updateCalendar(result);
	},
	setOvulation({ state, commit }) {
		let ovulation = [];
		let day = 24 * 3600 * 1000;
		for (let i = 0; i < 12; i++) {
			let date =
				new Date(state.answers.last_period_date).getTime() +
				i * state.answers.duration_cycle_last * day +
				13 * day;
			ovulation.push({
				date: secondaryFunctions.methods.formatter(new Date(date)),
			});
		}
		commit('SET_OVULATION', ovulation);
		return Account.setOvulation(ovulation);
	},
	updateOvulationOnAnswers({ state, commit }) {
		let prevOvulation = state.ovulation.filter(
			elem =>
				new Date(elem.date).getTime() <
				new Date(state.answers.last_period_date).getTime()
		);

		let pastCalendar = state.calendar.filter(
			elem =>
				new Date(elem.date).getTime() >=
					new Date(state.answers.last_period_date).getTime() &&
				elem.date_index == 0
		);

		let formatterPrevOvulation = prevOvulation.map(elem => {
			return { date: elem.date };
		});

		let ovulation = [];
		let day = 24 * 3600 * 1000;

		for (let elem of pastCalendar) {
			let date = secondaryFunctions.methods.formatter(
				new Date(
					new Date(elem.date).getTime() +
						(state.answers.duration_cycle_last - 14) * day
				)
			);
			ovulation.push({
				date: date,
			});
		}
		let result = [...formatterPrevOvulation, ...ovulation];
		commit('SET_OVULATION', result);
		return Account.updateOvulation(result);
	},
	setFertileDates({ state, commit }) {
		let fertileDates = [];
		let day = 24 * 3600 * 1000;
		for (let elem of state.ovulation) {
			for (let j = 1; j <= 3; j++) {
				fertileDates.push({
					date: secondaryFunctions.methods.formatter(
						new Date(new Date(elem.date).getTime() + j * day)
					),
				});
				fertileDates.push({
					date: secondaryFunctions.methods.formatter(
						new Date(new Date(elem.date).getTime() - j * day)
					),
				});
			}
		}
		commit('SET_FERTILE_DATES', fertileDates);
		return Account.setFertileDates(fertileDates);
	},
	updateFertileDatesOnAnswers({ state, commit }) {
		let prevFertileDates = state.fertileDates.filter(
			elem =>
				new Date(elem.date).getTime() <
				new Date(state.answers.last_period_date).getTime()
		);

		let pastOvulation = state.ovulation.filter(
			elem =>
				new Date(elem.date).getTime() >=
				new Date(state.answers.last_period_date).getTime()
		);

		let fertileDates = [];
		let day = 24 * 3600 * 1000;
		for (let elem of pastOvulation) {
			for (let j = 1; j <= 3; j++) {
				fertileDates.push({
					date: secondaryFunctions.methods.formatter(
						new Date(new Date(elem.date).getTime() + j * day)
					),
				});
				fertileDates.push({
					date: secondaryFunctions.methods.formatter(
						new Date(new Date(elem.date).getTime() - j * day)
					),
				});
			}
		}

		let formatterPrevFertileDates = prevFertileDates.map(elem => {
			return { date: elem.date };
		});

		let result = [...formatterPrevFertileDates, ...fertileDates];
		commit('SET_FERTILE_DATES', result);
		return Account.updateFertileDates(result);
	},
	updateCalendar({ commit }, calendar) {
		commit('SET_CALENDAR', calendar);
		Account.updateCalendar(calendar);
	},
	getCalendar({ commit }) {
		return Account.getCalendar(response => {
			return commit('SET_CALENDAR', response.data);
		});
	},
	getOvulation({ commit }) {
		return Account.getOvulation(response => {
			return commit('SET_OVULATION', response.data);
		});
	},
	getFertileDates({ commit }) {
		return Account.getFertileDates(response => {
			return commit('SET_FERTILE_DATES', response.data);
		});
	},
	setActiveDay({ commit }, activeDay) {
		commit('SET_ACTIVE_DAY', activeDay);
	},
	setSexualOptions({ commit }, sexualOptions) {
		commit('SET_SEXUAL_OPTIONS', sexualOptions);
	},
	setPillsText({ commit }, pillsText) {
		commit('SET_PILLS_TEXT', pillsText);
	},
	setTemperature({ commit }, temperature) {
		commit('SET_TEMPERATURE', temperature);
	},
	setNoteText({ commit }, noteText) {
		commit('SET_NOTE_TEXT', noteText);
	},
	setWeight({ commit }, weight) {
		commit('SET_WEIGHT', weight);
	},
	setSymptomsText({ commit }, symptomsText) {
		commit('SET_SYMPTOMS_TEXT', symptomsText);
	},
	setWater({ commit }, water) {
		commit('SET_WATER', water);
	},
	setMood({ commit }, mood) {
		commit('SET_MOOD', mood);
	},
	setNotesArr({ commit }, notesArr) {
		commit('SET_NOTES_ARR', notesArr);
		Account.setNotesArr(notesArr);
	},
	getNotesArr({ commit }) {
		return Account.getNotesArr(response => {
			return commit('SET_NOTES_ARR', response.data);
		});
	},
	setNotes({ commit }, notes) {
		commit('SET_NOTES', notes);
	},
};
