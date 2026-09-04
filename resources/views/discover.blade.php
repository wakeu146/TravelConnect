<x-account-shell title="{{ __('messages.travel_agency_directory') }} | TravelConnect">

    <main data-discover-page>
        <section data-discover-hero class="border-b border-[#dbe3e5] bg-[#f1f6f4]">
            <div class="mx-auto max-w-7xl px-6 pb-12 pt-14 lg:px-8 lg:pb-16 lg:pt-20">
                <div class="max-w-3xl">
                    <p class="text-xs font-bold uppercase tracking-[.2em] text-[#e76f51]">{{ __('messages.travel_agency_directory') }}</p>
                    <h1 class="mt-4 font-serif text-5xl leading-[1.05] tracking-tight text-[#173042] sm:text-6xl">{{ __('messages.find_agency_you_can_trust') }}</h1>
                    <p class="mt-5 max-w-2xl text-base leading-7 text-[#607985]">{{ __('messages.compare_verified_travel_experts') }}</p>
                </div>

                <form data-discover-search action="{{ route('discover') }}" method="GET" class="mt-10 border border-[#173042] bg-white p-3 shadow-[0_12px_30px_rgba(23,48,66,.08)]">
                    <div class="grid gap-3 lg:grid-cols-[1fr_auto]">
                        <label class="relative block">
                            <span class="sr-only">{{ __('messages.search_agencies_or_destinations') }}</span>
                            <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-[#e76f51]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m16.5 16.5 4 4"/></svg>
                            <input type="search" name="search" value="{{ request('search') }}" placeholder="{{ __('messages.agency_name_or_destination') }}" class="w-full border border-[#173042] bg-white py-3.5 pl-12 pr-4 text-sm text-[#173042] outline-none placeholder:text-[#8a9ba0] focus:border-[#e76f51] focus:ring-2 focus:ring-[#e76f51]/15">
                        </label>
                        <button type="submit" class="flex items-center justify-center gap-2 bg-[#e76f51] px-6 py-3.5 text-sm font-bold text-white transition hover:bg-[#d95f42]"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m16.5 16.5 4 4"/></svg>{{ __('messages.search') }}</button>
                    </div>
                </form>
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-6 py-12 lg:px-8 lg:py-16">
            <div class="flex flex-col justify-between gap-4 border-b border-[#dbe3e5] pb-6 sm:flex-row sm:items-center">
                <div><p class="text-sm font-semibold text-[#173042]">{{ __('messages.featured_agencies') }}</p><p class="mt-1 text-sm text-[#607985]">{{ __('messages.considered_selection') }}</p></div>
            </div>

            <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">@forelse ($agencies as $agency)<x-agency-card :name="$agency->company_name" :saved="in_array($agency->company_name, $savedAgencyNames, true)" :countries="$agency->countries->pluck('name')->all()" image="https://images.unsplash.com/photo-1530789253388-582c481c54b0?auto=format&fit=crop&w=900&q=85" :alt="$agency->company_name" :description="$agency->company_name === 'Blue Fern Expeditions' ? 'Expeditions across the South Pacific, planned with local expertise and a spirit of discovery.' : $agency->description" :service="$agency->services->first()?->name" :rating="$agency->published_rating ? number_format($agency->published_rating, 1) : '—'" />@empty<div class="dashboard-panel col-span-full border-dashed border-[#cbd9d8] bg-transparent p-12 text-center"><p class="font-bold">{{ __('messages.no_agencies_found') }}</p><p class="mt-2 text-sm text-[#607985]">{{ __('messages.try_another_search') }}</p></div>@endforelse</div>

            <div class="mt-12 border border-dashed border-[#b9c9c9] bg-[#fbfaf7] px-6 py-10 text-center"><p class="text-sm font-bold text-[#173042]">{{ __('messages.looking_for_something_specific') }}</p><p class="mt-2 text-sm text-[#607985]">{{ __('messages.use_search_above') }}</p></div>
        </section>

    </main>

</x-account-shell>
