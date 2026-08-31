<x-auth-layout title="{{ __('messages.dashboard') }} | TravelConnect">
    <main class="min-h-screen bg-[#f1f6f4] px-6 py-10 sm:px-10 lg:px-16">
        <div class="mx-auto max-w-6xl">
            <header class="flex items-center justify-between border-b border-[#dbe3e5] pb-6">
                <a href="{{ route('home') }}" class="flex items-center gap-3 text-lg font-semibold"><span class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-full bg-white shadow-sm"><img src="{{ asset('images/logo.png') }}" alt="TravelConnect logo" class="h-full w-full object-contain"></span>Travel<span class="font-normal text-[#e76f51]">Connect</span></a>
                <form action="{{ route('logout') }}" method="POST">@csrf<button type="submit" class="text-sm font-semibold text-[#607985] transition hover:text-[#e76f51]">{{ __('messages.logout') }}</button></form>
            </header>
            <section class="mt-12">
                @if (auth()->user()->isTraveler())
                    <p class="text-xs font-bold uppercase tracking-[.2em] text-[#e76f51]">{{ __('messages.traveler_workspace') }}</p>
                    <h1 class="mt-3 font-serif text-4xl tracking-tight text-[#173042] sm:text-5xl">{{ __('messages.traveler_dashboard') }}</h1>
                    <p class="mt-4 max-w-2xl text-base leading-7 text-[#607985]">{{ __('messages.welcome_user', ['name' => auth()->user()->name]) }}</p>
                    <div class="mt-10 grid gap-5 sm:grid-cols-3"><div class="rounded-xl border border-[#e7eceb] bg-white p-6"><p class="text-sm font-bold text-[#173042]">{{ __('messages.saved_agencies') }}</p><p class="mt-3 text-3xl font-bold text-[#e76f51]">0</p><p class="mt-2 text-sm text-[#607985]">{{ __('messages.agencies_you_want_to_revisit') }}</p></div><div class="rounded-xl border border-[#e7eceb] bg-white p-6"><p class="text-sm font-bold text-[#173042]">{{ __('messages.open_inquiries') }}</p><p class="mt-3 text-3xl font-bold text-[#e76f51]">0</p><p class="mt-2 text-sm text-[#607985]">{{ __('messages.conversations_with_agencies') }}</p></div><div class="rounded-xl border border-[#e7eceb] bg-white p-6"><p class="text-sm font-bold text-[#173042]">{{ __('messages.reviews_written') }}</p><p class="mt-3 text-3xl font-bold text-[#e76f51]">0</p><p class="mt-2 text-sm text-[#607985]">{{ __('messages.your_published_experiences') }}</p></div></div>
                @elseif (auth()->user()->isAgencyOwner())
                    <p class="text-xs font-bold uppercase tracking-[.2em] text-[#e76f51]">{{ __('messages.agency_workspace') }}</p>
                    <h1 class="mt-3 font-serif text-4xl tracking-tight text-[#173042] sm:text-5xl">{{ __('messages.agency_dashboard') }}</h1>
                    <p class="mt-4 max-w-2xl text-base leading-7 text-[#607985]">{{ __('messages.welcome_agency_user', ['name' => auth()->user()->name]) }}</p>
                    <div class="mt-10 grid gap-5 sm:grid-cols-3"><div class="rounded-xl border border-[#e7eceb] bg-white p-6"><p class="text-sm font-bold text-[#173042]">{{ __('messages.profile_status') }}</p><p class="mt-3 text-xl font-bold text-[#e76f51]">{{ __('messages.draft') }}</p><p class="mt-2 text-sm text-[#607985]">{{ __('messages.complete_your_agency_details') }}</p></div><div class="rounded-xl border border-[#e7eceb] bg-white p-6"><p class="text-sm font-bold text-[#173042]">{{ __('messages.verification') }}</p><p class="mt-3 text-xl font-bold text-[#e76f51]">{{ __('messages.pending') }}</p><p class="mt-2 text-sm text-[#607985]">{{ __('messages.submit_documents_for_review') }}</p></div><div class="rounded-xl border border-[#e7eceb] bg-white p-6"><p class="text-sm font-bold text-[#173042]">{{ __('messages.new_inquiries') }}</p><p class="mt-3 text-3xl font-bold text-[#e76f51]">0</p><p class="mt-2 text-sm text-[#607985]">{{ __('messages.customer_requests_to_manage') }}</p></div></div>
                @else
                    <p class="text-xs font-bold uppercase tracking-[.2em] text-[#e76f51]">{{ __('messages.travelconnect') }}</p><h1 class="mt-3 font-serif text-4xl tracking-tight text-[#173042] sm:text-5xl">{{ __('messages.account_dashboard') }}</h1><p class="mt-4 text-base leading-7 text-[#607985]">{{ __('messages.authenticated_session_active', ['name' => auth()->user()->name]) }}</p>
                @endif
            </section>
        </div>
    </main>
</x-auth-layout>
