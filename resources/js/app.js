document.querySelectorAll('[data-carousel]').forEach((carousel) => {
	const track = carousel.querySelector('[data-carousel-track]');
	if (!track) return;
	const slides = Array.from(track.children);
	const next = carousel.querySelector('[data-carousel-next]');
	const previous = carousel.querySelector('[data-carousel-prev]');
	const dots = carousel.querySelector('[data-carousel-dots]');
	let current = 0;
	let timer;

	const visibleSlides = () => window.innerWidth >= 1024 ? 3 : window.innerWidth >= 768 ? 2 : 1;
	const maxIndex = () => Math.max(0, slides.length - visibleSlides());

	const render = () => {
		current = Math.min(current, maxIndex());
		track.style.transform = `translateX(-${current * (100 / visibleSlides())}%)`;
		dots?.querySelectorAll('button').forEach((dot, index) => {
			dot.classList.toggle('bg-[#e76f51]', index === current);
			dot.classList.toggle('bg-[#cbd9d8]', index !== current);
			dot.setAttribute('aria-current', index === current ? 'true' : 'false');
		});
	};

	const move = (direction) => {
		current = current + direction;
		if (current > maxIndex()) current = 0;
		if (current < 0) current = maxIndex();
		render();
	};

	for (let index = 0; index <= maxIndex(); index += 1) {
		if (!dots) break;
		const dot = document.createElement('button');
		dot.type = 'button';
		dot.className = 'h-2 w-2 rounded-full transition';
		dot.setAttribute('aria-label', `Show agency group ${index + 1}`);
		dot.addEventListener('click', () => { current = index; render(); });
		dots.append(dot);
	}

	const start = () => { timer = window.setInterval(() => move(1), 5000); };
	const stop = () => window.clearInterval(timer);

	next?.addEventListener('click', () => move(1));
	previous?.addEventListener('click', () => move(-1));
	carousel.addEventListener('mouseenter', stop);
	carousel.addEventListener('mouseleave', start);
	carousel.addEventListener('focusin', stop);
	carousel.addEventListener('focusout', start);
	window.addEventListener('resize', render);
	render();
	start();
});

const getCurrentLocale = () => {
	const searchLocale = new URLSearchParams(window.location.search).get('lang');
	const htmlLocale = (document.documentElement.lang || '').split('-')[0];
	if (searchLocale && ['en', 'fr'].includes(searchLocale)) return searchLocale;
	if (htmlLocale && ['en', 'fr'].includes(htmlLocale)) return htmlLocale;
	return 'en';
};

const preserveLocaleOnUrl = (urlValue) => {
	const locale = getCurrentLocale();
	if (!['en', 'fr'].includes(locale)) return urlValue;
	const nextUrl = new URL(urlValue, window.location.href);
	if (nextUrl.origin === window.location.origin) {
		nextUrl.searchParams.set('lang', locale);
	}
	return nextUrl.toString();
};

const applyLocaleToLinks = () => {
	document.querySelectorAll('a[href]').forEach((link) => {
		if (link.closest('[data-lang-button]')) return;
		const href = link.getAttribute('href');
		if (!href || href.startsWith('#') || href.startsWith('mailto:') || href.startsWith('tel:')) return;
		const absoluteHref = new URL(href, window.location.href);
		if (absoluteHref.origin === window.location.origin) {
			link.href = preserveLocaleOnUrl(link.href);
		}
	});
};

applyLocaleToLinks();
document.addEventListener('DOMContentLoaded', applyLocaleToLinks);

document.addEventListener('click', (event) => {
	const link = event.target.closest('a[href]');
	if (!link || link.closest('[data-lang-button]')) return;
	const href = link.getAttribute('href');
	if (!href || href.startsWith('#') || href.startsWith('mailto:') || href.startsWith('tel:')) return;
	const absoluteHref = new URL(href, window.location.href);
	if (absoluteHref.origin === window.location.origin) {
		link.href = preserveLocaleOnUrl(link.href);
	}
});

document.querySelectorAll('form').forEach((form) => {
	form.addEventListener('submit', () => {
		const locale = getCurrentLocale();
		if (!['en', 'fr'].includes(locale) || locale === 'en') return;
		if (form.querySelector('input[name="lang"]')) return;
		const hiddenLang = document.createElement('input');
		hiddenLang.type = 'hidden';
		hiddenLang.name = 'lang';
		hiddenLang.value = locale;
		form.appendChild(hiddenLang);
	});
});

