<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Tall Demo</title>

        {{-- Styles --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>

        {{-- Normalización de CSS --}}
        @include('subviews.normalizecss')

        {{-- Estilos Livewire --}}
        @livewireStyles
    </head>

    <body>
        {{-- Notificaciones --}}
        <x-notifications/>

        {{-- Layout --}}
        @include('subviews.navbar')
        <main class="p-4">
            {{-- Livewire --}}
        </main>

        {{-- Scripts de livewire y wireUI --}}
        @livewireScripts
        @wireUiScripts

        {{-- Carga de JS --}}
        <script src="{{ mix('js/app.js') }}"></script>
    </body>

</html>
