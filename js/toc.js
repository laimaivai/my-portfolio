// Table of contents behavior:
// - click to smooth-scroll
// - update active item on click + natural scroll
// - avoid jumpy state changes during programmatic scroll
window.AppModules = window.AppModules || {};

window.AppModules.initToc = () => {
	const syncOffsetsWithHeader = () => {
		const header = document.querySelector('.header');
		const root = document.documentElement;
		if (!header || !root) {
			return;
		}

		const headerHeight = Math.ceil(header.getBoundingClientRect().height);
		const stickyTop = headerHeight + 24;
		const sectionOffset = headerHeight + 40;

		root.style.setProperty('--toc-sticky-top', `${stickyTop}px`);
		root.style.setProperty('--section-scroll-margin-top', `${sectionOffset}px`);
	};

	syncOffsetsWithHeader();
	window.addEventListener('resize', syncOffsetsWithHeader);

	const tocLinks = Array.from(document.querySelectorAll('.toc-link'));
	const sectionMap = tocLinks
		.map((link) => {
			const targetId = link.getAttribute('href')?.replace('#', '');
			if (!targetId) {
				return null;
			}
			const section = document.getElementById(targetId);
			return section ? { link, section } : null;
		})
		.filter(Boolean);

	if (!sectionMap.length) {
		return;
	}

	let isProgrammaticScroll = false;
	let unlockTimer = null;
	let scrollStopTimer = null;

	const setActive = (activeId) => {
		sectionMap.forEach(({ link, section }) => {
			const isActive = section.id === activeId;
			link.classList.toggle('active', isActive);
			if (isActive) {
				link.setAttribute('aria-current', 'true');
			} else {
				link.removeAttribute('aria-current');
			}
		});
	};

	const startProgrammaticScroll = () => {
		isProgrammaticScroll = true;
		if (unlockTimer) {
			window.clearTimeout(unlockTimer);
		}
		unlockTimer = window.setTimeout(() => {
			isProgrammaticScroll = false;
		}, 1000);
	};

	const scrollToSection = (targetSection, behavior = 'smooth') => {
		targetSection.scrollIntoView({
			behavior,
			block: 'start'
		});
	};

	const handleItemClick = (event, targetId) => {
		event.preventDefault();
		const targetSection = document.getElementById(targetId);
		if (!targetSection) {
			return;
		}

		setActive(targetId);
		startProgrammaticScroll();
		scrollToSection(targetSection, 'smooth');
		window.history.replaceState(null, '', `#${targetId}`);
	};

	sectionMap.forEach(({ link, section }) => {
		link.addEventListener('click', (event) => {
			handleItemClick(event, section.id);
		});
	});

	setActive(sectionMap[0].section.id);

	const applyHashScroll = (behavior = 'auto') => {
		const hashId = window.location.hash.replace('#', '');
		if (!hashId) {
			return;
		}

		const targetSection = document.getElementById(hashId);
		if (!targetSection) {
			return;
		}

		setActive(hashId);
		startProgrammaticScroll();
		scrollToSection(targetSection, behavior);
	};

	if (window.location.hash) {
		window.requestAnimationFrame(() => {
			applyHashScroll('auto');
		});
	}

	window.addEventListener('hashchange', () => {
		applyHashScroll('smooth');
	});

	const visibleRatios = new Map();

	const observer = new IntersectionObserver(
		(entries) => {
			if (isProgrammaticScroll) {
				return;
			}

			entries.forEach((entry) => {
				visibleRatios.set(entry.target.id, entry.intersectionRatio);
			});

			let mostVisibleId = null;
			let maxRatio = 0;

			visibleRatios.forEach((ratio, id) => {
				if (ratio > maxRatio) {
					maxRatio = ratio;
					mostVisibleId = id;
				}
			});

			if (mostVisibleId) {
				setActive(mostVisibleId);
			}
		},
		{
			root: null,
			rootMargin: '-20% 0px -60% 0px',
			threshold: [0, 0.25, 0.5, 0.75, 1]
		}
	);

	sectionMap.forEach(({ section }) => {
		observer.observe(section);
	});

	window.addEventListener(
		'scroll',
		() => {
			if (scrollStopTimer) {
				window.clearTimeout(scrollStopTimer);
			}

			scrollStopTimer = window.setTimeout(() => {
				isProgrammaticScroll = false;
			}, 150);
		},
		{ passive: true }
	);
};
