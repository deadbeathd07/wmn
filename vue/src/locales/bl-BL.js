export default {
	name: 'Імя',
	tel: 'Тэлефон',
	save: 'Захаваць',
	clear: 'Ачысціць',
	cancel: 'Адмяніць',
	confirm: 'Пацвердзіць',
	delete: 'Выдаліць',
	loading: 'Загрузка...',
	noCoupon: 'Няма купонаў',
	nameEmpty: 'Калі ласка, увядзіце імя',
	addContact: 'Дадаць кантакт',
	telInvalid: 'Няправільны нумар тэлефона',
	vanCalendar: {
		end: 'Канец',
		start: 'Пачатак',
		title: 'Каляндар',
		weekdays: ['Пн', 'Аўт', 'Ср', 'Чц', 'Пт', 'Сб', 'Ндз'],
		monthTitle: (year, month) => `${year}/${month}`,
		rangePrompt: maxRange => `Выберыце не больш за ${maxRange} дзён`,
	},
	vanCascader: {
		select: 'Выберыце',
	},
	vanPagination: {
		prev: 'Папярэдні',
		next: 'Далей',
	},
	vanPullRefresh: {
		pulling: 'Пацягніце, каб абнавіць...',
		loosing: 'Адпусціце,каб абнавіць...',
	},
	vanSubmitBar: {
		label: 'Усяго:',
	},
	vanCoupon: {
		unlimited: 'Неабмежаваны',
		discount: discount => `Зніжка ${discount * 10}%`,
		condition: condition => `Прынамсі ${condition}`,
	},
	vanCouponCell: {
		title: 'Купон',
		count: count => `У вас ${count} купонаў`,
	},
	vanCouponList: {
		exchange: 'Абменяць',
		close: 'Зачыниць',
		enable: 'Даступны',
		disabled: 'Недаступны',
		placeholder: 'Зніжкавы Код',
	},
	vanAddressEdit: {
		area: 'Зона',
		areaEmpty: 'Выберыце зону прыёму',
		addressEmpty: 'Адрас не можа быць пустым',
		addressDetail: 'Адрас',
		defaultAddress: 'Усталяваць у якасці адраса па змаўчанні',
	},
	vanAddressList: {
		add: 'Дадайце новы адрас',
	},
};
