// Impact card animation:
// run once when the card becomes visible in the viewport.
window.AppModules = window.AppModules || {};

window.AppModules.initImpactCard = () => {
	// Find required elements; exit if this block is not on the page.
	const impactCard = document.querySelector('[data-impact-card]');
	if (!impactCard) {
		return;
	}

	const countElement = impactCard.querySelector('.impact-count');
	const fillElement = impactCard.querySelector('.impact-fill');
	const targetValue = Number.parseInt(countElement?.dataset.target || '80', 10);
	const duration = 2000;
	let hasAnimated = false;

	// Animate number and progress bar from 0 to target.
	const runImpactAnimation = () => {
		if (!countElement || !fillElement || hasAnimated) {
			return;
		}

		hasAnimated = true;
		impactCard.classList.add('is-visible');

		const startedAt = performance.now();

		const step = (now) => {
			const elapsed = now - startedAt;
			const progress = Math.min(elapsed / duration, 1);
			const eased = 1 - Math.pow(1 - progress, 3);
			const currentValue = Math.round(targetValue * eased);

			countElement.textContent = String(currentValue);
			fillElement.style.width = `${targetValue * eased}%`;

			if (progress < 1) {
				requestAnimationFrame(step);
				return;
			}

			countElement.textContent = String(targetValue);
			fillElement.style.width = `${targetValue}%`;
		};

		requestAnimationFrame(step);
	};

	// Trigger animation when card enters view, then disconnect observer.
	const observer = new IntersectionObserver(
		(entries) => {
			entries.forEach((entry) => {
				if (!entry.isIntersecting) {
					return;
				}

				runImpactAnimation();
				observer.disconnect();
			});
		},
		{
			threshold: 0.3,
			rootMargin: '0px 0px -10% 0px'
		}
	);

	observer.observe(impactCard);
};
