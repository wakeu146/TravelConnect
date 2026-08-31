<x-public-layout title="{{ __('navigation.for_travel_professionals') }} | TravelConnect" description="{{ __('navigation.travelers_and_agencies_description') }}">
    <x-site-header />
    <main class="mx-auto max-w-7xl px-6 py-16 lg:px-8 lg:py-24">
        <p class="text-xs font-bold uppercase tracking-[.2em] text-[#e76f51]">{{ __('navigation.for_travel_professionals') }}</p>
        <h1 class="mt-4 max-w-2xl font-serif text-5xl tracking-tight sm:text-6xl">{{ __('navigation.turn_your_expertise') }}</h1>
        <p class="mt-6 max-w-xl text-lg leading-8 text-[#607985]">{{ __('navigation.create_trusted_profile') }}</p>
        <div id="join" class="mt-16 grid gap-6 md:grid-cols-3">
            <x-agency-benefit number="01" title="{{ __('navigation.present_your_expertise') }}" description="{{ __('navigation.showcase_destinations') }}" />
            <x-agency-benefit number="02" title="{{ __('navigation.build_trust') }}" description="{{ __('navigation.use_verification') }}" />
            <x-agency-benefit number="03" title="{{ __('navigation.manage_inquiries_short') }}" description="{{ __('navigation.receive_qualified_requests') }}" />
        </div>
        <section id="verification" class="mt-20 border-y border-[#e7eceb] py-14 lg:mt-24 lg:py-16"><div class="grid gap-8 md:grid-cols-[.8fr_1.2fr] md:items-center"><div><p class="text-xs font-bold uppercase tracking-[.2em] text-[#e76f51]">{{ __('navigation.simple_verification') }}</p><h2 class="mt-3 font-serif text-3xl tracking-tight sm:text-4xl">{{ __('navigation.clear_path_to_be_trusted') }}</h2></div><p class="max-w-xl leading-7 text-[#607985]">{{ __('navigation.create_profile_upload_documents') }}</p></div></section>
        <section id="resources" class="pt-16 text-center lg:pt-20"><h2 class="font-serif text-3xl tracking-tight sm:text-4xl">{{ __('navigation.ready_to_grow') }}</h2><p class="mx-auto mt-4 max-w-lg leading-7 text-[#607985]">{{ __('navigation.create_account_to_start') }}</p><a href="{{ route('register.agency') }}" class="mt-7 inline-flex rounded-xl bg-[#173042] px-6 py-3.5 text-sm font-bold text-white transition hover:bg-[#26495d]">{{ __('navigation.create_agency_account') }} <span class="ml-3">&rarr;</span></a></section>
    </main>
    <x-site-footer />
</x-public-layout>
