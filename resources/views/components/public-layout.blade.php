<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $description ?? 'Discover trusted travel agencies with TravelConnect.' }}">
    <title>{{ $title ?? 'TravelConnect' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-[#fbfaf7] text-[#173042] antialiased">
    <div id="page-loader" class="fixed inset-0 z-[100] flex items-center justify-center bg-[#fbfaf7] transition-opacity duration-300" aria-live="polite" aria-label="Loading page" role="status">
        <div class="flex flex-col items-center gap-5 text-center">
            <span class="flex h-16 w-16 items-center justify-center overflow-hidden rounded-full bg-white shadow-[0_12px_30px_rgba(23,48,66,0.08)]">
                <img src="{{ asset('images/logo.png') }}" alt="TravelConnect logo" class="h-full w-full object-contain">
            </span>
            <div class="flex flex-col items-center gap-3">
                <span class="h-8 w-8 animate-spin rounded-full border-[3px] border-[#dfe8e8] border-t-[#e76f51]" aria-label="Loading"></span>
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[.18em] text-[#e76f51]">Loading</p>
                    <p class="mt-1 text-sm text-[#607985]">Preparing your TravelConnect experience...</p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-1">
        {{ $slot }}
    </div>
    <script>
        let loaderStartedAt = Date.now();
        const minimumLoaderTime = 200;

        const showPageLoader = () => {
            const loader = document.getElementById('page-loader');
            if (!loader) return;
            loaderStartedAt = Date.now();
            loader.classList.remove('pointer-events-none', 'opacity-0');
        };

        const hidePageLoader = () => {
            const loader = document.getElementById('page-loader');
            if (!loader) return;
            const remainingTime = Math.max(0, minimumLoaderTime - (Date.now() - loaderStartedAt));
            window.setTimeout(() => loader.classList.add('pointer-events-none', 'opacity-0'), remainingTime);
        };

        document.querySelectorAll('a[href]').forEach((link) => {
            link.addEventListener('click', (event) => {
                const target = link.getAttribute('target');
                const href = link.getAttribute('href');
                if (event.defaultPrevented || target === '_blank' || !href || href.startsWith('#') || href.startsWith('mailto:') || href.startsWith('tel:')) return;
                if (new URL(link.href, window.location.href).origin === window.location.origin) showPageLoader();
            });
        });

        if (document.readyState === 'complete') {
            hidePageLoader();
        } else {
            window.addEventListener('load', hidePageLoader, { once: true });
        }
    </script>
</body>
</html>
