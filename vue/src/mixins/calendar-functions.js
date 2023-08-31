// * ----------------------------------------------------------------------------------------* //
export default {
    methods: {
        getAttrs(arr1, arr2, arr3, date) {
            let calendar = arr1.map((elem) => {
                let fillMode = "solid";
                if (new Date(elem.date).getTime() > date.getTime()) {
                    fillMode = "light";
                }
                return {
                    highlight: {
                        color: "product-pink",
                        fillMode: fillMode,
                    },
                    dates: new Date(elem.date),
                };
            });

            let ovulation = arr2.map((elem) => {
                return {
                    dot: {
                        class: "ovulation",
                    },
                    dates: [new Date(elem.date)],
                };
            });

            let fertileDates = arr3.map((elem) => {
                return {
                    dot: {
                        class: "fertile",
                    },
                    dates: [new Date(elem.date)],
                };
            });

            // let currentDate = {
            // 	highlight: {
            // 		class: 'today',
            // 	},
            // 	dates: new Date(),
            // };

            return [...calendar, ...ovulation, ...fertileDates];
        },
        getAttrsWithNotes(arr1, arr2, arr3, arr4, date) {
            let dates = this.getAttrs(arr1, arr2, arr3, date);

            let notes = arr4.map((elem) => {
                if (
                    elem.symptoms ||
                    elem.pills ||
                    elem.temperature ||
                    elem.weight ||
                    elem.water ||
                    elem.notes ||
                    elem.mood
                ) {
                    return {
                        dot: {
                            class: "notes",
                        },
                        dates: [new Date(elem.date)],
                    };
                }
            });

            // // ---------------------------------------------------------
            // // If you need more notes dots, you can use this

            let redNotes = arr4.map((elem) => {
                if (elem.sexual_act_protected) {
                    return {
                        dot: {
                            class: "protected",
                        },
                        dates: [new Date(elem.date)],
                    };
                }
            });

            let redConturNotes = arr4.map((elem) => {
                if (elem.sexual_act_unprotected) {
                    return {
                        dot: {
                            class: "unprotected",
                        },
                        dates: [new Date(elem.date)],
                    };
                }
            });
            // let grayNotes = arr2.map(elem => {
            // 	if (elem.pills || elem.temperature) {
            // 		return {
            // 			dot: {
            // 				style: {
            // 					backgroundColor: 'gray',
            // 				},
            // 			},
            // 			dates: [new Date(elem.date)],
            // 		};
            // 	}
            // });

            // let blueNotes = arr2.map(elem => {
            // 	if (elem.weight || elem.water) {
            // 		return {
            // 			dot: {
            // 				style: {
            // 					backgroundColor: 'blue',
            // 				},
            // 			},
            // 			dates: [new Date(elem.date)],
            // 		};
            // 	}
            // });

            // let yellowNotes = arr2.map(elem => {
            // 	if (elem.notes || elem.mood) {
            // 		return {
            // 			dot: {
            // 				style: {
            // 					backgroundColor: 'yellow',
            // 				},
            // 			},
            // 			dates: [new Date(elem.date)],
            // 		};
            // 	}
            // });
            // return [
            // 	...dates,
            // 	...redNotes,
            // 	...grayNotes,
            // 	...blueNotes,
            // 	...yellowNotes,
            // ];
            // // ---------------------------------------------------------

            // return [
            // 	...dates,
            // 	...redNotes,
            // 	...grayNotes,
            // 	...blueNotes,
            // 	...yellowNotes,
            // ];

            return [...dates, ...notes, ...redNotes, ...redConturNotes];
        },
        doesHaveDate(arr, date) {
            let flag = -1;
            for (let i = 0; i < arr.length; i++) {
                if (arr[i].date == date) {
                    flag = i;
                }
            }
            return flag;
        },
        sortDates(arr) {
            return arr.sort(
                (a, b) =>
                    new Date(a.date).getTime() - new Date(b.date).getTime()
            );
        },
        addIndexDay(arr) {
            let result = [];
            let arrDates = arr.map((elem) => new Date(elem.date).getTime());
            let day = 24 * 3600 * 1000;
            result.push({ date: arr[0].date, date_index: 0 });
            for (let i = 1, j = 1; i < arr.length; i++, j++) {
                if (arrDates[i] - arrDates[i - 1] <= day) {
                    result.push({ date: arr[i].date, date_index: j });
                    // } else if (
                    // 	arrDates[i] - arrDates[i - 1] > day &&
                    // 	arrDates[i + 1] - arrDates[i] <= day
                    // ) {
                    // 	j = 0;
                    // 	result.push({ date: arr[i].date, date_index: j });
                    // } else {
                    // 	j = 0;
                    // 	result.push({ date: arr[i].date, date_index: j });
                } else {
                    j = 0;
                    result.push({ date: arr[i].date, date_index: j });
                }
            }
            return result;
        },
    },
};
// * ----------------------------------------------------------------------------------------* //
