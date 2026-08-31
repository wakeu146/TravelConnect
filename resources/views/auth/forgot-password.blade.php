<x-auth-layout title="{{ __('messages.reset_your_password') }} | TravelConnect">
    <main class="grid min-h-screen lg:grid-cols-2">
        <section class="relative hidden overflow-hidden bg-[#173042] lg:block">
            <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1400&q=85" alt="Travel planner and luggage" class="absolute inset-0 h-full w-full object-cover opacity-60">
            <div class="absolute inset-0 bg-[linear-gradient(145deg,rgba(16,39,54,.95),rgba(23,48,66,.35))]"></div>
            <div class="relative flex h-full flex-col justify-between p-12 text-white xl:p-16">
                <a href="{{ route('home', ['lang' => app()->getLocale()]) }}" class="flex items-center gap-3 text-lg font-semibold">
                    <span class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-full bg-white shadow-sm">
                        <img src="{{ asset('images/logo.png') }}" alt="TravelConnect logo" class="h-full w-full object-contain">
                    </span>
                    Travel<span class="font-normal text-[#f6c9bb]">Connect</span>
                </a>
                <div class="max-w-sm">
                    <p class="text-xs font-bold uppercase tracking-[.2em] text-[#f6c9bb]">{{ __('messages.account_recovery') }}</p>
                    <h1 class="mt-5 font-serif text-5xl leading-tight">{{ __('messages.lets_get_your_agency_back_on_track') }}</h1>
                    <p class="mt-6 text-base leading-7 text-white/70">{{ __('messages.reset_access_securely') }}</p>
                </div>
                <p class="text-sm text-white/50">{{ __('messages.we_will_help_you_get_back_on_the_road') }}</p>
            </div>
        </section>

        <section class="flex min-h-screen items-center justify-center px-6 py-12 sm:px-10">
            <div class="w-full max-w-md">
                <div class="mb-10 flex items-center justify-between lg:hidden">
                    <a href="{{ route('home', ['lang' => app()->getLocale()]) }}" class="flex items-center gap-3 text-lg font-semibold">
                        <span class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-full bg-white shadow-sm">
                            <img src="{{ asset('images/logo.png') }}" alt="TravelConnect logo" class="h-full w-full object-contain">
                        </span>
                        Travel<span class="font-normal text-[#e76f51]">Connect</span>
                    </a>
                    <a href="{{ route('home', ['lang' => app()->getLocale()]) }}" class="text-sm font-semibold text-[#607985]">{{ __('navigation.home') }}</a>
                </div>

                <div class="border-b border-[#dbe3e5] pb-7">
                    <p class="text-xs font-bold uppercase tracking-[.2em] text-[#e76f51]">{{ __('messages.account_recovery') }}</p>
                    <h1 class="mt-3 font-serif text-4xl leading-tight tracking-tight">{{ __('messages.reset_your_password') }}</h1>
                    <p class="mt-4 text-sm leading-6 text-[#607985]">{{ __('messages.enter_email_and_send_code') }}</p>
                </div>

                @if (session('status'))
                    <div class="mt-5 flex items-start gap-3 rounded-xl border border-[#b7dfd2] bg-[#effaf6] px-4 py-3 text-sm font-semibold text-[#176b57]" role="status"><span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-[#2f9e7a] text-xs text-white" aria-hidden="true">✓</span><span>{{ session('status') }}</span></div>
                @elseif ($errors->any())
                    <div class="mt-5 flex items-center gap-3 rounded-xl border border-[#fda29b] bg-[#fef3f2] px-4 py-3 text-sm font-semibold text-[#b42318]" role="alert"><span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-[#f04438] text-xs text-white" aria-hidden="true">!</span><span>{{ $errors->first() }}</span></div>
                @endif

                <form action="{{ route('password.email') }}" method="POST" class="mt-8 grid gap-5">
                    @csrf

                    <label class="grid gap-2 text-sm font-semibold" for="email">
                        {{ __('messages.email_address') }}
                        <span class="relative">
                            <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-[#e76f51]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <rect x="3" y="5" width="18" height="14" rx="2"/>
                                <path d="m3 7 9 6 9-6"/>
                            </svg>
                            <input id="email" type="email" name="email" value="{{ old('email', request('email', session('password_reset_email'))) }}" autocomplete="email" required placeholder="{{ __('messages.you_example_com') }}" class="w-full rounded-xl border border-[#d7e0e1] bg-white py-3 pl-12 pr-4 font-normal text-[#173042] outline-none transition placeholder:text-[#9aadb2] focus:border-[#e76f51] focus:ring-2 focus:ring-[#e76f51]/15">
                        </span>
                    </label>

                    <button type="submit" data-loading-submit class="flex items-center justify-center gap-2 rounded-xl bg-[#e76f51] px-5 py-3.5 text-sm font-bold text-white shadow-sm transition hover:bg-[#d95f42]">
                        <span data-submit-label>{{ __('messages.send_verification_code') }}</span>
                        <span data-submit-spinner class="hidden h-4 w-4 animate-spin rounded-full border-2 border-white/40 border-t-white" aria-hidden="true"></span>
                    </button>
                </form>

                <a href="{{ route('login', ['lang' => app()->getLocale()]) }}" class="mt-6 flex items-center justify-center gap-2 text-sm font-semibold text-[#607985] transition hover:text-[#173042]">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path d="M15 18 9 12l6-6"/>
                    </svg>
                    {{ __('messages.back_to_log_in') }}
                </a>
            </div>
        </section>
    </main>
</x-auth-layout>

