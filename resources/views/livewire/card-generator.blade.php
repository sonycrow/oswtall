<div>
    {{-- Cartas en HTML --}}
    @forelse ($cards as $card)

        {{-- Tipo base --}}
        @if ($card['type'] == 'base')
            @include('cards/base')
        @endif

        {{-- Tipo unidad --}}
        @if ($card['type'] == 'unit')
            @include('cards/unit')
        @endif

    @empty
        <p>No data</p>
    @endforelse
</div>