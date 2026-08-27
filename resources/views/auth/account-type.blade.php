<x-auth-layout title="Choose account type | TravelConnect">
    <main class="grid min-h-screen lg:grid-cols-2">
        <section class="relative hidden overflow-hidden bg-[#173042] lg:block">
            <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1400&q=85" alt="Sunlit coastal landscape" class="absolute inset-0 h-full w-full object-cover opacity-60">
            <div class="absolute inset-0 bg-[linear-gradient(145deg,rgba(16,39,54,.95),rgba(23,48,66,.35))]"></div>
            <div class="relative flex h-full flex-col justify-between p-12 text-white xl:p-16">
                <a href="{{ route('home') }}" class="flex items-center gap-3 text-lg font-semibold"><span class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-full bg-white shadow-sm"><img src="{{ asset('images/logo.png') }}" alt="TravelConnect logo" class="h-full w-full object-contain"></span>Travel<span class="font-normal text-[#f6c9bb]">Connect</span></a>
                <div class="max-w-sm"><p class="text-xs font-bold uppercase tracking-[.2em] text-[#f6c9bb]">One platform, two ways to belong</p><h1 class="mt-5 font-serif text-5xl leading-tight">Choose the experience that fits you.</h1><p class="mt-6 text-base leading-7 text-white/70">TravelConnect connects travelers with trusted agencies and gives agency owners the tools to grow.</p></div>
                <p class="text-sm text-white/50">Meaningful journeys begin with the right connection.</p>
            </div>
        </section>
        <section class="flex min-h-screen items-center justify-center px-6 py-12 sm:px-10">
            <div class="w-full max-w-md">
                <div class="mb-10 flex items-center justify-between lg:hidden"><a href="{{ route('home') }}" class="flex items-center gap-3 text-lg font-semibold"><span class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-full bg-white shadow-sm"><img src="{{ asset('images/logo.png') }}" alt="TravelConnect logo" class="h-full w-full object-contain"></span>Travel<span class="font-normal text-[#e76f51]">Connect</span></a><a href="{{ route('home') }}" class="text-sm font-semibold text-[#607985]">Home</a></div>
                <div class="border-b border-[#dbe3e5] pb-7"><p class="text-xs font-bold uppercase tracking-[.2em] text-[#e76f51]">Create an account</p><h2 class="mt-3 font-serif text-4xl leading-tight tracking-tight">How will you use TravelConnect?</h2><p class="mt-4 text-sm leading-6 text-[#607985]">Choose the account type that matches what you want to do on the platform.</p></div>
                <div class="mt-8 grid gap-4">
                    <a href="{{ route('register.traveler') }}" class="group rounded-2xl border border-[#d7e0e1] bg-white p-5 transition hover:border-[#e76f51] hover:shadow-[0_12px_30px_rgba(23,48,66,0.08)]"><span class="flex items-center justify-between"><span class="text-lg font-bold text-[#173042]">I am a traveler</span><span class="text-xl text-[#e76f51] transition group-hover:translate-x-1" aria-hidden="true">&rarr;</span></span><span class="mt-2 block text-sm leading-6 text-[#607985]">Discover trusted agencies, save ideas, and send travel inquiries.</span></a>
                    <a href="{{ route('register.agency') }}" class="group rounded-2xl border border-[#d7e0e1] bg-white p-5 transition hover:border-[#e76f51] hover:shadow-[0_12px_30px_rgba(23,48,66,0.08)]"><span class="flex items-center justify-between"><span class="text-lg font-bold text-[#173042]">I represent an agency</span><span class="text-xl text-[#e76f51] transition group-hover:translate-x-1" aria-hidden="true">&rarr;</span></span><span class="mt-2 block text-sm leading-6 text-[#607985]">Create your business profile, complete verification, and manage inquiries.</span></a>
                </div>
                <p class="mt-8 text-center text-sm text-[#607985]">Already have an account? <a href="{{ route('login') }}" class="font-semibold text-[#e76f51] hover:text-[#b94d35]">Log in</a></p>
            </div>
        </section>
    </main>
</x-auth-layout>
