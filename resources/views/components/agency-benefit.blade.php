@props(['number', 'title', 'description'])
<article class="border-t-2 border-[#e76f51] pt-6">
    <span class="text-xs font-bold tracking-[.2em] text-[#e76f51]">{{ $number }}</span>
    <h2 class="mt-4 text-xl font-semibold text-[#173042]">{{ $title }}</h2>
    <p class="mt-3 leading-7 text-[#607985]">{{ $description }}</p>
</article>
