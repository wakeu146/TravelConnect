@props(['overlay' => false])

<head>
    {{-- Flag Icons --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.3.2/css/flag-icons.min.css">

</head>

<header
    class="sticky top-0 z-30 border-b border-[#dbe3e5] bg-white text-[#173042] shadow-[0_2px_12px_rgba(23,48,66,.06)]">

    {{-- =========================================================
         MAIN NAVBAR
    ========================================================== --}}
    <nav
        class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-5 sm:py-4 lg:px-8 lg:py-5"
        aria-label="Main navigation">

        {{-- LOGO --}}
        <a href="{{ auth()->check() ? route('dashboard', ['lang' => app()->getLocale()]) : route('home') }}"
            class="flex items-center gap-2.5 text-base font-semibold tracking-tight text-[#173042] sm:gap-3 sm:text-lg">

            <span
                class="flex h-8 w-8 shrink-0 items-center justify-center overflow-hidden rounded-full bg-white shadow-sm sm:h-10 sm:w-10 lg:h-11 lg:w-11">
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="TravelConnect logo"
                    class="h-full w-full object-contain">
            </span>

            <span>
                Travel<span class="font-normal text-[#e76f51]">Connect</span>
            </span>
        </a>

        {{-- =====================================================
             DESKTOP NAVIGATION
        ====================================================== --}}
        <div class="hidden items-center gap-8 text-sm font-medium text-[#607985] md:flex">
            @auth
                <a href="{{ route('dashboard', ['lang' => app()->getLocale()]) }}" class="transition hover:text-[#e76f51]">{{ __('messages.overview') }}</a>
                <a href="{{ route('account.discover', ['lang' => app()->getLocale()]) }}" class="transition hover:text-[#e76f51]">{{ __('messages.discover_agencies') }}</a>
                <a href="{{ route('account.saved', ['lang' => app()->getLocale()]) }}" class="transition hover:text-[#e76f51]">{{ __('messages.saved_agencies') }}</a>
                <a href="{{ route('account.activity', ['lang' => app()->getLocale()]) }}" class="transition hover:text-[#e76f51]">{{ __('messages.my_activity') }}</a>
            @else

            {{-- HOME --}}
            <a href="{{ route('home') }}"
                class="group relative flex items-center gap-2 py-2 transition hover:text-[#e76f51]
                {{ request()->routeIs('home') ? 'text-[#e76f51]' : '' }}">

                <span>{{ __('messages.home') }}</span>

                <span
                    class="absolute inset-x-0 bottom-0 h-0.5 origin-left bg-[#e76f51] transition-transform
                    {{ request()->routeIs('home')
                        ? 'scale-x-100'
                        : 'scale-x-0 group-hover:scale-x-100' }}">
                </span>
            </a>


            @if (auth()->check())
            {{-- AGENCIES --}}
            <a href="{{ route('discover') }}"
                class="group relative flex items-center gap-2 py-2 transition hover:text-[#e76f51]
                {{ request()->routeIs('discover') || request()->routeIs('agency.show')
                    ? 'text-[#e76f51]'
                    : '' }}">

                <span>{{ __('messages.agencies') }}</span>

                <span
                    class="absolute inset-x-0 bottom-0 h-0.5 origin-left bg-[#e76f51] transition-transform
                    {{ request()->routeIs('discover') || request()->routeIs('agency.show')
                        ? 'scale-x-100'
                        : 'scale-x-0 group-hover:scale-x-100' }}">
                </span>
            </a>


            @endif

            {{-- ABOUT --}}
            <div class="group relative">

                <button
                    type="button"
                    class="flex items-center gap-2 py-2 transition hover:text-[#e76f51]">

                    <span>{{ __('messages.about') }}</span>

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-3 w-3 transition-transform duration-200 group-hover:rotate-180" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
                </button>

                <div
                    class="invisible absolute left-1/2 top-full z-40 w-52 -translate-x-1/2 translate-y-2 rounded-xl border border-[#dbe3e5] bg-white p-2 opacity-0 shadow-[0_14px_30px_rgba(23,48,66,.12)] transition-all duration-200 group-hover:visible group-hover:translate-y-0 group-hover:opacity-100 group-focus-within:visible group-focus-within:translate-y-0 group-focus-within:opacity-100">

                    <a href="{{ route('how-it-works') }}"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-[#607985] transition hover:bg-[#f1f6f4] hover:text-[#173042]">

                        <!--<span
                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#f1f6f4] text-[#173042]">
                            <i class="fa-regular fa-circle-question text-sm"></i>
                        </span>-->

                        <span>{{ __('messages.how_it_works') }}</span>
                    </a>

                    <a href="{{ route('for-agencies') }}"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-[#607985] transition hover:bg-[#f1f6f4] hover:text-[#173042]">

                        <!--<span
                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#f1f6f4] text-[#173042]">
                            <i class="fa-solid fa-building text-sm"></i>
                        </span>-->

                        <span>{{ __('messages.for_agencies') }}</span>
                    </a>
                </div>
            </div>


            {{-- CONTACT --}}
            <div class="group relative">

                <button
                    type="button"
                    class="flex items-center gap-2 py-2 transition hover:text-[#e76f51]">

                    <span>{{ __('messages.contact') }}</span>

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-3 w-3 transition-transform duration-200 group-hover:rotate-180" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
                </button>

                <div
                    class="invisible absolute left-1/2 top-full z-40 w-52 -translate-x-1/2 translate-y-2 rounded-xl border border-[#dbe3e5] bg-white p-2 opacity-0 shadow-[0_14px_30px_rgba(23,48,66,.12)] transition-all duration-200 group-hover:visible group-hover:translate-y-0 group-hover:opacity-100 group-focus-within:visible group-focus-within:translate-y-0 group-focus-within:opacity-100">

                    <a href="{{ route('email-us', ['lang' => app()->getLocale()]) }}"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-[#607985] transition hover:bg-[#f1f6f4] hover:text-[#173042]">

                        <!--<span
                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#f1f6f4] text-[#173042]">
                            <i class="fa-regular fa-envelope text-sm"></i>
                        </span>-->

                        <span>{{ __('messages.email_us') }}</span>
                    </a>

                    <a href="{{ route('agency-resources', ['lang' => app()->getLocale()]) }}"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-[#607985] transition hover:bg-[#f1f6f4] hover:text-[#173042]">

                        <!--<span
                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#f1f6f4] text-[#173042]">
                            <i class="fa-solid fa-book-open text-sm"></i>
                        </span>-->

                        <span>{{ __('messages.agency_resources') }}</span>
                    </a>
                </div>
            </div>

            @endauth
        </div>


        {{-- =====================================================
             RIGHT SIDE
        ====================================================== --}}
        <div class="flex items-center gap-1.5 sm:gap-3">

            {{-- LANGUAGE --}}
            <div
                class="hidden items-center rounded-xl border border-[#dbe3e5] bg-white p-1 sm:flex"
                aria-label="Language selection">

                <a
                    href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}"
                    aria-label="English"
                    title="English"
                    data-lang-button
                    data-lang="en"
                    data-translate-lang="en"
                    class="flex h-8 w-9 items-center justify-center rounded-lg transition
                    {{ request('lang', 'en') === 'en'
                        ? 'bg-[#173042] shadow-sm'
                        : 'hover:bg-[#f1f6f4]' }}">

                    <span class="fi fi-gb rounded-sm"></span>
                </a>

                <a
                    href="{{ request()->fullUrlWithQuery(['lang' => 'fr']) }}"
                    aria-label="Français"
                    title="Français"
                    data-lang-button
                    data-lang="fr"
                    data-translate-lang="fr"
                    class="flex h-8 w-9 items-center justify-center rounded-lg transition
                    {{ request('lang') === 'fr'
                        ? 'bg-[#173042] shadow-sm'
                        : 'hover:bg-[#f1f6f4]' }}">

                    <span class="fi fi-fr rounded-sm"></span>
                </a>

                <div id="google_translate_element" class="hidden"></div>
            </div>


            @guest
                <a href="{{ route('login', ['lang' => app()->getLocale()]) }}" data-loading-link class="hidden px-3 py-2 text-sm font-medium text-[#607985] transition hover:text-[#173042] sm:block">{{ __('messages.login') }}</a>
                <a href="{{ route('register', ['lang' => app()->getLocale()]) }}" class="hidden rounded-full bg-[#173042] px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#26495d] sm:inline-flex"><span>{{ __('messages.create_account') }}</span></a>
            @else
                <a href="{{ route('settings', ['lang' => app()->getLocale()]) }}" class="hidden px-3 py-2 text-sm font-medium text-[#607985] transition hover:text-[#173042] sm:block">{{ __('messages.settings') }}</a>
                <form action="{{ route('logout') }}" method="POST" class="hidden sm:block">@csrf<button type="submit" class="px-3 py-2 text-sm font-semibold text-[#607985] transition hover:text-[#e76f51]">{{ __('messages.logout') }}</button></form>
                <a href="{{ route('settings', ['lang' => app()->getLocale()]) }}" class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-full bg-[#173042] text-sm font-bold text-white" aria-label="{{ __('messages.settings') }}">@if (auth()->user()->profile_photo_path)<img src="{{ asset('storage/'.auth()->user()->profile_photo_path) }}" alt="{{ auth()->user()->name }}" class="h-full w-full object-cover">@else{{ str(auth()->user()->name)->substr(0, 1)->upper() }}@endif</a>
            @endguest


            {{-- MOBILE MENU BUTTON --}}
            <button
                type="button"
                data-menu-toggle
                aria-expanded="false"
                aria-controls="mobile-menu"
                class="group flex h-9 w-9 shrink-0 items-center justify-center rounded-lg border border-[#dbe3e5] bg-white text-[#173042] shadow-sm transition hover:border-[#173042] hover:bg-[#f8faf9] sm:h-10 sm:w-10 md:hidden">

<span class="sr-only">{{ __('messages.open_navigation') }}</span>

                <svg data-menu-icon viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-4 w-4 transition-transform duration-200 group-hover:scale-110 sm:h-5 sm:w-5" aria-hidden="true">
                    <path d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

        </div>

    </nav>


    {{-- =========================================================
         MOBILE BACKDROP
    ========================================================== --}}
    <div
        data-mobile-backdrop
        class="fixed inset-0 z-40 hidden bg-[#102936]/55 opacity-0 backdrop-blur-[2px] transition-opacity duration-300 md:hidden">
    </div>


    {{-- =========================================================
         MOBILE NAVIGATION DRAWER
    ========================================================== --}}
    <aside
        id="mobile-menu"
        data-mobile-menu
        aria-label="Mobile navigation"
        class="fixed bottom-0 right-0 top-0 z-50 hidden w-full translate-x-full overflow-y-auto border-l border-[#e7eceb] bg-white text-[#173042] shadow-2xl transition-transform duration-300 md:hidden">

        <div class="flex min-h-full flex-col">


            {{-- DRAWER HEADER --}}
            <div
                class="flex items-center justify-between border-b border-[#e7eceb] px-4 py-4">

                <a
                    href="{{ auth()->check() ? route('dashboard', ['lang' => app()->getLocale()]) : route('home') }}"
                    class="flex items-center gap-2.5">

                    <span
                        class="flex h-8 w-8 items-center justify-center overflow-hidden rounded-full bg-[#fbfaf7] shadow-sm">

                        <img
                            src="{{ asset('images/logo.png') }}"
                            alt="TravelConnect logo"
                            class="h-full w-full object-contain">
                    </span>

                    <span class="text-base font-semibold tracking-tight">
                        Travel<span class="font-normal text-[#e76f51]">Connect</span>
                    </span>
                </a>


                {{-- CLOSE --}}
                <button
                    type="button"
                    data-menu-close
                    aria-label="Close navigation"
                    class="group flex h-9 w-9 items-center justify-center rounded-lg border border-[#dbe3e5] bg-white text-[#607985] transition hover:border-[#e76f51] hover:bg-[#fff7f4] hover:text-[#e76f51]">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-5 w-5 transition-transform duration-200 group-hover:rotate-90" aria-hidden="true">
                        <path d="m6 6 12 12M18 6 6 18"/>
                    </svg>
                </button>

            </div>


            {{-- =================================================
                 MOBILE CONTENT
            ================================================== --}}
            <div class="flex-1 px-4 py-4">


                @guest
                {{-- NAVIGATION LABEL --}}
                <div class="mb-2 px-2.5">
                    <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#9aabad]">
                        {{ __('messages.navigation') }}
                    </p>
                </div>
                @endguest

                @auth
                <div class="mb-2 px-2.5"><p class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#9aadb2]">{{ __('messages.workspace') }}</p></div>
                <div class="space-y-0.5">
                    <a href="{{ route('dashboard', ['lang' => app()->getLocale()]) }}" class="group flex items-center gap-2.5 rounded-lg bg-[#f1f6f4] px-2.5 py-2.5 text-[#e76f51]"><span class="flex h-8 w-8 items-center justify-center rounded-lg bg-white shadow-sm"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4" aria-hidden="true"><rect x="4" y="4" width="6" height="6" rx="1"/><rect x="14" y="4" width="6" height="6" rx="1"/><rect x="4" y="14" width="6" height="6" rx="1"/><rect x="14" y="14" width="6" height="6" rx="1"/></svg></span><span class="text-[13px] font-semibold">{{ __('messages.overview') }}</span></a>
                    <a href="{{ route('account.discover', ['lang' => app()->getLocale()]) }}" class="group flex items-center gap-2.5 rounded-lg px-2.5 py-2.5 text-[#526b76] hover:bg-[#f7f9f8] hover:text-[#173042]"><span class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#f4f7f6]"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m16.5 16.5 4 4"/></svg></span><span class="text-[13px] font-semibold">{{ __('messages.discover_agencies') }}</span></a>
                    <a href="{{ route('account.saved', ['lang' => app()->getLocale()]) }}" class="group flex items-center gap-2.5 rounded-lg px-2.5 py-2.5 text-[#526b76] hover:bg-[#f7f9f8] hover:text-[#173042]"><span class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#f4f7f6]"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4" aria-hidden="true"><path d="M6 4h12v16l-6-3-6 3V4Z"/></svg></span><span class="text-[13px] font-semibold">{{ __('messages.saved_agencies') }}</span></a>
                    <a href="{{ route('settings', ['lang' => app()->getLocale()]) }}" class="group flex items-center gap-2.5 rounded-lg px-2.5 py-2.5 text-[#526b76] hover:bg-[#f7f9f8] hover:text-[#173042]"><span class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#f4f7f6]"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4" aria-hidden="true"><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.6 5.6l2.1 2.1M16.3 16.3l2.1 2.1M18.4 5.6l-2.1 2.1M7.7 16.3l-2.1 2.1"/><circle cx="12" cy="12" r="3"/></svg></span><span class="text-[13px] font-semibold">{{ __('messages.settings') }}</span></a>
                </div>
                @endauth


                @guest
                {{-- NAVIGATION LINKS --}}
                <div class="space-y-0.5">


                    {{-- HOME --}}
                    <a
                        href="{{ route('home') }}"
                        class="group flex items-center gap-2.5 rounded-lg border border-transparent px-2.5 py-2.5 transition
                        {{ request()->routeIs('home')
                            ? 'bg-[#f1f6f4] text-[#e76f51]'
                            : 'text-[#526b76] hover:bg-[#f7f9f8] hover:text-[#173042]' }}">

                        <span
                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg transition
                            {{ request()->routeIs('home')
                                ? 'bg-white text-[#e76f51] shadow-sm'
                                : 'bg-[#f4f7f6] text-[#607985] group-hover:bg-white group-hover:text-[#173042] group-hover:shadow-sm' }}">

                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4" aria-hidden="true"><path d="m3 11 9-8 9 8v9a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1v-9Z"/></svg>
                        </span>

                        <span class="flex-1 text-[13px] font-semibold">
                            {{ __('messages.home') }}
                        </span>

                        @if (request()->routeIs('home'))
                            <span class="h-1.5 w-1.5 rounded-full bg-[#e76f51]"></span>
                        @endif

                    </a>


                    @if (auth()->check())
                    {{-- AGENCIES --}}
                    <a
                        href="{{ route('discover') }}"
                        class="group flex items-center gap-2.5 rounded-lg border border-transparent px-2.5 py-2.5 transition
                        {{ request()->routeIs('discover') || request()->routeIs('agency.show')
                            ? 'bg-[#f1f6f4] text-[#e76f51]'
                            : 'text-[#526b76] hover:bg-[#f7f9f8] hover:text-[#173042]' }}">

                        <span
                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg transition
                            {{ request()->routeIs('discover') || request()->routeIs('agency.show')
                                ? 'bg-white text-[#e76f51] shadow-sm'
                                : 'bg-[#f4f7f6] text-[#607985] group-hover:bg-white group-hover:text-[#173042] group-hover:shadow-sm' }}">

                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="m15.5 8.5-2.2 4.8-4.8 2.2 2.2-4.8 4.8-2.2Z"/></svg>
                        </span>

                        <span class="flex-1 text-[13px] font-semibold">
                            {{ __('messages.agency_directory') }}
                        </span>

                        @if (request()->routeIs('discover') || request()->routeIs('agency.show'))
                            <span class="h-1.5 w-1.5 rounded-full bg-[#e76f51]"></span>
                        @endif

                    </a>


                    @endif

                    {{-- ABOUT --}}
                    <details class="group">

                        <summary
                            class="flex cursor-pointer list-none items-center gap-2.5 rounded-lg px-2.5 py-2.5 text-[#526b76] transition hover:bg-[#f7f9f8] hover:text-[#173042] [&::-webkit-details-marker]:hidden">

                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-[#f4f7f6] text-[#607985] transition group-open:bg-[#173042] group-open:text-white">

                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 11v5M12 8h.01"/></svg>

                            </span>

                            <span class="flex-1 text-[13px] font-semibold">
                                {{ __('messages.about') }}
                            </span>

                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-3 w-3 text-[#9aabad] transition-transform duration-200 group-open:rotate-180" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>

                        </summary>


                        <div class="ml-10 mt-0.5 space-y-0.5 px-5 pl-2.5">

                            <a
                                href="{{ route('how-it-works') }}"
                                class="flex items-center gap-2 rounded-md px-2.5 py-2 text-xs text-[#607985] transition hover:bg-[#f1f6f4] hover:text-[#173042]">

                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-3.5 w-3.5" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M9.8 9a2.3 2.3 0 1 1 3.8 1.7c-1 .8-1.6 1.2-1.6 2.3M12 16h.01"/></svg>

                                <span>{{ __('messages.how_it_works') }}</span>

                            </a>

                            <a
                                href="{{ route('for-agencies') }}"
                                class="flex items-center gap-2 rounded-md px-2.5 py-2 text-xs text-[#607985] transition hover:bg-[#f1f6f4] hover:text-[#173042]">

                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-3.5 w-3.5" aria-hidden="true"><path d="M4 20V6l8-3 8 3v14M8 20v-4h8v4M8 9h2M14 9h2M8 12h2M14 12h2"/></svg>

                                <span>{{ __('messages.for_agencies') }}</span>

                            </a>

                        </div>

                    </details>


                    {{-- CONTACT --}}
                    <details class="group">

                        <summary
                            class="flex cursor-pointer list-none items-center gap-2.5 rounded-lg px-2.5 py-2.5 text-[#526b76] transition hover:bg-[#f7f9f8] hover:text-[#173042] [&::-webkit-details-marker]:hidden">

                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-[#f4f7f6] text-[#607985] transition group-open:bg-[#173042] group-open:text-white">

                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4" aria-hidden="true"><path d="M20 11.5a7.5 7.5 0 0 1-8 7.5 8.8 8.8 0 0 1-3.2-.6L4 20l1.5-3.7A7.4 7.4 0 0 1 4 11.5 7.5 7.5 0 0 1 12 4a7.5 7.5 0 0 1 8 7.5Z"/></svg>

                            </span>

                            <span class="flex-1 text-[13px] font-semibold">
                                {{ __('messages.contact') }}
                            </span>

                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-3 w-3 text-[#9aabad] transition-transform duration-200 group-open:rotate-180" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>

                        </summary>


                        <div class="ml-10 mt-0.5 space-y-0.5 px-5 pl-2.5">

                            <a
                                href="{{ route('email-us', ['lang' => app()->getLocale()]) }}"
                                class="flex items-center gap-2 rounded-md px-2.5 py-2 text-xs text-[#607985] transition hover:bg-[#f1f6f4] hover:text-[#173042]">

                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-3.5 w-3.5" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>

                                <span>{{ __('messages.email_us') }}</span>

                            </a>

                            <a
                                href="{{ route('agency-resources', ['lang' => app()->getLocale()]) }}"
                                class="flex items-center gap-2 rounded-md px-2.5 py-2 text-xs text-[#607985] transition hover:bg-[#f1f6f4] hover:text-[#173042]">

                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-3.5 w-3.5" aria-hidden="true"><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H12v17H6.5A2.5 2.5 0 0 0 4 22V5.5ZM20 5.5A2.5 2.5 0 0 0 17.5 3H12v17h5.5A2.5 2.5 0 0 1 20 22V5.5Z"/></svg>

                                <span>{{ __('messages.agency_resources') }}</span>

                            </a>

                        </div>

                    </details>

                </div>
                @endguest


                {{-- =================================================
                     ACCOUNT
                ================================================== --}}
                <div class="mt-5 border-t border-[#e7eceb] pt-4">

                    <div class="mb-2 px-2.5">
                        <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#9aabad]">
                            {{ __('messages.account') }}
                        </p>
                    </div>

                    <a
                        href="{{ auth()->check() ? route('settings', ['lang' => app()->getLocale()]) : route('login', ['lang' => app()->getLocale()]) }}"
                        data-loading-link
                        class="group flex items-center gap-2.5 rounded-lg px-2.5 py-2.5 text-[#526b76] transition hover:bg-[#f7f9f8] hover:text-[#173042]">

                        <span
                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#f4f7f6] text-[#607985] transition group-hover:bg-white group-hover:text-[#173042] group-hover:shadow-sm">

                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4" aria-hidden="true"><path d="M10 5H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h5M13 8l4 4-4 4M8 12h9"/></svg>

                        </span>

                        <span class="text-[13px] font-semibold">
                            {{ auth()->check() ? __('messages.settings') : __('messages.login') }}
                        </span>

                    </a>

                </div>


                {{-- =================================================
                     LANGUAGE
                ================================================== --}}
                <div class="mt-4 border-t border-[#e7eceb] pt-4">

                    <div class="mb-2 px-2.5">
                        <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#9aabad]">
                            {{ __('messages.language') }}
                        </p>
                    </div>


                    <div class="grid grid-cols-2 gap-2 p-3">

                        <a
                            href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}"
                            data-lang-button
                            data-lang="en"
                            class="flex items-center justify-center gap-2 rounded-lg border px-3 py-2.5 transition
                            {{ request('lang', 'en') === 'en'
                                ? 'border-[#173042] bg-[#173042] text-white shadow-sm'
                                : 'border-[#dbe3e5] bg-white text-[#607985] hover:border-[#173042] hover:text-[#173042]' }}">

                            <span class="fi fi-gb rounded-sm"></span>

                            <span class="text-xs font-semibold">
                                {{ __('messages.english') }}
                            </span>

                        </a>


                        <a
                            href="{{ request()->fullUrlWithQuery(['lang' => 'fr']) }}"
                            data-lang-button
                            data-lang="fr"
                            class="flex items-center justify-center gap-2 rounded-lg border px-3 py-2.5 transition
                            {{ request('lang') === 'fr'
                                ? 'border-[#173042] bg-[#173042] text-white shadow-sm'
                                : 'border-[#dbe3e5] bg-white text-[#607985] hover:border-[#173042] hover:text-[#173042]' }}">

                            <span class="fi fi-fr rounded-sm"></span>

                            <span class="text-xs font-semibold">
                                {{ __('messages.french') }}
                            </span>

                        </a>

                    </div>

                </div>

            </div>


              @guest
              {{-- =================================================
                  BOTTOM CTA
              ================================================== --}}
            <div
                class="border-t border-[#e7eceb] bg-[#fbfcfb] p-4">

                <div class="mb-3 flex items-center gap-2.5 py-1">

                    <span
                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-[#fff1ed] text-[#e76f51]">

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4" aria-hidden="true"><path d="M4 20V6l8-3 8 3v14M8 20v-4h8v4M8 9h2M14 9h2M8 12h2M14 12h2"/></svg>

                    </span>

                    <div>

                        <p class="text-xs font-bold text-[#173042]">
                            {{ __('messages.are_you_an_agency') }}
                        </p>

                        <p class="mt-0.5 text-[10px] text-[#8a9ba0]">
                            {{ __('messages.join_travelconnect') }}
                        </p>

                    </div>

                </div>


                <a
                    href="{{ route('register', ['lang' => app()->getLocale()]) }}"
                    class="flex w-full items-center justify-center gap-2 rounded-lg bg-[#e76f51] px-3 py-2.5 text-xs font-bold text-white shadow-sm transition hover:bg-[#d95f42] hover:shadow-md">

                    <span>{{ __('messages.register_your_agency') }}</span>

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-3.5 w-3.5" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>

                </a>

            </div>
            @else
            <div class="border-t border-[#e7eceb] p-4"><form action="{{ route('logout') }}" method="POST">@csrf<button type="submit" class="flex w-full items-center justify-center gap-2 rounded-lg border border-[#dbe3e5] px-3 py-2.5 text-xs font-bold text-[#607985] hover:border-[#e76f51] hover:text-[#e76f51]"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4" aria-hidden="true"><path d="M10 5H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h5M13 8l4 4-4 4M8 12h9"/></svg>{{ __('messages.logout') }}</button></form></div>
            @endguest

        </div>

    </aside>

</header>
