<x-auth-layout title="{{ __('messages.verify_your_email') }} | TravelConnect">
    <main class="flex min-h-screen items-center justify-center px-6 py-12">
        <section class="w-full max-w-md">
            <div class="border-b border-[#dbe3e5] pb-7">
                <p class="text-xs font-bold uppercase tracking-[.2em] text-[#e76f51]">{{ __('messages.account_recovery') }}</p>
                <h1 class="mt-3 font-serif text-4xl leading-tight tracking-tight">{{ __('messages.enter_your_verification_code') }}</h1>
                <p class="mt-4 text-sm leading-6 text-[#607985]">{{ __('messages.we_sent_code_to_email') }}</p>
            </div>

            @if ($errors->any())
                <div class="mt-5 rounded-xl border border-[#fda29b] bg-[#fef3f2] px-4 py-3 text-sm font-semibold text-[#b42318]" role="alert">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('password.code.verify') }}" method="POST" class="mt-8 grid gap-5">
                @csrf
                <label class="grid gap-2 text-sm font-semibold" for="email">{{ __('messages.email_address') }}
                    <span class="relative"><svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-[#e76f51]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg><input id="email" type="email" name="email" value="{{ old('email', $email) }}" required autocomplete="email" class="w-full rounded-xl border border-[#d7e0e1] bg-white py-3 pl-12 pr-4 font-normal text-[#173042] outline-none focus:border-[#e76f51] focus:ring-2 focus:ring-[#e76f51]/15"></span>
                </label>
                <label class="grid gap-2 text-sm font-semibold" for="code">{{ __('messages.six_digit_code') }}
                    <span class="relative"><svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-[#e76f51]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 7h8M8 11h2M14 11h2M8 15h2M14 15h2M8 19h8"/></svg><input id="code" type="text" name="code" inputmode="numeric" pattern="[0-9]{6}" maxlength="6" autocomplete="one-time-code" required placeholder="000000" class="w-full rounded-xl border border-[#d7e0e1] bg-white py-3 pl-12 pr-4 text-center text-2xl font-bold tracking-[.35em] text-[#173042] outline-none focus:border-[#e76f51] focus:ring-2 focus:ring-[#e76f51]/15"></span>
                </label>
                <p class="text-xs leading-5 text-[#607985]">{{ __('messages.code_expires_in_10_minutes') }}</p>
                <button type="submit" data-loading-submit class="flex items-center justify-center gap-2 rounded-xl bg-[#e76f51] px-5 py-3.5 text-sm font-bold text-white shadow-sm transition hover:bg-[#d95f42]"><span data-submit-label>{{ __('messages.verify_code') }}</span><span data-submit-spinner class="hidden"></span></button>
            </form>

            <a href="{{ route('password.request', ['email' => $email]) }}" class="mt-6 flex items-center justify-center gap-2 text-sm font-semibold text-[#607985] transition hover:text-[#173042]">{{ __('messages.request_a_new_code') }}</a>
        </section>
    </main>
</x-auth-layout>
