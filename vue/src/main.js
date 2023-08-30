import 'core-js/stable';
import 'regenerator-runtime/runtime';
import { createApp, h, watch } from 'vue';
import App from './App.vue';
import { locales } from '@/locales/messages';
import { createI18n } from 'vue-i18n';
import store from '@/store';
import router from '@/router';
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import {
	faCheck,
	faArrowLeft,
	faHeart,
	faPills,
	faWeightScale,
	faThermometer,
	faFaceSmile,
	faGlassWater,
	faKitMedical,
} from '@fortawesome/free-solid-svg-icons';
import { faHandPointer } from '@fortawesome/free-regular-svg-icons';
import { faGoogle, faApple } from '@fortawesome/free-brands-svg-icons';
import {
	faCalendar,
	faCalendarDay,
	faNoteSticky,
} from '@fortawesome/free-solid-svg-icons';
import appBridge from '@/mixins/app-bridge';
import '@/assets/index.css';
import { Locale } from 'vant';
import enUS from 'vant/lib/locale/lang/en-US';
import esES from 'vant/lib/locale/lang/es-ES';
import azAZ from '@/locales/az-AZ.js';
import blBL from '@/locales/bl-BL.js';
import csCS from '@/locales/cs-CS.js';
import deDE from 'vant/lib/locale/lang/de-DE';
import frFR from 'vant/lib/locale/lang/fr-FR';
import itIT from 'vant/lib/locale/lang/it-IT';
import kzKZ from '@/locales/kz-KZ.js';
import ltLT from '@/locales/lt-LT.js';
import plPL from '@/locales/pl-PL.js';
import roRO from 'vant/lib/locale/lang/ro-RO';
import ruRU from 'vant/lib/locale/lang/ru-RU';
import trTR from 'vant/lib/locale/lang/tr-TR';
import uaUA from 'vant/lib/locale/lang/uk-UA';
import uzUZ from '@/locales/uz-UZ.js';
import { setupCalendar, Calendar, DatePicker } from 'v-calendar';
import 'v-calendar/style.css';
import { computed } from 'vue';

const app = createApp({
	render: () => h(App),
});

const i18n = createI18n({
	locale: process.env.VUE_APP_I18N_DEFAULT_LOCALE,
	fallbackLocale: process.env.VUE_APP_I18N_DEFAULT_LOCALE,
	messages: locales,
});

const locale = computed(() => store.state.Auth.locale);

const vLocales = [
	{
		en: 'en-US',
		es: 'es-ES',
		az: 'az-AZ',
		bl: 'bl-BL',
		cs: 'cs-CS',
		de: 'de-DE',
		fr: 'fr-FR',
		it: 'it-IT',
		kz: 'kz-KZ',
		lt: 'lt-LT',
		pl: 'pl-PL',
		ro: 'ro-RO',
		ru: 'ru-RU',
		tr: 'tr-TR',
		ua: 'ua-UA',
		uz: 'uz-UZ',
	},
	{
		en: enUS,
		es: esES,
		az: azAZ,
		bl: blBL,
		cs: csCS,
		de: deDE,
		fr: frFR,
		it: itIT,
		kz: kzKZ,
		lt: ltLT,
		pl: plPL,
		ro: roRO,
		ru: ruRU,
		tr: trTR,
		ua: uaUA,
		uz: uzUZ,
	},
];

Locale.use(vLocales[0][locale.value], vLocales[1][locale.value]);

library.add(
	faCheck,
	faHandPointer,
	faArrowLeft,
	faGoogle,
	faApple,
	faCalendar,
	faCalendarDay,
	faNoteSticky,
	faHeart,
	faPills,
	faWeightScale,
	faThermometer,
	faFaceSmile,
	faGlassWater,
	faKitMedical
);

watch(locale, (newLocale, oldLocale) => {
	i18n.global.locale = newLocale;
	Locale.use(vLocales[0][newLocale], vLocales[1][newLocale]);
});

app.use(router).use(store).use(i18n).use(setupCalendar, {}).mount('#app');

app.mixin(appBridge);
app.component('font-awesome-icon', FontAwesomeIcon);
app.component('VCalendar', Calendar);
app.component('VDatePicker', DatePicker);
