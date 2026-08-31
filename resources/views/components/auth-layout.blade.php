<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Account | TravelConnect' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f1f6f4] text-[#173042] antialiased">
    <div id="page-loader" class="pointer-events-none fixed inset-0 z-[100] flex items-center justify-center bg-[#fbfaf7] opacity-0 transition-opacity duration-300" aria-live="polite" aria-label="{{ __('messages.loading_page') }}" role="status">
        <div class="flex flex-col items-center gap-5 text-center">
            <span class="flex h-16 w-16 items-center justify-center overflow-hidden rounded-full bg-white shadow-[0_12px_30px_rgba(23,48,66,0.08)]">
                <img src="{{ asset('images/logo.png') }}" alt="TravelConnect logo" class="h-full w-full object-contain">
            </span>
            <div class="flex flex-col items-center gap-3">
                <span class="h-8 w-8 animate-spin rounded-full border-[3px] border-[#dfe8e8] border-t-[#e76f51]" aria-label="{{ __('messages.loading') }}"></span>
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[.18em] text-[#e76f51]">{{ __('messages.loading') }}</p>
                    <p class="mt-1 text-sm text-[#607985]">{{ __('messages.please_wait') }}</p>
                </div>
            </div>
        </div>
    </div>
    {{ $slot }}
    <script>
        const loader = document.getElementById('page-loader');

        const showPageLoader = () => {
            if (!loader) return;
            loader.classList.remove('pointer-events-none', 'opacity-0');
        };

        const hidePageLoader = () => {
            if (!loader) return;
            loader.classList.add('pointer-events-none', 'opacity-0');
        };

        hidePageLoader();

        document.querySelectorAll('a[href]').forEach((link) => {
            link.addEventListener('click', (event) => {
                const target = link.getAttribute('target');
                const href = link.getAttribute('href');
                if (event.defaultPrevented || target === '_blank' || !href || href.startsWith('#') || href.startsWith('mailto:') || href.startsWith('tel:')) return;
                if (link.closest('[data-lang-button]')) return;
                if (new URL(link.href, window.location.href).origin === window.location.origin) {
                    showPageLoader();
                }
            });
        });

        if (document.readyState === 'complete') {
            hidePageLoader();
        } else {
            window.addEventListener('load', hidePageLoader, { once: true });
            window.addEventListener('pageshow', hidePageLoader, { once: true });
        }
    </script>
</body>
</html>
