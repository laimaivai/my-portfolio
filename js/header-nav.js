// Header nav: keep one active item on click and hash updates.
(() => {
	const menuLinks = Array.from(document.querySelectorAll('.menu a'));
	if (!menuLinks.length) {
		return;
	}

	const setActive = (activeLink) => {
		menuLinks.forEach((link) => {
			link.classList.toggle('active', link === activeLink);
		});
	};

	const setActiveByHash = () => {
		const currentHash = window.location.hash;
		if (!currentHash) {
			return;
		}

		const linkForHash = menuLinks.find((link) => {
			const href = link.getAttribute('href') || '';
			return href.endsWith(currentHash);
		});

		if (linkForHash) {
			setActive(linkForHash);
		}
	};

	menuLinks.forEach((link) => {
		link.addEventListener('click', () => setActive(link));
	});

	setActiveByHash();
	window.addEventListener('hashchange', setActiveByHash);
})();

// Mobile menu toggle
(() => {
	const menuToggle = document.querySelector('.menu-toggle');
	const mobileMenu = document.querySelector('.mobile-menu');
	const mobileMenuLinks = mobileMenu ? Array.from(mobileMenu.querySelectorAll('a')) : [];

	if (!menuToggle || !mobileMenu) {
		return;
	}

	const openMenu = () => {
		menuToggle.classList.add('is-open');
		menuToggle.setAttribute('aria-expanded', 'true');
		menuToggle.setAttribute('aria-label', 'Close menu');
		mobileMenu.classList.add('is-open');
		mobileMenu.setAttribute('aria-hidden', 'false');
	};

	const closeMenu = () => {
		menuToggle.classList.remove('is-open');
		menuToggle.setAttribute('aria-expanded', 'false');
		menuToggle.setAttribute('aria-label', 'Open menu');
		mobileMenu.classList.remove('is-open');
		mobileMenu.setAttribute('aria-hidden', 'true');
	};

	const toggleMenu = () => {
		const isOpen = menuToggle.classList.contains('is-open');
		if (isOpen) {
			closeMenu();
		} else {
			openMenu();
		}
	};

	// Toggle on hamburger click
	menuToggle.addEventListener('click', toggleMenu);

	// Close menu when clicking a link
	mobileMenuLinks.forEach((link) => {
		link.addEventListener('click', closeMenu);
	});

	// Close menu on escape key
	document.addEventListener('keydown', (e) => {
		if (e.key === 'Escape' && menuToggle.classList.contains('is-open')) {
			closeMenu();
			menuToggle.focus();
		}
	});

	// Close menu when clicking outside
	document.addEventListener('click', (e) => {
		if (menuToggle.classList.contains('is-open') && 
			!mobileMenu.contains(e.target) && 
			!menuToggle.contains(e.target)) {
			closeMenu();
		}
	});

	// Close menu on resize to tablet/desktop
	window.addEventListener('resize', () => {
		if (window.innerWidth > 600 && menuToggle.classList.contains('is-open')) {
			closeMenu();
		}
	});
})();
