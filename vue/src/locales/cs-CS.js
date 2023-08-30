export default {
	name: 'Název',
	tel: 'Phone',
	save: 'Uložit',
	clear: 'Vymazat',
	cancel: 'Zrušení',
	confirm: 'Potvrdit',
	delete: 'Vymazat',
	loading: 'Načítání...',
	noCoupon: 'Žádné kupony',
	nameEmpty: 'Vyplňte prosím jméno',
	addContact: 'Přidat kontakt',
	telInvalid: 'Chybné telefonní číslo',
	vanCalendar: {
		end: 'Konec',
		start: 'Start',
		title: 'Kalendář',
		weekdays: ['Po', 'Út', 'St', 'Čt', 'Pá', 'So', 'Ne'],
		monthTitle: (year, month) => `${year}/${month}`,
		rangePrompt: maxRange => `Vyberte si maximálně ${maxRange} dní`,
	},
	vanCascader: {
		select: 'Vybrat',
	},
	vanPagination: {
		prev: 'Předchozí',
		next: 'Další',
	},
	vanPullRefresh: {
		pulling: 'Vytažením obnovíte...',
		loosing: 'Uvolnění pro osvěžení...',
	},
	vanSubmitBar: {
		label: 'Celkový:',
	},
	vanCoupon: {
		unlimited: 'Neomezený',
		discount: discount => `${discount * 10}% SLEVA`,
		condition: condition => `Minimálně ${condition}`,
	},
	vanCouponCell: {
		title: 'Kupón',
		count: count => `Máte${count} kupóny`,
	},
	vanCouponList: {
		exchange: 'Vyměnit',
		close: 'Zavřít',
		enable: 'Dostupný',
		disabled: 'Není k dispozici',
		placeholder: 'Kód kupónu',
	},
	vanAddressEdit: {
		area: 'Oblast',
		areaEmpty: 'Vyberte oblast příjmu',
		addressEmpty: 'Adresa nemůže být prázdná',
		addressDetail: 'Adresa',
		defaultAddress: 'Nastavit jako výchozí adresu',
	},
	vanAddressList: {
		add: 'Přidat novou adresu',
	},
};
