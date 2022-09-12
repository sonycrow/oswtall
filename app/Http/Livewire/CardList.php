<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CardList extends Component
{
    public array $cards = array();

    public string $lang;

    /**
     * Constructor del componente
     */
    public function mount()
    {
        $this->lang = session('locale');

        $this->loadCards();
    }

    /**
     * Vista del componente
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.card-list');
    }

    /**
     * Carga la lista de cartas para la generación en una imagen
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function loadCards()
    {
        // Codex
        $codex = json_decode(Storage::disk('local')->get("osw_codex.json"), true);

        foreach ($codex as $card)
        {
            $card['filename'] = "{$card['set']}{$card['number']}-{$card['version']}-{$this->lang}";
            $card['file']     = "/assets/cards/cb/{$card['filename']}.jpg";
            $this->cards[$card['class']][] = $card;
        }
    }
}
