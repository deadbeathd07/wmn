export default {
	name: 'Аты',
	tel: 'Телефон',
	save: 'Сақтау',
	clear: 'Тазалау',
	cancel: 'Болдырмау',
	confirm: 'Растау',
	delete: 'Жою',
	loading: 'Жүктелуде...',
	noCoupon: 'Купондар жоқ',
	nameEmpty: 'Атын толтырыңыз',
	addContact: 'Контакт қосу',
	telInvalid: 'Дұрыс емес телефон нөмірі',
	vanCalendar: {
		end: 'Соңы',
		start: 'Бастау',
		title: 'Күнтізбе',
		weekdays: ['Дс', 'Сс', 'Ср', 'Бс', 'Жм', 'Сб', 'ЖБ'],
		monthTitle: (year, month) => `${year}/${month}`,
		rangePrompt: maxRange => `${maxRange} күннен артық емес таңдаңыз`,
	},
	vanCascader: {
		select: 'Tаңдау',
	},
	vanPagination: {
		prev: 'Алдыңғы',
		next: 'Келесі',
	},
	vanPullRefresh: {
		pulling: 'Жаңарту үшін тартыңыз...',
		loosing: 'Жаңарту үшін бос...',
	},
	vanSubmitBar: {
		label: 'Барлығы:',
	},
	vanCoupon: {
		unlimited: 'Шексіз',
		discount: discount => `${discount * 10}% жеңілдік`,
		condition: condition => `Кем дегенде ${condition}`,
	},
	vanCouponCell: {
		title: 'Купон',
		count: count => `Сізде ${count} купон бар`,
	},
	vanCouponList: {
		exchange: 'Айырбастау',
		close: 'Жабылу',
		enable: 'Қол жетімді',
		disabled: 'Қолжетімсіз',
		placeholder: 'Купон коды',
	},
	vanAddressEdit: {
		area: 'Аудан',
		areaEmpty: 'Қабылдау аймағын таңдаңыз',
		addressEmpty: 'Мекенжай бос болмауы керек',
		addressDetail: 'Мекенжай',
		defaultAddress: 'Әдепкі мекенжай ретінде орнатыңыз',
	},
	vanAddressList: {
		add: 'Жаңа мекенжай қосыңыз',
	},
};
