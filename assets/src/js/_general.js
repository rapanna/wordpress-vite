class General {
	constructor() {
		this.testVariable = "script working";
		this.init();
	}

	init() {
		// for tests purposes only
		console.log(this.testVariable);
	}
}

export default General;

// Toggle mobilního menu
const toggleButton = document.querySelector(".nav__toggle");
const menu = document.querySelector(".nav__list");

toggleButton.addEventListener("click", () => {
	const expanded =
		toggleButton.getAttribute("aria-expanded") === "true" || false;
	toggleButton.setAttribute("aria-expanded", !expanded);
	menu.classList.toggle("active");
});

// Rozbalování submenu na mobilních zařízeních
document
	.querySelectorAll(".nav__item--has-sub > .nav__link")
	.forEach((link) => {
		link.addEventListener("click", (e) => {
			if (window.innerWidth <= 768) {
				e.preventDefault();
				const parent = link.parentElement;
				const expanded =
					link.getAttribute("aria-expanded") === "true" || false;
				link.setAttribute("aria-expanded", !expanded);
				parent.classList.toggle("open");
			}
		});
	});
