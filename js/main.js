// Main entrypoint:
// run all feature initializers after DOM is ready.
(() => {
	const runInitializers = () => {
		const modules = window.AppModules || {};
		// Order is intentional so shared setup runs before page features.
		const initOrder = ['initContactForm', 'initAos', 'initToc', 'initImpactCard', 'initRounds'];

		initOrder.forEach((initializerName) => {
			const initializer = modules[initializerName];
			if (typeof initializer === 'function') {
				initializer();
			}
		});
	};

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', runInitializers, { once: true });
		return;
	}

	runInitializers();
})();
