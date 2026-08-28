<x-public-layout title="Explore agencies | TravelConnect" description="Discover trusted travel agencies and connect with the right expert for your journey.">
    <x-site-header />

    <main>
        <section class="border-b border-[#dbe3e5] bg-[#f1f6f4]">
            <div class="mx-auto max-w-7xl px-6 pb-12 pt-14 lg:px-8 lg:pb-16 lg:pt-20">
                <div class="max-w-3xl">
                    <p class="text-xs font-bold uppercase tracking-[.2em] text-[#e76f51]">Travel agency directory</p>
                    <h1 class="mt-4 font-serif text-5xl leading-[1.05] tracking-tight text-[#173042] sm:text-6xl">Find an agency you can trust.</h1>
                    <p class="mt-5 max-w-2xl text-base leading-7 text-[#607985]">Compare verified travel experts by destination and specialty, then choose the team that fits your journey.</p>
                </div>

                <form action="{{ route('discover') }}" method="GET" class="mt-10 border border-[#173042] bg-white p-3 shadow-[0_12px_30px_rgba(23,48,66,.08)]">
                    <div class="grid gap-3 lg:grid-cols-[1fr_auto]">
                        <label class="relative block">
                            <span class="sr-only">Search agencies or destinations</span>
                            <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-[#e76f51]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m16.5 16.5 4 4"/></svg>
                            <input type="search" name="search" value="{{ request('search') }}" placeholder="Agency name or destination" class="w-full border border-[#173042] bg-white py-3.5 pl-12 pr-4 text-sm text-[#173042] outline-none placeholder:text-[#8a9ba0] focus:border-[#e76f51] focus:ring-2 focus:ring-[#e76f51]/15">
                        </label>
                        <button type="submit" class="flex items-center justify-center gap-2 bg-[#e76f51] px-6 py-3.5 text-sm font-bold text-white transition hover:bg-[#d95f42]"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m16.5 16.5 4 4"/></svg>Search</button>
                    </div>
                </form>
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-6 py-12 lg:px-8 lg:py-16">
            <div class="flex flex-col justify-between gap-4 border-b border-[#dbe3e5] pb-6 sm:flex-row sm:items-center">
                <div><p class="text-sm font-semibold text-[#173042]">Featured agencies</p><p class="mt-1 text-sm text-[#607985]">A considered selection of trusted travel specialists.</p></div>
            </div>

            <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                <x-agency-card name="Atlas Horizon Voyages" image="https://images.unsplash.com/photo-1530789253388-582c481c54b0?auto=format&fit=crop&w=900&q=85" alt="Mountain lake destination" description="Tailor-made adventures across Europe and beyond, planned by a team that knows the routes personally." country="France" service="Adventure travel" rating="4.9" />
                <x-agency-card name="Lumiere Routes" image="https://images.unsplash.com/photo-1528127269322-539801943592?auto=format&fit=crop&w=900&q=85" alt="Tropical island coastline" description="Slow travel and beautiful escapes, thoughtfully planned around the details that make a journey memorable." country="Portugal" service="Luxury escapes" rating="4.8" />
                <x-agency-card name="Northstar Escapes" image="https://images.unsplash.com/photo-1522083165195-3424ed129620?auto=format&fit=crop&w=900&q=85" alt="Traveler looking over a scenic valley" description="Family journeys built around practical planning, local insight, and the moments that matter." country="Canada" service="Family holidays" rating="4.9" />
            </div>

            <div class="mt-12 border border-dashed border-[#b9c9c9] bg-[#fbfaf7] px-6 py-10 text-center"><p class="text-sm font-bold text-[#173042]">Looking for something specific?</p><p class="mt-2 text-sm text-[#607985]">Use the search above to narrow agencies by destination or travel style.</p></div>
        </section>

        <section class="border-t border-[#e7eceb] bg-white"><div class="mx-auto flex max-w-7xl flex-col justify-between gap-5 px-6 py-12 sm:flex-row sm:items-center lg:px-8"><div><p class="text-sm font-bold text-[#173042]">Are you a travel professional?</p><p class="mt-1 text-sm text-[#607985]">Build a profile that helps the right travelers find you.</p></div><a href="{{ route('register.agency') }}" class="inline-flex w-fit items-center gap-3 rounded-lg bg-[#173042] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#26495d]">Register your agency <span aria-hidden="true">&rarr;</span></a></div></section>
    </main>

    <x-site-footer />
</x-public-layout>
