@props(['overlay' => false])
<header class="{{ $overlay ? 'absolute inset-x-0 top-0 z-20' : 'border-b border-[#e7eceb] bg-white' }}">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5 lg:px-8" aria-label="Main navigation">
        <a href="{{ route('home') }}" class="flex items-center gap-3 text-lg font-semibold tracking-tight {{ $overlay ? 'text-white' : 'text-[#173042]' }}">
            <span class="flex h-11 w-11 shrink-0 items-center justify-center overflow-hidden rounded-full bg-white shadow-sm"><img src="{{ asset('images/logo.png') }}" alt="TravelConnect logo" class="h-full w-full object-contain"></span>
            <span>Travel<span class="font-normal {{ $overlay ? 'text-[#f6c9bb]' : 'text-[#e76f51]' }}">Connect</span></span>
        </a>
        <div class="hidden items-center gap-8 text-sm font-medium md:flex {{ $overlay ? 'text-white/85' : 'text-[#607985]' }}">
            <a href="{{ route('home') }}" class="transition hover:text-[#e76f51]">Home</a>
            <a href="{{ route('discover') }}" class="transition hover:text-[#e76f51]">Agencies</a>
            <a href="{{ route('how-it-works') }}" class="transition hover:text-[#e76f51]">How it works</a>
            <a href="{{ route('for-agencies') }}" class="transition hover:text-[#e76f51]">For agencies</a>
        </div>
        <div class="flex items-center gap-3 text-sm font-semibold">
            <a href="{{ route('login') }}" data-loading-link class="hidden px-3 py-2 transition sm:block {{ $overlay ? 'text-white/90 hover:text-white' : 'text-[#607985] hover:text-[#173042]' }}">Log in</a>
            <a href="{{ route('register') }}" class="hidden rounded-full px-5 py-2.5 shadow-sm transition sm:inline-flex {{ $overlay ? 'bg-white text-[#173042] hover:bg-[#f6c9bb]' : 'bg-[#173042] text-white hover:bg-[#26495d]' }}">Create account</a>
            <button type="button" data-menu-toggle aria-expanded="false" aria-controls="mobile-menu" class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg border md:hidden {{ $overlay ? 'border-white/30 text-white' : 'border-[#dbe3e5] text-[#173042]' }}"><span class="sr-only">Open navigation</span><span class="text-xl leading-none" aria-hidden="true">&#9776;</span></button>
        </div>
    </nav>
    <div data-mobile-backdrop class="fixed inset-0 z-40 hidden bg-[#102936]/55 md:hidden"></div>
    <div id="mobile-menu" data-mobile-menu class="fixed bottom-0 right-0 top-0 z-50 hidden w-[min(88vw,360px)] border-l border-[#e7eceb] bg-white px-6 py-6 text-[#173042] shadow-2xl md:hidden">
        <div class="flex items-center justify-between border-b border-[#e7eceb] pb-5"><a href="{{ route('home') }}" class="flex items-center gap-3 text-lg font-semibold"><span class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-full bg-[#fbfaf7]"><img src="{{ asset('images/logo.png') }}" alt="TravelConnect logo" class="h-full w-full object-contain"></span><span>Travel<span class="font-normal text-[#e76f51]">Connect</span></span></a><button type="button" data-menu-close aria-label="Close navigation" class="flex h-10 w-10 items-center justify-center rounded-lg border border-[#dbe3e5] text-xl">&times;</button></div>
        <div class="mt-8 grid gap-2 text-sm font-semibold">
            <a href="{{ route('home') }}" class="rounded-lg px-3 py-3 hover:bg-[#f1f6f4]">Home</a>
            <a href="{{ route('login') }}" data-loading-link class="rounded-lg px-3 py-3 hover:bg-[#f1f6f4]">Log in</a>
            <a href="{{ route('discover') }}" class="rounded-lg px-3 py-3 hover:bg-[#f1f6f4]">Agency directory</a>
            <a href="{{ route('how-it-works') }}" class="rounded-lg px-3 py-3 hover:bg-[#f1f6f4]">How it works</a>
            <a href="{{ route('for-agencies') }}" class="rounded-lg px-3 py-3 hover:bg-[#f1f6f4]">For agencies</a>
        </div>
        <a href="{{ route('register') }}" class="mt-8 block rounded-xl bg-[#e76f51] px-4 py-3 text-center text-sm font-bold text-white transition hover:bg-[#d95f42]">Register your agency <span class="ml-2" aria-hidden="true">&rarr;</span></a>
    </div>
</header>