document.querySelectorAll('[data-menu-toggle]').forEach((toggle) => {
	const menu = document.getElementById(toggle.getAttribute('aria-controls'));
	const backdrop = document.querySelector('[data-mobile-backdrop]');
	const close = menu.querySelector('[data-menu-close]');
	const icon = toggle.querySelector('[aria-hidden="true"]');

	const setOpen = (isOpen) => {
		toggle.setAttribute('aria-expanded', String(isOpen));
		menu.classList.toggle('hidden', !isOpen);
		menu.classList.toggle('translate-x-full', !isOpen);
		menu.classList.toggle('translate-x-0', isOpen);
		backdrop.classList.toggle('hidden', !isOpen);
		backdrop.classList.toggle('opacity-0', !isOpen);
		backdrop.classList.toggle('opacity-100', isOpen);
		icon.classList.remove('fa-bars', 'fa-xmark');
		icon.classList.add(isOpen ? 'fa-xmark' : 'fa-bars');
		document.body.classList.toggle('overflow-hidden', isOpen);
	};

	toggle.addEventListener('click', () => setOpen(toggle.getAttribute('aria-expanded') !== 'true'));
	close.addEventListener('click', () => setOpen(false));
	backdrop.addEventListener('click', () => setOpen(false));
	menu.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => setOpen(false)));
});

document.querySelectorAll('[data-loading-submit]').forEach((button) => {
	button.closest('form').addEventListener('submit', () => {
		button.disabled = true;
		button.classList.add('cursor-wait', 'opacity-80');
		button.querySelector('[data-submit-label]').textContent = 'Loading...';
		button.querySelector('[data-submit-spinner]').classList.remove('hidden');
	});
});

document.querySelectorAll('[data-password-toggle]').forEach((toggle) => {
	const password = document.getElementById('password');
	const icon = toggle.querySelector('[data-password-icon]');

	toggle.addEventListener('click', () => {
		const isPassword = password.type === 'password';
		password.type = isPassword ? 'text' : 'password';
		toggle.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');
		icon.innerHTML = isPassword
			? '<path d="M3 3l18 18M10.6 10.6a2 2 0 0 0 2.8 2.8M9.9 5.3A10.8 10.8 0 0 1 12 5c6 0 9.5 7 9.5 7a16.8 16.8 0 0 1-3 3.8M6.2 6.2C3.8 8.1 2.5 12 2.5 12s3.5 7 9.5 7c1.2 0 2.3-.3 3.3-.7"/>'
			: '<path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"/><circle cx="12" cy="12" r="2.5"/>';
	});
});

document.querySelectorAll('[data-favorite-toggle]').forEach((toggle) => {
	toggle.addEventListener('click', (event) => {
		event.preventDefault();
		const isSaved = toggle.getAttribute('aria-pressed') === 'true';
		toggle.setAttribute('aria-pressed', String(!isSaved));
		toggle.classList.toggle('text-[#e76f51]', !isSaved);
		const icon = toggle.querySelector('[data-favorite-icon]') || toggle;
		const label = toggle.querySelector('[data-favorite-label]');
		if (icon) icon.textContent = isSaved ? '♡' : '♥';
		if (label) label.textContent = isSaved ? 'Save agency' : 'Agency saved';
	});
});

document.querySelectorAll('[data-rating]').forEach((ratingButton) => {
	ratingButton.addEventListener('click', () => {
		const rating = Number(ratingButton.dataset.rating);
		ratingButton.parentElement.querySelectorAll('[data-rating]').forEach((button) => {
			button.classList.toggle('text-[#e76f51]', Number(button.dataset.rating) <= rating);
		});
		const message = ratingButton.closest('section').querySelector('[data-rating-message]');
		message.textContent = `${rating} star${rating === 1 ? '' : 's'} selected. Sign in to publish your rating and comment.`;
	});
});

document.querySelectorAll('[data-destination-carousel]').forEach((carousel) => {
	const track = carousel.querySelector('[data-destination-track]');
	const slides = Array.from(track.children);
	const next = carousel.querySelector('[data-destination-next]');
	const previous = carousel.querySelector('[data-destination-prev]');
	let current = 0;
	let timer;

	const visibleSlides = () => window.innerWidth >= 1024 ? 3 : window.innerWidth >= 640 ? 2 : 1;
	const maxIndex = () => Math.max(0, slides.length - visibleSlides());
	const render = () => {
		current = Math.min(current, maxIndex());
		track.style.transform = `translateX(-${current * (100 / visibleSlides())}%)`;
	};
	const move = (direction) => {
		current = current + direction;
		if (current > maxIndex()) current = 0;
		if (current < 0) current = maxIndex();
		render();
	};
	const start = () => { timer = window.setInterval(() => move(1), 4500); };
	const stop = () => window.clearInterval(timer);

	next?.addEventListener('click', () => move(1));
	previous?.addEventListener('click', () => move(-1));
	carousel.addEventListener('mouseenter', stop);
	carousel.addEventListener('mouseleave', start);
	carousel.addEventListener('focusin', stop);
	carousel.addEventListener('focusout', start);
	window.addEventListener('resize', render);
	render();
	start();
});

