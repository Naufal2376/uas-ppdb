@php
    $brandName = filament()->getBrandName();
    $brandLogo = filament()->getBrandLogo();
    $brandLogoHeight = filament()->getBrandLogoHeight() ?? '1.5rem';
    $darkModeBrandLogo = filament()->getDarkModeBrandLogo();
@endphp

<div class="fi-logo flex items-center text-xl font-bold leading-5 tracking-tight text-gray-950 dark:text-white">
    <div>
        <span class="block text-base font-bold" style="color: #0284c7;">SI-PPDB</span>
        <span class="block text-[0.65rem] font-normal text-gray-500 dark:text-gray-400">SMA IT Global Academy</span>
    </div>
</div>
