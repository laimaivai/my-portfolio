// Page reveal animations:
// 1) add AOS attributes to main blocks, 2) stagger section content, 3) start AOS.
window.AppModules = window.AppModules || {};

window.AppModules.initAos = () => {
	// Skip safely if AOS library is not loaded.
	if (!window.AOS) {
		return;
	}

	// Helper: apply one animation preset to an element.
	const applyAos = (element, delay = 0) => {
		if (!element) {
			return;
		}

		element.setAttribute('data-aos', 'fade-up');
		element.setAttribute('data-aos-duration', '550');
		element.setAttribute('data-aos-easing', 'ease-out-cubic');

		if (delay > 0) {
			element.setAttribute('data-aos-delay', String(delay));
		} else {
			element.removeAttribute('data-aos-delay');
		}
	};

	const topLevelBlocks = [
		document.querySelector('.hero-head'),
		document.querySelector('.hero-visual-wrap'),
		document.querySelector('.toc')
	];

	topLevelBlocks.forEach((block, index) => {
		applyAos(block, index * 80);
	});

	// Add stagger to section children for smoother reading flow.
	const animateSectionChildren = (section) => {
		let delay = 0;

		Array.from(section.children).forEach((child) => {
			if (!child.matches('header, p, article, img, .wide-image, .mini-head, .problem-cards, .findings, .challenge-card, .rounds-block, .learning-cards')) {
				return;
			}

			applyAos(child, delay);
			delay += 90;
		});

		const nestedCards = section.querySelectorAll('.problem-cards article, .findings article, .learning-cards article');
		nestedCards.forEach((card, index) => {
			applyAos(card, 120 + index * 80);
		});
	};

	document.querySelectorAll('.story-section').forEach(animateSectionChildren);
	applyAos(document.querySelector('.project-switch'), 120);

	// Global AOS defaults for this page.
	window.AOS.init({
		duration: 550,
		once: true,
		offset: 80,
		easing: 'ease-out-cubic'
	});
};
