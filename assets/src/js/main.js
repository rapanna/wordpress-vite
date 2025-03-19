import General from './_general';

const App = {
	/**
	 * App.init
	 */
	init() {
		// General scripts
		function initGeneral() {
			return new General();
		}
		initGeneral();
	},
};

document.addEventListener('DOMContentLoaded', () => {
	App.init();
});

// import '../css/index.scss';

console.log('Vite + WordPress běží!');