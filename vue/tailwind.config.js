module.exports = {
	purge: ['./src/**/*.vue'],
	darkMode: 'class', // or 'media' or 'class'
	theme: {
		extend: {
			colors: {
				'product-color-yellow': '#F4F474',
				'product-color-50': '#B9A2E1',
				'product-color-100': '#A587D9',
				'product-color-200': '#936FD1',
				'product-color-300': '#8259CA',
				'product-color-400': '#7345C4',
				'product-color-500': '#673AB7',
				'product-color-600': '#5D34A5',
				'product-color-700': '#542F95',
				'product-color-800': '#4C2A86',
				'product-color-900': '#442679',
			},
			backgroundImage: {
				light: "url('/src/assets/images/bg-light.jpg')",
				dark: "url('/src/assets/images/bg-dark.jpg')",
				'note-light': "url('/src/assets/sticky.png')",
				'note-dark': "url('/src/assets/sticky-dark.png')",
			},
		},
	},
	variants: {
		extend: {
			backgroundImage: ['dark'],
		},
	},
	plugins: [],
};
