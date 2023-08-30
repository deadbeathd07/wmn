export default {
	name: 'Ad',
	tel: 'Telefon',
	save: 'Yadda saxla',
	clear: 'Təmiz',
	cancel: 'Ləğv et',
	confirm: 'Təsdiq edin',
	delete: 'Sil',
	loading: 'Yüklənir...',
	noCoupon: 'Kupon yoxdur',
	nameEmpty: 'Zəhmət olmasa adı doldurun',
	addContact: 'Kontakt əlavə edin',
	telInvalid: 'Səhv telefon nömrəsi',
	vanCalendar: {
		end: 'Son',
		start: 'Başlamaq',
		title: 'Təqvim',
		weekdays: ['B.E.', 'Ç.A.', 'Ç.', 'C.A.', 'C.', 'Ş.', 'B.'],
		monthTitle: (year, month) => `${year}/${month}`,
		rangePrompt: maxRange => `${maxRange} gündən çox olmayan müddət seçin`,
	},
	vanCascader: {
		select: 'Seçin',
	},
	vanPagination: {
		prev: 'Əvvəlki',
		next: 'Sonrakı',
	},
	vanPullRefresh: {
		pulling: 'Yeniləmək üçün çəkin...',
		loosing: 'Yeniləmək üçün boş...',
	},
	vanSubmitBar: {
		label: 'Ümumi:',
	},
	vanCoupon: {
		unlimited: 'Limitsiz',
		discount: discount => `${discount * 10}% endirim`,
		condition: condition => `Ən azı ${condition}`,
	},
	vanCouponCell: {
		title: 'Kupon',
		count: count => `${count} kuponunuz var`,
	},
	vanCouponList: {
		exchange: 'Mübadilə',
		close: 'Yaxın',
		enable: 'Mövcuddur',
		disabled: 'Əlçatan deyil',
		placeholder: 'Kupon Kodu',
	},
	vanAddressEdit: {
		area: 'Sahə',
		areaEmpty: 'Zəhmət olmasa qəbul sahəsi seçin',
		addressEmpty: 'Ünvan boş ola bilməz',
		addressDetail: 'Ünvan',
		defaultAddress: 'Defolt ünvan kimi təyin edin',
	},
	vanAddressList: {
		add: 'Yeni ünvan əlavə edin',
	},
};
