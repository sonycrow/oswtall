<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CardGenerator extends Component
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
        return view('livewire.card-generator');
    }

    /**
     * Carga la lista de cartas para la generación en una imagen
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function loadCards()
    {
        $codex  = json_decode(Storage::disk('local')->get("osw_codex.json"), true);
        $skills = json_decode(Storage::disk('local')->get("osw_skills.json"), true);
        $traits = json_decode(Storage::disk('local')->get("osw_traits.json"), true);

        foreach ($codex as $card)
        {
            $this->cards[] = $card;
            break;
        }
    }
}
