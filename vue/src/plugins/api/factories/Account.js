import api from '@/plugins/api/EntryPoint';
import axios from 'axios';

export default {
	/**
	 * Retrieve accounst from server before return account prepare them for displaying
	 * few resions to prepare data - right variable names, format words
	 * @param callBackFn
	 * @returns {Promise<*>}
	 */
	capitalizeFirstLetter(string) {
		return string.charAt(0).toUpperCase() + string.slice(1);
	},
	async refreshToken(cb) {
		return await api.get(`auth/refresh-token`, response => {
			return cb(response);
		});
	},
	async nativeAuth(nativeData) {
		return await axios
			.post(process.env.VUE_APP_API_ENDPOINT_URL + 'userAuth', nativeData)
			.catch(error => {
				console.log(error);
			});
	},
	googleAuth(nativeData) {
		return axios
			.post(process.env.VUE_APP_API_ENDPOINT_URL + 'googleAuth', nativeData)
			.catch(error => {
				console.log(error);
			});
	},
	getSettings(callBackFn) {
		return api.get(`settings/get-settings`, callBackFn);
	},
	putSettings(settings) {
		return api.put('settings/put-settings', settings);
	},
	getLanguage(callBackFn) {
		return api.get(`settings/language`, callBackFn);
	},
	putLanguage(language) {
		return api.put('settings/put-language', { language });
	},
	getTheme(callBackFn) {
		return api.get(`settings/theme`, callBackFn);
	},
	putTheme(theme) {
		return api.put('settings/put-theme', { theme });
	},
	async getEntry(callBackFn) {
		return await api.get(`settings/entry`, callBackFn);
	},
	putEntry(first_entry) {
		return api.put('settings/put-entry', { first_entry });
	},
	async getAgreement(callBackFn) {
		return await api.get(`settings/agreement`, callBackFn);
	},
	putAgreement(agreement) {
		return api.put('settings/put-agreement', { agreement });
	},
	async getGuest(callBackFn) {
		return await api.get(`settings/guest`, callBackFn);
	},
	putGuest(guest) {
		return api.put('settings/put-guest', { guest });
	},
	getQuestions(callBackFn, language) {
		return api.get(`question/${language}`, callBackFn);
	},
	getPlan(callBackFn, language) {
		return api.get(`plan/${language}`, callBackFn);
	},
	putSelectedPlan(plan_id) {
		return api.put(`selected-plan/update`, { plan_id });
	},
	getSelectedPlan(callBackFn) {
		return api.get(`selected-plan/show`, callBackFn);
	},
	getAnswers(callBackFn) {
		return api.get(`answer/show`, callBackFn);
	},
	setAnswers(answers) {
		return api.post(`answer`, answers);
	},
	updateAnswers(answers) {
		return api.put(`answer/update`, answers);
	},
	getCalendar(callBackFn) {
		return api.get(`calendar/show`, callBackFn);
	},
	setCalendar(calendar) {
		return api.post(`calendar`, calendar);
	},
	updateCalendar(calendar) {
		return api.put(`calendar/update`, calendar);
	},
	getOvulation(callBackFn) {
		return api.get(`ovulation/show`, callBackFn);
	},
	setOvulation(ovulation) {
		return api.post(`ovulation`, ovulation);
	},
	updateOvulation(ovulation) {
		return api.put(`ovulation/update`, ovulation);
	},
	getFertileDates(callBackFn) {
		return api.get(`fertile-date/show`, callBackFn);
	},
	setFertileDates(fertileDates) {
		return api.post(`fertile-date`, fertileDates);
	},
	updateFertileDates(fertileDates) {
		return api.put(`fertile-date/update`, fertileDates);
	},
	getNotesArr(callBackFn) {
		return api.get('user-note/show', callBackFn);
	},
	setNotesArr(notesArr) {
		return api.post('user-note', notesArr);
	},
};
