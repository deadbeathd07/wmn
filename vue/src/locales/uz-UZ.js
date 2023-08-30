export default {
	name: 'Ism',
	tel: 'Telefon',
	save: 'Saqlash',
	clear: 'Tozalamoq',
	cancel: 'Bekor qilish',
	confirm: 'Tasdiqlang',
	delete: 'Oʻchirish',
	loading: 'Yuklanmoqda...',
	noCoupon: "Kuponlar yo'q",
	nameEmpty: "Iltimos, ismni to'ldiring",
	addContact: "Kontakt qo'shing",
	telInvalid: "Noto'g'ri tuzilgan telefon raqami",
	vanCalendar: {
		end: 'Oxiri',
		start: 'Boshlash',
		title: 'Kalendar',
		weekdays: ['Du', 'Se', 'Ch', 'Pa', 'Ju', 'Sh', 'Ya'],
		monthTitle: (year, month) => `${year}/${month}`,
		rangePrompt: maxRange =>
			`${maxRange} kundan ortiq bo'lmagan muddatni tanlang`,
	},
	vanCascader: {
		select: 'Tanlang',
	},
	vanPagination: {
		prev: 'Oldingi',
		next: 'Keyingisi',
	},
	vanPullRefresh: {
		pulling: 'Yangilash uchun torting...',
		loosing: "Yangilash uchun bo'sh...",
	},
	vanSubmitBar: {
		label: 'Jami:',
	},
	vanCoupon: {
		unlimited: 'Cheksiz',
		discount: discount => `${discount * 10}% chegirma`,
		condition: condition => `Kamida ${condition}`,
	},
	vanCouponCell: {
		title: 'Kupon',
		count: count => `Sizda ${count} ta kupon bor`,
	},
	vanCouponList: {
		exchange: 'Ayirboshlash',
		close: 'Yopish',
		enable: 'Mavjud',
		disabled: 'Mavjud emas',
		placeholder: 'Kupon kodi',
	},
	vanAddressEdit: {
		area: 'Hudud',
		areaEmpty: 'Iltimos, qabul qiluvchi hududni tanlang',
		addressEmpty: "Manzil bo'sh bo'lishi mumkin emas",
		addressDetail: 'Manzil',
		defaultAddress: 'Standart manzil sifatida belgilang',
	},
	vanAddressList: {
		add: "Yangi manzil qo'shing",
	},
};
