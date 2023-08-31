// * ----------------------------------------------------------------------------------------* //
export default {
    methods: {
        formatter(date) {
            return `${date.getFullYear()}-${this.addZero(
                date.getMonth() + 1
            )}-${this.addZero(date.getDate())}`;
        },
        addZero(num) {
            return num < 10 ? `0${num}` : num;
        },
        getDoubleColumns(min1, max1, min2, max2) {
            let firstComlumn = [];
            for (let i = min1; i <= max1; i++) {
                firstComlumn.push({ text: i, value: i });
            }
            let secondColumn = [];
            for (let j = min2; j <= max2; j++) {
                secondColumn.push({ text: j, value: j });
            }
            let result = [];
            result.push(firstComlumn);
            result.push(secondColumn);
            return result;
        },
        getColumn(min, max) {
            let comlumn = [];
            for (let i = min; i <= max; i++) {
                comlumn.push({ text: i, value: i });
            }
            return comlumn;
        },
    },
};
// * ----------------------------------------------------------------------------------------* //
