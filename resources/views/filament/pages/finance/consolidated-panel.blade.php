<form wire:submit.prevent="filter">
    {{ $this->form }}
    <x-filament::button type="submit" color="primary">Filtrar</x-filament::button>
</form>
