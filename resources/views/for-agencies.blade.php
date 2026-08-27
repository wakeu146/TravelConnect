<x-public-layout title="For agencies | TravelConnect" description="Build, verify, and grow your travel agency with TravelConnect.">
    <x-site-header />
    <main class="mx-auto max-w-7xl px-6 py-16 lg:px-8 lg:py-24">
        <p class="text-xs font-bold uppercase tracking-[.2em] text-[#e76f51]">For travel professionals</p>
        <h1 class="mt-4 max-w-2xl font-serif text-5xl tracking-tight sm:text-6xl">Put your expertise in front of the right travelers.</h1>
        <p class="mt-6 max-w-xl text-lg leading-8 text-[#607985]">Create a trusted agency profile, show your specialties, and manage qualified inquiries from one professional workspace.</p>
        <div id="join" class="mt-16 grid gap-6 md:grid-cols-3">
            <x-agency-benefit number="01" title="Present your expertise" description="Showcase your destinations, services, and the experience your agency creates." />
            <x-agency-benefit number="02" title="Build trust" description="Use verification, reviews, and a trust score to make your profile credible." />
            <x-agency-benefit number="03" title="Manage inquiries" description="Receive qualified requests and build relationships with customers who value your expertise." />
        </div>
        <section id="verification" class="mt-20 border-y border-[#e7eceb] py-14 lg:mt-24 lg:py-16"><div class="grid gap-8 md:grid-cols-[.8fr_1.2fr] md:items-center"><div><p class="text-xs font-bold uppercase tracking-[.2em] text-[#e76f51]">Simple verification</p><h2 class="mt-3 font-serif text-3xl tracking-tight sm:text-4xl">A clear path to being trusted.</h2></div><p class="max-w-xl leading-7 text-[#607985]">Create your profile, upload your license or business documents, and wait for review. Once approved, your verified agency can appear in the traveler directory.</p></div></section>
        <section id="resources" class="pt-16 text-center lg:pt-20"><h2 class="font-serif text-3xl tracking-tight sm:text-4xl">Ready to grow your agency?</h2><p class="mx-auto mt-4 max-w-lg leading-7 text-[#607985]">Create your account, complete your business profile, and start building a trusted presence.</p><a href="{{ route('register.agency') }}" class="mt-7 inline-flex rounded-xl bg-[#173042] px-6 py-3.5 text-sm font-bold text-white transition hover:bg-[#26495d]">Create agency account <span class="ml-3">&rarr;</span></a></section>
    </main>
    <x-site-footer />
</x-public-layout>
