import axios from 'axios';
import store from '@/store/index';
import apiErrors from '@/plugins/api/apiErrorHandler';
import router from '@/router';

let numberOfAjaxCAllPending = 0;

axios.interceptors.request.use(
	function (config) {
		numberOfAjaxCAllPending++;
		return config;
	},
	function (error) {
		return Promise.reject(error);
	}
);

axios.interceptors.response.use(
	function (response) {
		numberOfAjaxCAllPending--;
		return response;
	},
	function (error) {
		numberOfAjaxCAllPending--;
		return Promise.reject(error);
	}
);

export default {
	getHeaders(file = false) {
		store.commit('Api/SET_UPLOADING_PROGRESS', 0);
		let requestHeader = {
			timeout: process.env.VUE_APP_AXIOS_TIMEOUT,
			onUploadProgress: progressEvent => {
				const percentCompleted = Math.round(
					(progressEvent.loaded * 100) / progressEvent.total
				);
				store.commit('Api/SET_UPLOADING_PROGRESS', percentCompleted);
			},
			headers: {
				'Content-Type': file ? 'multipart/form-data' : 'application/json',
				'Accept-Language': store.state.Auth.locale,
			},
		};
		if (store.state.Auth.authToken !== null) {
			requestHeader.headers[
				'Authorization'
			] = `Bearer ${store.state.Auth.authToken}`;
		}
		return requestHeader;
	},
	async handleUnknownError(error) {
		throw new Error(error);
	},
	async handleTokenRefresh(res, callBackFn) {
		if (Object.keys(res).indexOf('message') >= 0) {
			if (res.message === 'Token has expired') {
				await store.dispatch('Auth/refreshToken');
				callBackFn();
			} else {
				// store.commit("Api/setRequestError");
			}
		} else {
			// store.commit("Api/setRequestError");
		}
	},
	async delete(path, cb = null) {
		return axios
			.delete(process.env.VUE_APP_API_ENDPOINT_URL + path, this.getHeaders())
			.then(response => {
				store.commit('Api/resetTries');
				if (cb !== null) {
					return cb(response.data);
				} else {
					return true;
				}
			})
			.catch(async error => {
				console.log('DELETE PATH: ' + path);
				const errorType = apiErrors.getTypeOfError(error);
				switch (errorType) {
					case process.env.VUE_APP_RETRY_STATUS:
						if (store.state.Api.tries < process.env.VUE_APP_RETRY_COUNT) {
							store.commit('Api/setRetry');
							return await this.get(path, cb);
						} else {
							//store.commit("Api/setRequestError");
						}
						break;
					case process.env.VUE_APP_REDIRECT_STATUS:
						if (
							store.state.BackButton.currentRoute !==
							process.env.VUE_APP_REDIRECT_ON_ERROR_TO
						) {
							if (
								router.currentRoute.name !==
								process.env.VUE_APP_REDIRECT_ON_ERROR_TO
							) {
								await router.push({
									name: process.env.VUE_APP_REDIRECT_ON_ERROR_TO,
								});
							}
						}
						break;
					case process.env.VUE_APP_REFRESH_TOKEN:
						await store.dispatch('Auth/refreshToken');
						await this.delete(path, cb);
						break;
					default:
						await this.handleUnknownError(error);
				}
				return false;
			})
			.finally(() => {
				return true;
			});
	},
	post(path, data, cb = null, file = false) {
		store.commit('Api/resetValidationErrors');
		return axios
			.post(
				process.env.VUE_APP_API_ENDPOINT_URL + path,
				data,
				this.getHeaders(file)
			)
			.then(response => {
				store.commit('Api/resetTries');
				store.commit('Api/resetValidationErrors');
				if (cb !== null) {
					return cb(response.data);
				} else {
					return true;
				}
			})
			.catch(async error => {
				console.log('POST PATH: ' + path);
				const errorType = apiErrors.getTypeOfError(error);
				switch (errorType) {
					case process.env.VUE_APP_RETRY_STATUS:
						if (store.state.Api.tries < process.env.VUE_APP_RETRY_COUNT) {
							store.commit('Api/setRetry');
							return await this.post(path, data, cb);
						} else {
							// store.commit("Api/setRequestError");
						}
						break;
					case process.env.VUE_APP_REDIRECT_STATUS:
						if (
							store.state.BackButton.currentRoute !==
							process.env.VUE_APP_REDIRECT_ON_ERROR_TO
						) {
							if (
								router.currentRoute.name !==
								process.env.VUE_APP_REDIRECT_ON_ERROR_TO
							) {
								await router.push({
									name: process.env.VUE_APP_REDIRECT_ON_ERROR_TO,
								});
							}
						}
						break;
					case process.env.VUE_APP_VALIDATION_ERROR_STATUS:
						store.commit('Api/setValidationErrors', error.response.data);
						break;
					case process.env.VUE_APP_REFRESH_TOKEN:
						await store.dispatch('Auth/refreshToken');
						await this.post(path, data, cb);
						break;
					case process.env.VUE_APP_ERROR_STATUS:
						//  await store.commit("Api/setRequestError");
						break;
					default:
						await this.handleUnknownError(error);
				}
				return false;
			});
	},
	put(path, data, cb = null) {
		store.commit('Api/resetValidationErrors');
		return axios
			.put(process.env.VUE_APP_API_ENDPOINT_URL + path, data, this.getHeaders())
			.then(response => {
				store.commit('Api/resetTries');
				store.commit('Api/resetValidationErrors');
				if (cb !== null) {
					return cb(response.data);
				} else {
					return true;
				}
			})
			.catch(async error => {
				console.log('PUT PATH: ' + path);
				const errorType = apiErrors.getTypeOfError(error);
				switch (errorType) {
					case process.env.VUE_APP_RETRY_STATUS:
						if (store.state.Api.tries < process.env.VUE_APP_RETRY_COUNT) {
							store.commit('Api/setRetry');
							return await this.post(path, data, cb);
						} else {
							// store.commit("Api/setRequestError");
						}
						break;
					case process.env.VUE_APP_REDIRECT_STATUS:
						if (
							store.state.BackButton.currentRoute !==
							process.env.VUE_APP_REDIRECT_ON_ERROR_TO
						) {
							if (
								router.currentRoute.name !==
								process.env.VUE_APP_REDIRECT_ON_ERROR_TO
							) {
								await router.push({
									name: process.env.VUE_APP_REDIRECT_ON_ERROR_TO,
								});
							}
						}
						break;
					case process.env.VUE_APP_VALIDATION_ERROR_STATUS:
						store.commit('Api/setValidationErrors', error.response.data);
						break;
					case process.env.VUE_APP_REFRESH_TOKEN:
						await store.dispatch('Auth/refreshToken');
						await this.put(path, data, cb);
						break;
					case process.env.VUE_APP_ERROR_STATUS:
						//await store.commit("Api/setRequestError");
						break;
					default:
						await this.handleUnknownError(error);
				}
				return false;
			});
	},
	/**
	 * Send GET request using AXIOS
	 * Logic almost same as we used for POST request, few differences inside retry logic and we don't use
	 * validation for GET requests it doesn't makes sense such as we use API
	 * @param path - API endpoint URL without base PATH defined inside .env file (root project directory)
	 * @param cb - CallBack to handle server response
	 */
	async get(path, cb = null) {
		return axios
			.get(process.env.VUE_APP_API_ENDPOINT_URL + path, this.getHeaders())
			.then(response => {
				store.commit('Api/resetTries');
				if (cb !== null) {
					return cb(response.data);
				} else {
					return true;
				}
			})
			.catch(async error => {
				console.log('GET PATH: ' + path);
				const errorType = apiErrors.getTypeOfError(error);
				switch (errorType) {
					case process.env.VUE_APP_RETRY_STATUS:
						if (store.state.Api.tries < process.env.VUE_APP_RETRY_COUNT) {
							store.commit('Api/setRetry');
							return await this.get(path, cb);
						} else {
							//store.commit("Api/setRequestError");
						}
						break;
					case process.env.VUE_APP_REDIRECT_STATUS:
						if (
							store.state.BackButton.currentRoute !==
							process.env.VUE_APP_REDIRECT_ON_ERROR_TO
						) {
							if (
								router.currentRoute.name !==
								process.env.VUE_APP_REDIRECT_ON_ERROR_TO
							) {
								await router.push({
									name: process.env.VUE_APP_REDIRECT_ON_ERROR_TO,
								});
							}
						}
						break;
					case process.env.VUE_APP_REFRESH_TOKEN:
						await store.dispatch('Auth/refreshToken');
						await this.get(path, cb);
						break;
					default:
						await this.handleUnknownError(error);
				}
				return false;
			})
			.finally(() => {
				return true;
			});
	},
};
