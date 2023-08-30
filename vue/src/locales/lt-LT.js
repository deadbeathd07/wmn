export default {
	name: 'Vardas',
	tel: 'Telefonas',
	save: 'Sutaupyti',
	clear: 'Valyti',
	cancel: 'Atšaukti',
	confirm: 'Patvirtinti',
	delete: 'Ištrinti',
	loading: 'Įkeliama...',
	noCoupon: 'Jokių kuponų',
	nameEmpty: 'Prašome įrašyti vardą',
	addContact: 'Pridėti kontaktą',
	telInvalid: 'Netinkamai suformuotas telefono numeris',
	vanCalendar: {
		end: 'Galas',
		start: 'Pradėti',
		title: 'Kalendorius',
		weekdays: ['Pi', 'An', 'Tr', 'Ke', 'Pe', 'Še', 'Se'],
		monthTitle: (year, month) => `${year}/${month}`,
		rangePrompt: maxRange => `Pasirinkite ne daugiau kaip ${maxRange} dienų`,
	},
	vanCascader: {
		select: 'Pasirinkti',
	},
	vanPagination: {
		prev: 'Ankstesnis',
		next: 'Kitas',
	},
	vanPullRefresh: {
		pulling: 'Patraukite, kad atnaujintumėte...',
		loosing: 'Laisvas atsigaivinti...',
	},
	vanSubmitBar: {
		label: 'Visas:',
	},
	vanCoupon: {
		unlimited: 'Neribota',
		discount: discount => `${discount * 10}% nuolaida`,
		condition: condition => `Bent ${condition}`,
	},
	vanCouponCell: {
		title: 'Coupon',
		count: count => `Turite ${count} kuponų`,
	},
	vanCouponList: {
		exchange: 'Mainai',
		close: 'Uždaryti',
		enable: 'Yra',
		disabled: 'Nepasiekiamas',
		placeholder: 'Kupono kodas',
	},
	vanAddressEdit: {
		area: 'Sritis',
		areaEmpty: 'Pasirinkite priėmimo sritį',
		addressEmpty: 'Adreso laukas negali būti tuščias',
		addressDetail: 'Adresas',
		defaultAddress: 'Nustatyti kaip numatytąjį adresą',
	},
	vanAddressList: {
		add: 'Pridėti naują adresą',
	},
};
