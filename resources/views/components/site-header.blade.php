@props(['overlay' => false])

<head>
    {{-- Flag Icons --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.3.2/css/flag-icons.min.css">

    {{-- Font Awesome --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
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
        <a href="{{ route('home') }}"
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

            {{-- HOME --}}
            <a href="{{ route('home') }}"
                class="group relative flex items-center gap-2 py-2 transition hover:text-[#e76f51]
                {{ request()->routeIs('home') ? 'text-[#e76f51]' : '' }}">

                <span>{{ __('navigation.home') }}</span>

                <span
                    class="absolute inset-x-0 bottom-0 h-0.5 origin-left bg-[#e76f51] transition-transform
                    {{ request()->routeIs('home')
                        ? 'scale-x-100'
                        : 'scale-x-0 group-hover:scale-x-100' }}">
                </span>
            </a>


            {{-- AGENCIES --}}
            <a href="{{ route('discover') }}"
                class="group relative flex items-center gap-2 py-2 transition hover:text-[#e76f51]
                {{ request()->routeIs('discover') || request()->routeIs('agency.show')
                    ? 'text-[#e76f51]'
                    : '' }}">

                <span>{{ __('navigation.agencies') }}</span>

                <span
                    class="absolute inset-x-0 bottom-0 h-0.5 origin-left bg-[#e76f51] transition-transform
                    {{ request()->routeIs('discover') || request()->routeIs('agency.show')
                        ? 'scale-x-100'
                        : 'scale-x-0 group-hover:scale-x-100' }}">
                </span>
            </a>


            {{-- ABOUT --}}
            <div class="group relative">

                <button
                    type="button"
                    class="flex items-center gap-2 py-2 transition hover:text-[#e76f51]">

                    <span>{{ __('navigation.about') }}</span>

                    <i
                        class="fa-solid fa-chevron-down text-[9px] transition-transform duration-200 group-hover:rotate-180"
                        aria-hidden="true">
                    </i>
                </button>

                <div
                    class="invisible absolute left-1/2 top-full z-40 w-52 -translate-x-1/2 translate-y-2 rounded-xl border border-[#dbe3e5] bg-white p-2 opacity-0 shadow-[0_14px_30px_rgba(23,48,66,.12)] transition-all duration-200 group-hover:visible group-hover:translate-y-0 group-hover:opacity-100 group-focus-within:visible group-focus-within:translate-y-0 group-focus-within:opacity-100">

                    <a href="{{ route('how-it-works') }}"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-[#607985] transition hover:bg-[#f1f6f4] hover:text-[#173042]">

                        <!--<span
                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#f1f6f4] text-[#173042]">
                            <i class="fa-regular fa-circle-question text-sm"></i>
                        </span>-->

                        <span>{{ __('navigation.how_it_works') }}</span>
                    </a>

                    <a href="{{ route('for-agencies') }}"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-[#607985] transition hover:bg-[#f1f6f4] hover:text-[#173042]">

                        <!--<span
                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#f1f6f4] text-[#173042]">
                            <i class="fa-solid fa-building text-sm"></i>
                        </span>-->

                        <span>{{ __('navigation.for_agencies') }}</span>
                    </a>
                </div>
            </div>


            {{-- CONTACT --}}
            <div class="group relative">

                <button
                    type="button"
                    class="flex items-center gap-2 py-2 transition hover:text-[#e76f51]">

                    <span>{{ __('navigation.contact') }}</span>

                    <i
                        class="fa-solid fa-chevron-down text-[9px] transition-transform duration-200 group-hover:rotate-180"
                        aria-hidden="true">
                    </i>
                </button>

                <div
                    class="invisible absolute left-1/2 top-full z-40 w-52 -translate-x-1/2 translate-y-2 rounded-xl border border-[#dbe3e5] bg-white p-2 opacity-0 shadow-[0_14px_30px_rgba(23,48,66,.12)] transition-all duration-200 group-hover:visible group-hover:translate-y-0 group-hover:opacity-100 group-focus-within:visible group-focus-within:translate-y-0 group-focus-within:opacity-100">

                    <a href="mailto:hello@travelconnect.test"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-[#607985] transition hover:bg-[#f1f6f4] hover:text-[#173042]">

                        <!--<span
                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#f1f6f4] text-[#173042]">
                            <i class="fa-regular fa-envelope text-sm"></i>
                        </span>-->

                        <span>{{ __('navigation.email_us') }}</span>
                    </a>

                    <a href="{{ route('for-agencies') }}#resources"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-[#607985] transition hover:bg-[#f1f6f4] hover:text-[#173042]">

                        <!--<span
                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#f1f6f4] text-[#173042]">
                            <i class="fa-solid fa-book-open text-sm"></i>
                        </span>-->

                        <span>{{ __('navigation.agency_resources') }}</span>
                    </a>
                </div>
            </div>

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


            {{-- LOGIN --}}
            <a
                href="{{ route('login', ['lang' => app()->getLocale()]) }}"
                data-loading-link
                class="hidden px-3 py-2 text-sm font-medium text-[#607985] transition hover:text-[#173042] sm:block">
                {{ __('navigation.login') }}
            </a>


            {{-- REGISTER --}}
            <a
                href="{{ route('register', ['lang' => app()->getLocale()]) }}"
                class="hidden rounded-full bg-[#173042] px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#26495d] sm:inline-flex">
                <span>{{ __('navigation.create_account') }}</span>
            </a>


            {{-- MOBILE MENU BUTTON --}}
            <button
                type="button"
                data-menu-toggle
                aria-expanded="false"
                aria-controls="mobile-menu"
                class="group flex h-9 w-9 shrink-0 items-center justify-center rounded-lg border border-[#dbe3e5] bg-white text-[#173042] shadow-sm transition hover:border-[#173042] hover:bg-[#f8faf9] sm:h-10 sm:w-10 md:hidden">

<span class="sr-only">{{ __('navigation.open_navigation') }}</span>

                <i
                    class="fa-solid fa-bars text-sm transition-transform duration-200 group-hover:scale-110 sm:text-base"
                    aria-hidden="true">
                </i>
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
                    href="{{ route('home') }}"
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

                    <i
                        class="fa-solid fa-xmark text-base transition-transform duration-200 group-hover:rotate-90"
                        aria-hidden="true">
                    </i>
                </button>

            </div>


            {{-- =================================================
                 MOBILE CONTENT
            ================================================== --}}
            <div class="flex-1 px-4 py-4">


                {{-- NAVIGATION LABEL --}}
                <div class="mb-2 px-2.5">
                    <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#9aabad]">
                        {{ __('navigation.navigation') }}
                    </p>
                </div>


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

                            <i class="fa-solid fa-house text-xs" aria-hidden="true"></i>
                        </span>

                        <span class="flex-1 text-[13px] font-semibold">
                            {{ __('navigation.home') }}
                        </span>

                        @if (request()->routeIs('home'))
                            <span class="h-1.5 w-1.5 rounded-full bg-[#e76f51]"></span>
                        @endif

                    </a>


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

                            <i class="fa-solid fa-compass text-xs" aria-hidden="true"></i>
                        </span>

                        <span class="flex-1 text-[13px] font-semibold">
                            {{ __('navigation.agency_directory') }}
                        </span>

                        @if (request()->routeIs('discover') || request()->routeIs('agency.show'))
                            <span class="h-1.5 w-1.5 rounded-full bg-[#e76f51]"></span>
                        @endif

                    </a>


                    {{-- ABOUT --}}
                    <details class="group">

                        <summary
                            class="flex cursor-pointer list-none items-center gap-2.5 rounded-lg px-2.5 py-2.5 text-[#526b76] transition hover:bg-[#f7f9f8] hover:text-[#173042] [&::-webkit-details-marker]:hidden">

                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-[#f4f7f6] text-[#607985] transition group-open:bg-[#173042] group-open:text-white">

                                <i class="fa-solid fa-circle-info text-xs" aria-hidden="true"></i>

                            </span>

                            <span class="flex-1 text-[13px] font-semibold">
                                {{ __('navigation.about') }}
                            </span>

                            <i
                                class="fa-solid fa-chevron-down text-[9px] text-[#9aabad] transition-transform duration-200 group-open:rotate-180"
                                aria-hidden="true">
                            </i>

                        </summary>


                        <div class="ml-10 mt-0.5 space-y-0.5 px-5 pl-2.5">

                            <a
                                href="{{ route('how-it-works') }}"
                                class="flex items-center gap-2 rounded-md px-2.5 py-2 text-xs text-[#607985] transition hover:bg-[#f1f6f4] hover:text-[#173042]">

                                <i class="fa-regular fa-circle-question w-3 text-center"></i>

                                <span>{{ __('navigation.how_it_works') }}</span>

                            </a>

                            <a
                                href="{{ route('for-agencies') }}"
                                class="flex items-center gap-2 rounded-md px-2.5 py-2 text-xs text-[#607985] transition hover:bg-[#f1f6f4] hover:text-[#173042]">

                                <i class="fa-solid fa-building w-3 text-center"></i>

                                <span>{{ __('navigation.for_agencies') }}</span>

                            </a>

                        </div>

                    </details>


                    {{-- CONTACT --}}
                    <details class="group">

                        <summary
                            class="flex cursor-pointer list-none items-center gap-2.5 rounded-lg px-2.5 py-2.5 text-[#526b76] transition hover:bg-[#f7f9f8] hover:text-[#173042] [&::-webkit-details-marker]:hidden">

                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-[#f4f7f6] text-[#607985] transition group-open:bg-[#173042] group-open:text-white">

                                <i class="fa-regular fa-comments text-xs" aria-hidden="true"></i>

                            </span>

                            <span class="flex-1 text-[13px] font-semibold">
                                {{ __('navigation.contact') }}
                            </span>

                            <i
                                class="fa-solid fa-chevron-down text-[9px] text-[#9aabad] transition-transform duration-200 group-open:rotate-180"
                                aria-hidden="true">
                            </i>

                        </summary>


                        <div class="ml-10 mt-0.5 space-y-0.5 px-5 pl-2.5">

                            <a
                                href="mailto:hello@travelconnect.test"
                                class="flex items-center gap-2 rounded-md px-2.5 py-2 text-xs text-[#607985] transition hover:bg-[#f1f6f4] hover:text-[#173042]">

                                <i class="fa-regular fa-envelope w-3 text-center"></i>

                                <span>{{ __('navigation.email_us') }}</span>

                            </a>

                            <a
                                href="{{ route('for-agencies') }}#resources"
                                class="flex items-center gap-2 rounded-md px-2.5 py-2 text-xs text-[#607985] transition hover:bg-[#f1f6f4] hover:text-[#173042]">

                                <i class="fa-solid fa-book-open w-3 text-center"></i>

                                <span>{{ __('navigation.agency_resources') }}</span>

                            </a>

                        </div>

                    </details>

                </div>


                {{-- =================================================
                     ACCOUNT
                ================================================== --}}
                <div class="mt-5 border-t border-[#e7eceb] pt-4">

                    <div class="mb-2 px-2.5">
                        <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#9aabad]">
                            {{ __('navigation.account') }}
                        </p>
                    </div>

                    <a
                        href="{{ route('login', ['lang' => app()->getLocale()]) }}"
                        data-loading-link
                        class="group flex items-center gap-2.5 rounded-lg px-2.5 py-2.5 text-[#526b76] transition hover:bg-[#f7f9f8] hover:text-[#173042]">

                        <span
                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#f4f7f6] text-[#607985] transition group-hover:bg-white group-hover:text-[#173042] group-hover:shadow-sm">

                            <i class="fa-solid fa-arrow-right-to-bracket text-xs"></i>

                        </span>

                        <span class="text-[13px] font-semibold">
                            {{ __('navigation.login') }}
                        </span>

                    </a>

                </div>


                {{-- =================================================
                     LANGUAGE
                ================================================== --}}
                <div class="mt-4 border-t border-[#e7eceb] pt-4">

                    <div class="mb-2 px-2.5">
                        <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#9aabad]">
                            {{ __('navigation.language') }}
                        </p>
                    </div>


                    <div class="grid grid-cols-2 gap-2 p-3">

                        <a
                            href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}"
                            class="flex items-center justify-center gap-2 rounded-lg border px-3 py-2.5 transition
                            {{ request('lang', 'en') === 'en'
                                ? 'border-[#173042] bg-[#173042] text-white shadow-sm'
                                : 'border-[#dbe3e5] bg-white text-[#607985] hover:border-[#173042] hover:text-[#173042]' }}">

                            <span class="fi fi-gb rounded-sm"></span>

                            <span class="text-xs font-semibold">
                                {{ __('navigation.english') }}
                            </span>

                        </a>


                        <a
                            href="{{ request()->fullUrlWithQuery(['lang' => 'fr']) }}"
                            class="flex items-center justify-center gap-2 rounded-lg border px-3 py-2.5 transition
                            {{ request('lang') === 'fr'
                                ? 'border-[#173042] bg-[#173042] text-white shadow-sm'
                                : 'border-[#dbe3e5] bg-white text-[#607985] hover:border-[#173042] hover:text-[#173042]' }}">

                            <span class="fi fi-fr rounded-sm"></span>

                            <span class="text-xs font-semibold">
                                {{ __('navigation.french') }}
                            </span>

                        </a>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 BOTTOM CTA
            ================================================== --}}
            <div
                class="border-t border-[#e7eceb] bg-[#fbfcfb] p-4">

                <div class="mb-3 flex items-center gap-2.5 py-1">

                    <span
                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-[#fff1ed] text-[#e76f51]">

                        <i class="fa-solid fa-building text-xs"></i>

                    </span>

                    <div>

                        <p class="text-xs font-bold text-[#173042]">
                            {{ __('navigation.are_you_an_agency') }}
                        </p>

                        <p class="mt-0.5 text-[10px] text-[#8a9ba0]">
                            {{ __('navigation.join_travelconnect') }}
                        </p>

                    </div>

                </div>


                <a
                    href="{{ route('register', ['lang' => app()->getLocale()]) }}"
                    class="flex w-full items-center justify-center gap-2 rounded-lg bg-[#e76f51] px-3 py-2.5 text-xs font-bold text-white shadow-sm transition hover:bg-[#d95f42] hover:shadow-md">

                    <span>{{ __('navigation.register_your_agency') }}</span>

                    <i class="fa-solid fa-arrow-right text-[10px]"></i>

                </a>

            </div>

        </div>

    </aside>

</header>
