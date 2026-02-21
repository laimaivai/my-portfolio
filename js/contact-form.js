// Contact form interactions:
// field validation, inline errors, loading state, and success toast.
(() => {
	const createAlertIcon = () => `
		<svg class="field-error-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
			<circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.8"></circle>
			<path d="M12 7.2V12.6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"></path>
			<circle cx="12" cy="16.2" r="1.1" fill="currentColor"></circle>
		</svg>
	`;

	const createSuccessIcon = () => `
		<svg class="contact-toast-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
			<circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.8"></circle>
			<path d="M7.5 12.4L10.6 15.5L16.5 9.6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
		</svg>
	`;

	const validators = {
		first_name(value) {
			const trimmedValue = value.trim();
			if (trimmedValue === '') return 'Please enter your first name';
			if (trimmedValue.length < 2) return 'First name should be at least 2 characters';
			if (trimmedValue.length > 50) return 'First name is too long (max 50 characters)';
			if (!/^[\p{L}\s'\-]+$/u.test(trimmedValue)) {
				return 'Please use only letters, spaces, hyphens, and apostrophes';
			}
			return '';
		},
		last_name(value) {
			const trimmedValue = value.trim();
			if (trimmedValue === '') return 'Please enter your last name';
			if (trimmedValue.length < 2) return 'Last name should be at least 2 characters';
			if (trimmedValue.length > 50) return 'Last name is too long (max 50 characters)';
			if (!/^[\p{L}\s'\-]+$/u.test(trimmedValue)) {
				return 'Please use only letters, spaces, hyphens, and apostrophes';
			}
			return '';
		},
		email(value) {
			const trimmedValue = value.trim();
			if (trimmedValue === '') return 'Please enter your email address';
			if (trimmedValue.length > 100) return 'Email is too long (max 100 characters)';
			if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(trimmedValue)) {
				return 'Please enter a valid email address (e.g., name@example.com)';
			}
			return '';
		},
		message(value) {
			const trimmedValue = value.trim();
			if (trimmedValue === '') return 'Please write a message';
			if (trimmedValue.length < 10) {
				return 'Your message is a bit short. Please add a few more details (at least 10 characters)';
			}
			if (trimmedValue.length > 1000) {
				return 'Your message is too long. Please keep it under 1000 characters';
			}
			return '';
		}
	};

	const setFieldError = (inputElement, message) => {
		const fieldName = inputElement.dataset.field;
		const wrapper = inputElement.closest(`[data-field-wrapper="${fieldName}"]`);
		const errorElement = wrapper?.querySelector(`[data-error-for="${fieldName}"]`);
		if (!wrapper || !errorElement) {
			return;
		}

		if (message) {
			wrapper.classList.add('is-error');
			wrapper.classList.remove('is-valid');
			inputElement.setAttribute('aria-invalid', 'true');
			errorElement.innerHTML = `${createAlertIcon()}<span class="field-error-text">${message}</span>`;
			errorElement.classList.add('is-visible');
			return;
		}

		wrapper.classList.remove('is-error');
		wrapper.classList.add('is-valid');
		inputElement.removeAttribute('aria-invalid');
		errorElement.innerHTML = '';
		errorElement.classList.remove('is-visible');
	};

	const validateField = (inputElement) => {
		const fieldName = inputElement.dataset.field;
		const validator = validators[fieldName];
		if (typeof validator !== 'function') {
			return '';
		}
		const error = validator(inputElement.value);
		setFieldError(inputElement, error);
		return error;
	};

	const showToast = (title, description) => {
		let stack = document.querySelector('[data-contact-toast-stack]');
		if (!stack) {
			stack = document.createElement('div');
			stack.className = 'contact-toast-stack';
			stack.setAttribute('data-contact-toast-stack', 'true');
			document.body.appendChild(stack);
		}

		const toast = document.createElement('div');
		toast.className = 'contact-toast';
		toast.innerHTML = `
			<div class="contact-toast-inner">
				${createSuccessIcon()}
				<div>
					<p class="contact-toast-title">${title}</p>
					<p class="contact-toast-desc">${description}</p>
				</div>
				<button class="contact-toast-close" type="button" aria-label="Dismiss notification">×</button>
			</div>
		`;

		const dismiss = () => {
			if (toast.classList.contains('is-leaving')) return;
			toast.classList.add('is-leaving');
			setTimeout(() => toast.remove(), 260);
		};

		toast.addEventListener('click', dismiss);
		const closeButton = toast.querySelector('.contact-toast-close');
		closeButton?.addEventListener('click', (event) => {
			event.stopPropagation();
			dismiss();
		});

		stack.appendChild(toast);
		requestAnimationFrame(() => toast.classList.add('is-visible'));
		setTimeout(dismiss, 4000);
	};

	const initContactForm = () => {
		const form = document.querySelector('[data-contact-form]');
		const successBlock = document.querySelector('[data-contact-success]');

		if (successBlock) {
			showToast('Message sent successfully!', "I'll get back to you within 2-3 business days.");
		}

		if (!form) {
			return;
		}

		const fields = Array.from(form.querySelectorAll('[data-field]'));
		fields.forEach((inputElement) => {
			const serverError = inputElement.getAttribute('data-server-error') || '';
			if (serverError.trim() !== '') {
				setFieldError(inputElement, serverError.trim());
			}

			inputElement.addEventListener('blur', () => {
				validateField(inputElement);
			});

			inputElement.addEventListener('input', () => {
				if (inputElement.closest('.field-group')?.classList.contains('is-error')) {
					validateField(inputElement);
				}
			});
		});

		form.addEventListener('submit', (event) => {
			let hasErrors = false;
			fields.forEach((field) => {
				const error = validateField(field);
				if (error) {
					hasErrors = true;
				}
			});

			if (hasErrors) {
				event.preventDefault();
				return;
			}

			event.preventDefault();
			form.classList.add('is-submitting');
			const submitButton = form.querySelector('.contact-submit');
			if (submitButton) {
				submitButton.classList.add('is-submitting');
				submitButton.disabled = true;
			}

			setTimeout(() => {
				form.submit();
			}, 1500);
		});
	};

	window.AppModules = window.AppModules || {};
	window.AppModules.initContactForm = initContactForm;
})();
