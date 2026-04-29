<x-filament-panels::page>
    <x-filament::card>
        <form wire:submit="submit">
            {{ $this->form }}
            <div class="mt-4"></div>
        </form>
    </x-filament::card>
</x-filament-panels::page>