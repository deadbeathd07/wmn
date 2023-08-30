export const state = {
	tries: 0,
	requestError: false,
	uploadingProgress: 0,
	errorTime: 0,
	errors: null,
};

export const mutations = {
	SET_UPLOADING_PROGRESS(state, progress) {
		state.uploadingProgress = progress;
	},
	setValidationErrors(state, dataErrors) {
		state.errors = dataErrors;
	},
	resetValidationErrors(state) {
		state.errors = null;
	},
	deleteErrorByFieldName(state, fieldName) {
		delete state.errors.errors[fieldName];
	},
	setRetry(state) {
		state.tries++;
	},
	resetTries(state) {
		state.tries = 0;
	},
	setRequestError(state) {
		if (
			!state.requestError &&
			new Date().getTime() / 1000 - state.errorTime > 5
		) {
			state.requestError = true;
			state.errorTime = new Date().getTime() / 1000;
		}
	},
	clearRequestError(state) {
		state.tries = 0;
		state.requestError = false;
	},
};
