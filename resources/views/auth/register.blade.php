<x-auth-layout title="Create agency account | TravelConnect">
    <main class="grid min-h-screen lg:grid-cols-2">
        <section class="relative hidden overflow-hidden bg-[#173042] lg:block">
            <img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&w=1400&q=85" alt="Travel agency destination" class="absolute inset-0 h-full w-full object-cover opacity-60">
            <div class="absolute inset-0 bg-[linear-gradient(145deg,rgba(16,39,54,.95),rgba(23,48,66,.35))]"></div>
            <div class="relative flex h-full flex-col justify-between p-12 text-white xl:p-16">
                <a href="{{ route('home') }}" class="flex items-center gap-3 text-lg font-semibold">
                    <span class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-full bg-white shadow-sm">
                        <img src="{{ asset('images/logo.png') }}" alt="TravelConnect logo" class="h-full w-full object-contain">
                    </span>
                    Travel<span class="font-normal text-[#f6c9bb]">Connect</span>
                </a>
                <div class="max-w-sm">
                    <p class="text-xs font-bold uppercase tracking-[.2em] text-[#f6c9bb]">For travel agencies</p>
                    <h1 class="mt-5 font-serif text-5xl leading-tight">Grow your business with a stronger travel presence.</h1>
                    <p class="mt-6 text-base leading-7 text-white/70">Showcase your services, manage inquiries, and connect with travelers who are ready to book.</p>
                </div>
                <p class="text-sm text-white/50">Built for agencies that want to grow.</p>
            </div>
        </section>

        <section class="flex min-h-screen items-center justify-center px-6 py-12 sm:px-10">
            <div class="w-full max-w-md">
            <div class="mb-10 flex items-center justify-between lg:hidden">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 text-lg font-semibold">
                        <span class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-full bg-white shadow-sm">
                            <img src="{{ asset('images/logo.png') }}" alt="TravelConnect logo" class="h-full w-full object-contain">
                        </span>
                        Travel<span class="font-normal text-[#e76f51]">Connect</span>
                    </a>
                    <a href="{{ route('home') }}" class="text-sm font-semibold text-[#607985]">Home</a>
                </div>

                <div>
                    <div class="border-b border-[#dbe3e5] pb-7">
                        <p class="text-xs font-bold uppercase tracking-[.2em] text-[#e76f51]">Create agency account</p>
                        <h2 class="mt-3 font-serif text-4xl leading-tight tracking-tight">Join TravelConnect</h2>
                        <p class="mt-4 text-sm leading-6 text-[#607985]">Build your agency profile, manage travel offers, and receive qualified inquiries from travelers.</p>
                    </div>

                    @if ($errors->any())
                        <div class="mt-5 flex items-center gap-3 rounded-xl border border-[#fda29b] bg-[#fef3f2] px-4 py-3 text-sm font-semibold text-[#b42318]" role="alert"><span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-[#f04438] text-xs text-white" aria-hidden="true">!</span><span>{{ $errors->first() }}</span></div>
                    @endif

                    <form action="{{ route('register.agency.store') }}" method="POST" class="mt-8 grid gap-5">
                        @csrf

                        <label class="grid gap-2 text-sm font-semibold" for="agency_name">
                            Agency name
                            <span class="relative">
                                <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-[#e76f51]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <path d="M4 20V8l8-4 8 4v12"/>
                                    <path d="M9 20v-6h6v6M9 10h6"/>
                                </svg>
                                <input id="agency_name" type="text" name="agency_name" autocomplete="organization" required placeholder="Your agency name" class="w-full rounded-xl border border-[#d7e0e1] bg-white py-3 pl-12 pr-4 font-normal text-[#173042] outline-none transition placeholder:text-[#9aadb2] focus:border-[#e76f51] focus:ring-2 focus:ring-[#e76f51]/15">
                            </span>
                        </label>

                        <label class="grid gap-2 text-sm font-semibold" for="name">
                            Contact person
                            <span class="relative">
                                <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-[#e76f51]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <circle cx="12" cy="8" r="3"/>
                                    <path d="M5 20c.7-3.2 3-5 7-5s6.3 1.8 7 5"/>
                                </svg>
                                <input id="name" type="text" name="name" autocomplete="name" required placeholder="Full name" class="w-full rounded-xl border border-[#d7e0e1] bg-white py-3 pl-12 pr-4 font-normal text-[#173042] outline-none transition placeholder:text-[#9aadb2] focus:border-[#e76f51] focus:ring-2 focus:ring-[#e76f51]/15">
                            </span>
                        </label>

                        <label class="grid gap-2 text-sm font-semibold" for="email">
                            Business email
                            <span class="relative">
                                <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-[#e76f51]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <rect x="3" y="5" width="18" height="14" rx="2"/>
                                    <path d="m3 7 9 6 9-6"/>
                                </svg>
                                <input id="email" type="email" name="email" autocomplete="email" required placeholder="hello@agency.com" class="w-full rounded-xl border border-[#d7e0e1] bg-white py-3 pl-12 pr-4 font-normal text-[#173042] outline-none transition placeholder:text-[#9aadb2] focus:border-[#e76f51] focus:ring-2 focus:ring-[#e76f51]/15">
                            </span>
                        </label>

                        <label class="grid gap-2 text-sm font-semibold" for="password">
                            Password
                            <span class="relative">
                                <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-[#e76f51]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <rect x="4" y="10" width="16" height="10" rx="2"/>
                                    <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                                </svg>
                                <input id="password" type="password" name="password" autocomplete="new-password" minlength="6" required placeholder="Create a password" class="w-full rounded-xl border border-[#d7e0e1] bg-white py-3 pl-12 pr-4 font-normal text-[#173042] outline-none transition placeholder:text-[#9aadb2] focus:border-[#e76f51] focus:ring-2 focus:ring-[#e76f51]/15">
                            </span>
                        </label>

                        <label class="grid gap-2 text-sm font-semibold" for="password_confirmation">
                            Confirm password
                            <span class="relative">
                                <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-[#e76f51]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <path d="m5 12 4 4L19 6"/>
                                </svg>
                                <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" required placeholder="Repeat your password" class="w-full rounded-xl border border-[#d7e0e1] bg-white py-3 pl-12 pr-4 font-normal text-[#173042] outline-none transition placeholder:text-[#9aadb2] focus:border-[#e76f51] focus:ring-2 focus:ring-[#e76f51]/15">
                            </span>
                        </label>

                        <label class="flex items-start gap-3 text-sm leading-6 text-[#607985]">
                            <input type="checkbox" name="terms" required class="mt-1 h-4 w-4 rounded border-[#d7e0e1] accent-[#e76f51]">
                            <span>I agree to the <a href="#" class="font-semibold text-[#e76f51] hover:text-[#b94d35]">Terms of use</a> and <a href="#" class="font-semibold text-[#e76f51] hover:text-[#b94d35]">Privacy policy</a>.</span>
                        </label>

                        <button type="submit" data-loading-submit class="flex items-center justify-center gap-2 rounded-xl bg-[#e76f51] px-5 py-3.5 text-sm font-bold text-white shadow-sm transition hover:bg-[#d95f42]">
                            <span data-submit-label>Create agency account</span>
                            <span data-submit-spinner class="hidden h-4 w-4 animate-spin rounded-full border-2 border-white/40 border-t-white" aria-hidden="true"></span>
                        </button>
                    </form>

                    <p class="mt-8 text-center text-sm text-[#607985]">
                        Already have an agency account?
                        <a href="{{ route('login') }}" class="font-semibold text-[#e76f51] hover:text-[#b94d35]">Log in</a>
                    </p>
                </div>
            </div>
        </section>
    </main>
</x-auth-layout>

