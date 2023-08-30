export default {
	name: 'Nazwa',
	tel: 'Telefon',
	save: 'Ratować',
	clear: 'Oczyścić',
	cancel: 'Anulować',
	confirm: 'Potwierdzać',
	delete: 'Usuwać',
	loading: 'Ładowanie...',
	noCoupon: 'Brak kuponów',
	nameEmpty: 'Wpisz nazwę',
	addContact: 'Dodaj kontakt',
	telInvalid: 'Zniekształcony numer telefonu',
	vanCalendar: {
		end: 'Koniec',
		start: 'Początek',
		title: 'Kalendarz',
		weekdays: ['Po', 'Wt', 'Śr', 'Cz', 'Pi', 'So', 'Ni'],
		monthTitle: (year, month) => `${year}/${month}`,
		rangePrompt: maxRange => `Wybierz nie więcej niż ${maxRange} dni`,
	},
	vanCascader: {
		select: 'Wybierać',
	},
	vanPagination: {
		prev: 'Poprzedni',
		next: 'Następny',
	},
	vanPullRefresh: {
		pulling: 'Pociągnij aby odświeżyć...',
		loosing: 'Luźne do odświeżenia...',
	},
	vanSubmitBar: {
		label: 'Całkowity:',
	},
	vanCoupon: {
		unlimited: 'Nieograniczony',
		discount: discount => `${discount * 10}% zniżki`,
		condition: condition => `Przynajmniej ${condition}`,
	},
	vanCouponCell: {
		title: 'Kupon',
		count: count => `Masz ${count} kuponów`,
	},
	vanCouponList: {
		exchange: 'Wymieniać',
		close: 'Zamknąć',
		enable: 'Dostępny',
		disabled: 'Niedostępne',
		placeholder: 'Kod kuponu',
	},
	vanAddressEdit: {
		area: 'Obszar',
		areaEmpty: 'Wybierz obszar odbioru',
		addressEmpty: 'Adres nie może być pusty',
		addressDetail: 'Adres',
		defaultAddress: 'Ustaw jako adres domyślny',
	},
	vanAddressList: {
		add: 'Dodaj nowy adres',
	},
};
