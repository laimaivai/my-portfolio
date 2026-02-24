// Name gradient effect: always animate with GSAP.
(() => {
	const nameEl = document.querySelector('.hero-name .name');
	if (!nameEl || !window.gsap) {
		return;
	}

	nameEl.style.willChange = 'background-position';

	window.gsap.to(nameEl, {
		backgroundPosition: '200% 50%',
		duration: 2.2,
		ease: 'sine.inOut',
		repeat: -1,
		yoyo: true
	});
})();
