/**
 *  app-bridge small lib that wraps plugin to connect nativesript and vuejs into
 *  mixin. That mixin connected to app entrypoint (main.js) and methods of that mixin
 *  can be used everywhere inside vuejs app
 *  plugin to connect vuejs webview to nativescript and code samples here:
 *  https://www.npmjs.com/package/nativescript-webview-interface
 */
import '@/plugins/nativescript-webview-interface.js';
let oWebViewInterface = window.nsWebViewInterface;

export default {
	methods: {
		/**
		 *
		 * @param eventName - name of event what will be recived from nativescript
		 * @param callBackFn - function what will handle data recived from nativescript
		 */
		nativeWaitForEvent(eventName, callBackFn) {
			oWebViewInterface.on(eventName, callBackFn);
		},
		/**
		 *
		 * @param eventName - name of event what will be recived by nativescript
		 * @param eventData - data what should be sent to nativescript wrapoer
		 */
		nativeSendEvent(eventName, eventData = { empty: true }) {
			oWebViewInterface.emit(eventName, eventData);
		},
	},
};
