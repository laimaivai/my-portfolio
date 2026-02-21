// Hero line intro: draw dashed connector once on page load.
(() => {
	const linePath = document.getElementById('hero-connector-path');
	const arrowPath = document.getElementById('hero-connector-arrow');
	if (!linePath || !arrowPath || !window.gsap) {
		return;
	}

	const totalLength = linePath.getTotalLength();
	linePath.style.strokeDasharray = `${totalLength} ${totalLength}`;
	linePath.style.strokeDashoffset = `${totalLength}`;
	arrowPath.style.opacity = '0';

	window.gsap.to(linePath, {
		strokeDashoffset: 0,
		duration: 1.6,
		delay: 0.15,
		ease: 'power3.out',
		onComplete: () => {
			window.gsap.to(linePath, {
				strokeDasharray: '2 14',
				duration: 0.55,
				ease: 'sine.inOut'
			});
		}
	});

	window.gsap.to(arrowPath, {
		opacity: 1,
		duration: 0.35,
		delay: 1.45,
		ease: 'power1.out'
	});
})();
