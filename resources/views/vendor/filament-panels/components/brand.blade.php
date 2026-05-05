@php
    $brandName = filament()->getBrandName();
@endphp

<div {{ $attributes->class(['fi-brand flex items-center justify-center gap-3']) }}>
    <img src="{{ asset('images/logo.jpg') }}" alt="{{ $brandName }}" class="h-14 w-14 rounded-xl object-cover shadow-sm ring-1 ring-slate-200 dark:ring-slate-700" />
    <div class="leading-tight text-left">
        <p class="text-base font-bold text-slate-800 dark:text-white">{{ $brandName }}</p>
        <p class="text-[0.65rem] font-normal text-slate-500 dark:text-slate-400">SMA IT Global Academy</p>
    </div>
</div>
