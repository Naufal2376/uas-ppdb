@php
    $brandName = filament()->getBrandName();
@endphp

<div {{ $attributes->class(['fi-logo flex items-center justify-center gap-3 text-xl font-bold leading-5 tracking-tight text-gray-950 dark:text-white']) }}>
    <img src="{{ asset('images/logo.jpg') }}" alt="{{ $brandName }}" class="h-10 w-10 rounded-lg object-cover shadow-sm ring-1 ring-slate-200 dark:ring-slate-700" />
    <div class="text-left">
        <span class="block text-base font-bold text-slate-800 dark:text-white">{{ $brandName }}</span>
        <span class="block text-[0.65rem] font-normal text-slate-500 dark:text-slate-400">SMA IT Global Academy</span>
    </div>
</div>
