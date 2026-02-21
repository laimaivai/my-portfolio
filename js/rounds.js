// Rounds tabs:
// switch content for Round 1/2/3 with a small transition.
window.AppModules = window.AppModules || {};

window.AppModules.initRounds = () => {
	// Read tab buttons and content placeholders.
	const roundsRoot = document.querySelector('[data-rounds]');
	if (!roundsRoot) {
		return;
	}

	const tabButtons = Array.from(roundsRoot.querySelectorAll('[data-round]'));
	const content = roundsRoot.querySelector('[data-round-content]');
	const heading = roundsRoot.querySelector('[data-round-heading]');
	const description = roundsRoot.querySelector('[data-round-description]');
	const image = roundsRoot.querySelector('[data-round-image]');
	const quote = roundsRoot.querySelector('[data-round-quote]');
	const author = roundsRoot.querySelector('[data-round-author]');

	if (!tabButtons.length || !content || !heading || !description || !image || !quote || !author) {
		return;
	}

	// Content source for each round.
	const roundData = {
		1: {
			heading: 'Improved navigation structure',
			description:
				'Users struggled to understand the relationship between partners and their sub-units. Added section headlines and restructured the hierarchy.',
			image: 'Images/before_after1.png',
			imageAlt: 'Round 1 usability testing results',
			quote: '“I have to open each one just to figure out which belongs to which.”',
			author: '— Finnish partnership manager'
		},
		2: {
			heading: 'Clearer filtering and grouping',
			description:
				'In the second round, users requested faster ways to compare partner branches. We introduced stronger filter grouping and clearer labels for hierarchy levels.',
			image: 'Images/inspection.svg',
			imageAlt: 'Round 2 usability testing results',
			quote: '“Now I can narrow down to the right branch much faster.”',
			author: '— Swedish claims specialist'
		},
		3: {
			heading: 'Higher confidence in decisions',
			description:
				'The final round focused on confidence and speed. We refined partner detail summaries and score visibility so users could make decisions without opening multiple records.',
			image: 'Images/partners.svg',
			imageAlt: 'Round 3 usability testing results',
			quote: '“This gives me enough context to choose the right partner immediately.”',
			author: '— Danish operations lead'
		}
	};

	let activeRound = '1';
	let isTransitioning = false;

	// Visual active state on tab buttons.
	const setActiveButton = (roundKey) => {
		tabButtons.forEach((button) => {
			const isActive = button.dataset.round === roundKey;
			button.classList.toggle('active', isActive);
			button.setAttribute('aria-selected', String(isActive));
		});
	};

	const applyRoundContent = (roundKey) => {
		const data = roundData[roundKey];
		if (!data) {
			return;
		}

		heading.textContent = data.heading;
		description.textContent = data.description;
		image.src = data.image;
		image.alt = data.imageAlt;
		quote.textContent = data.quote;
		author.textContent = data.author;
	};

	const switchRound = (nextRound) => {
		if (isTransitioning || nextRound === activeRound) {
			return;
		}

		isTransitioning = true;
		content.classList.remove('is-entering');
		content.classList.add('is-leaving');

		window.setTimeout(() => {
			content.classList.remove('is-leaving');
			applyRoundContent(nextRound);
			setActiveButton(nextRound);
			activeRound = nextRound;

			content.classList.add('is-entering');

			window.setTimeout(() => {
				content.classList.remove('is-entering');
				isTransitioning = false;
			}, 400);
		}, 400);
	};

	tabButtons.forEach((button) => {
		button.addEventListener('click', () => {
			switchRound(button.dataset.round || '1');
		});
	});

	// Initial render.
	applyRoundContent(activeRound);
	setActiveButton(activeRound);
};
