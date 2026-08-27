<x-auth-layout title="Dashboard | TravelConnect">
    <main class="min-h-screen bg-[#f1f6f4] px-6 py-10 sm:px-10 lg:px-16">
        <div class="mx-auto max-w-6xl">
            <header class="flex items-center justify-between border-b border-[#dbe3e5] pb-6">
                <a href="{{ route('home') }}" class="flex items-center gap-3 text-lg font-semibold"><span class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-full bg-white shadow-sm"><img src="{{ asset('images/logo.png') }}" alt="TravelConnect logo" class="h-full w-full object-contain"></span>Travel<span class="font-normal text-[#e76f51]">Connect</span></a>
                <form action="{{ route('logout') }}" method="POST">@csrf<button type="submit" class="text-sm font-semibold text-[#607985] transition hover:text-[#e76f51]">Log out</button></form>
            </header>
            <section class="mt-12">
                @if (auth()->user()->isTraveler())
                    <p class="text-xs font-bold uppercase tracking-[.2em] text-[#e76f51]">Traveler workspace</p>
                    <h1 class="mt-3 font-serif text-4xl tracking-tight text-[#173042] sm:text-5xl">Traveler dashboard</h1>
                    <p class="mt-4 max-w-2xl text-base leading-7 text-[#607985]">Welcome, {{ auth()->user()->name }}. Discover agencies, save favorites, and manage your travel inquiries.</p>
                    <div class="mt-10 grid gap-5 sm:grid-cols-3"><div class="rounded-xl border border-[#e7eceb] bg-white p-6"><p class="text-sm font-bold text-[#173042]">Saved agencies</p><p class="mt-3 text-3xl font-bold text-[#e76f51]">0</p><p class="mt-2 text-sm text-[#607985]">Agencies you want to revisit.</p></div><div class="rounded-xl border border-[#e7eceb] bg-white p-6"><p class="text-sm font-bold text-[#173042]">Open inquiries</p><p class="mt-3 text-3xl font-bold text-[#e76f51]">0</p><p class="mt-2 text-sm text-[#607985]">Conversations with agencies.</p></div><div class="rounded-xl border border-[#e7eceb] bg-white p-6"><p class="text-sm font-bold text-[#173042]">Reviews written</p><p class="mt-3 text-3xl font-bold text-[#e76f51]">0</p><p class="mt-2 text-sm text-[#607985]">Your published experiences.</p></div></div>
                @elseif (auth()->user()->isAgencyOwner())
                    <p class="text-xs font-bold uppercase tracking-[.2em] text-[#e76f51]">Agency workspace</p>
                    <h1 class="mt-3 font-serif text-4xl tracking-tight text-[#173042] sm:text-5xl">Agency dashboard</h1>
                    <p class="mt-4 max-w-2xl text-base leading-7 text-[#607985]">Welcome, {{ auth()->user()->name }}. Complete your business profile, verification, and inquiry management.</p>
                    <div class="mt-10 grid gap-5 sm:grid-cols-3"><div class="rounded-xl border border-[#e7eceb] bg-white p-6"><p class="text-sm font-bold text-[#173042]">Profile status</p><p class="mt-3 text-xl font-bold text-[#e76f51]">Draft</p><p class="mt-2 text-sm text-[#607985]">Complete your agency details.</p></div><div class="rounded-xl border border-[#e7eceb] bg-white p-6"><p class="text-sm font-bold text-[#173042]">Verification</p><p class="mt-3 text-xl font-bold text-[#e76f51]">Pending</p><p class="mt-2 text-sm text-[#607985]">Submit documents for review.</p></div><div class="rounded-xl border border-[#e7eceb] bg-white p-6"><p class="text-sm font-bold text-[#173042]">New inquiries</p><p class="mt-3 text-3xl font-bold text-[#e76f51]">0</p><p class="mt-2 text-sm text-[#607985]">Customer requests to manage.</p></div></div>
                @else
                    <p class="text-xs font-bold uppercase tracking-[.2em] text-[#e76f51]">TravelConnect</p><h1 class="mt-3 font-serif text-4xl tracking-tight text-[#173042] sm:text-5xl">Account dashboard</h1><p class="mt-4 text-base leading-7 text-[#607985]">Welcome, {{ auth()->user()->name }}. Your authenticated session is active.</p>
                @endif
            </section>
        </div>
    </main>
</x-auth-layout>
