<x-auth-layout title="{{ __('messages.success') }} | TravelConnect">
    <main class="flex min-h-screen items-center justify-center px-6 py-12">
        <section class="w-full max-w-md text-center">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#edf4f3] text-3xl text-[#e76f51]" aria-hidden="true">&#10003;</div>
            <p class="mt-8 text-xs font-bold uppercase tracking-[.2em] text-[#e76f51]">{{ __('messages.travelconnect') }}</p>
            <h1 class="mt-3 font-serif text-4xl tracking-tight">{{ session('message', __('messages.authentication_successful')) }}</h1>
            <p class="mt-4 text-sm text-[#607985]">{{ __('messages.taking_you_to_your_dashboard') }}</p>
        </section>
    </main>
    <script>
        window.setTimeout(() => window.location.href = @json(session('success_redirect', route('dashboard'))), 1000);
    </script>
</x-auth-layout>
