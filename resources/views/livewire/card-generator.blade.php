<div>
    {{-- Cartas en HTML --}}
    @forelse ($cards as $card)

        {{-- Tipo base --}}
        @if ($card['type'] == 'base')
            @include('livewire/cards/base')
        @endif

        {{-- Tipo unidad --}}
        @if ($card['type'] == 'unit')
            @include('livewire/cards/unit')
        @endif

    @empty
        <p>No data</p>
    @endforelse

    <div id="cards" class="flex flex-wrap"></div>
</div>