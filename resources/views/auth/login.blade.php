<x-auth-layout title="Log in | TravelConnect">
    <main class="grid min-h-screen lg:grid-cols-2">
        <section class="relative hidden overflow-hidden bg-[#173042] lg:block">
            <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1400&q=85" alt="Sunlit coastal landscape" class="absolute inset-0 h-full w-full object-cover opacity-60">
            <div class="absolute inset-0 bg-[linear-gradient(145deg,rgba(16,39,54,.95),rgba(23,48,66,.35))]"></div>
            <div class="relative flex h-full flex-col justify-between p-12 text-white xl:p-16">
                <a href="{{ route('home') }}" class="flex items-center gap-3 text-lg font-semibold"><span class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-full bg-white"><img src="{{ asset('images/logo.png') }}" alt="TravelConnect logo" class="h-full w-full object-contain"></span>Travel<span class="font-normal text-[#f6c9bb]">Connect</span></a>
                <div class="max-w-sm"><p class="text-xs font-bold uppercase tracking-[.2em] text-[#f6c9bb]">Your journeys, together</p><h1 class="mt-5 font-serif text-5xl leading-tight">Welcome back.</h1></div>
                <p class="text-sm text-white/50">Trusted journeys begin here.</p>
            </div>
        </section>
        <section class="flex min-h-screen items-center justify-center px-6 py-12 sm:px-10">
            <div class="w-full max-w-md">
                <div class="mb-10 flex items-center justify-between lg:hidden"><a href="{{ route('home') }}" class="flex items-center gap-3 text-lg font-semibold"><span class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-full bg-white shadow-sm"><img src="{{ asset('images/logo.png') }}" alt="TravelConnect logo" class="h-full w-full object-contain"></span>Travel<span class="font-normal text-[#e76f51]">Connect</span></a><a href="{{ route('home') }}" class="text-sm font-semibold text-[#607985]">Home</a></div>
                <div class="border-b border-[#dbe3e5] pb-7"><p class="text-xs font-bold uppercase tracking-[.2em] text-[#e76f51]">Your TravelConnect account</p><h2 class="mt-3 font-serif text-4xl leading-tight tracking-tight">Log in to TravelConnect</h2><p class="mt-4 text-sm leading-6 text-[#607985]">Continue as a traveler or manage your agency workspace.</p></div>
                    @if ($errors->any())
                        <div class="mt-5 flex items-center gap-3 rounded-xl border border-[#fda29b] bg-[#fef3f2] px-4 py-3 text-sm font-semibold text-[#b42318]" role="alert"><span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-[#f04438] text-xs text-white" aria-hidden="true">!</span><span>{{ $errors->first() }}</span></div>
                    @endif
                    <form action="{{ route('login.store') }}" method="POST" class="mt-8 grid gap-5">
                    @csrf
                    <label class="grid gap-2 text-sm font-semibold" for="email">Email address<span class="relative"><svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-[#e76f51]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg><input id="email" type="email" name="email" autocomplete="email" required placeholder="you@example.com" class="w-full rounded-xl border border-[#d7e0e1] bg-white py-3 pl-12 pr-4 font-normal outline-none transition placeholder:text-[#9aadb2] focus:border-[#e76f51] focus:ring-2 focus:ring-[#e76f51]/15"></span></label>
                    <label class="grid gap-2 text-sm font-semibold" for="password">Password<span class="relative"><svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-[#e76f51]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg><input id="password" type="password" name="password" autocomplete="current-password" required placeholder="Enter your password" class="w-full rounded-xl border border-[#d7e0e1] bg-white py-3 pl-12 pr-12 font-normal outline-none transition placeholder:text-[#9aadb2] focus:border-[#e76f51] focus:ring-2 focus:ring-[#e76f51]/15"><button type="button" data-password-toggle aria-label="Show password" class="absolute right-3 top-1/2 flex h-8 w-8 -translate-y-1/2 items-center justify-center rounded-lg text-[#78909c] hover:text-[#173042]"><svg data-password-icon viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5" aria-hidden="true"><path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"/><circle cx="12" cy="12" r="2.5"/></svg></button></span></label>
                    <div class="flex items-center justify-between gap-4 text-sm"><label class="flex items-center gap-2 font-normal text-[#607985]"><input type="checkbox" name="remember" class="h-4 w-4 rounded border-[#cbd9d8] accent-[#e76f51]">Remember me</label><a href="{{ route('password.request') }}" class="flex items-center gap-1.5 font-semibold text-[#e76f51] hover:text-[#b94d35]"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 11v5M12 8h.01"/></svg>Forgot password?</a></div>
                    <button type="submit" class="flex items-center justify-center gap-2 rounded-xl bg-[#e76f51] px-5 py-3.5 text-sm font-bold text-white shadow-sm transition hover:bg-[#d95f42]">Log in</button>
                </form>
                <div class="mt-8 flex items-center gap-4 text-xs uppercase tracking-[.15em] text-[#9aadb2]"><span class="h-px flex-1 bg-[#dbe3e5]"></span><span>New here?</span><span class="h-px flex-1 bg-[#dbe3e5]"></span></div>
                <p class="mt-5 text-center text-sm text-[#607985]"><a href="{{ route('register') }}" class="font-semibold text-[#e76f51] hover:text-[#b94d35]">Create your TravelConnect account</a></p>
            </div>
        </section>
    </main>
</x-auth-layout>
