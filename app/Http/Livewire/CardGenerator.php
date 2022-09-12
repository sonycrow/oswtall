<?php

namespace App\Http\Livewire;

use App\Http\Helpers\DescriptionHelper;
use App\Http\Helpers\TranslateHelper;
use Exception;
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

        $count = 1;
        foreach ($codex as $card)
        {
            if ($card['class'] != "spectral") continue;

            try {
                $card["special"]["desc"][$this->lang]   = TranslateHelper::help($skills, $traits, $card["special"]["desc"][$this->lang], $this->lang);
            } catch (Exception $e) {}

            try {
                $card["vanguard"]["desc"][$this->lang]  = TranslateHelper::help($skills, $traits, $card["vanguard"]["desc"][$this->lang], $this->lang);
            } catch (Exception $e) {}

            try {
                $card["rearguard"]["desc"][$this->lang] = TranslateHelper::help($skills, $traits, $card["rearguard"]["desc"][$this->lang], $this->lang);
            } catch (Exception $e) {}

            try {
                $card["ultimate"]["desc"][$this->lang]  = TranslateHelper::help($skills, $traits, $card["ultimate"]["desc"][$this->lang], $this->lang);
            } catch (Exception $e) {}


            if ($card["skill"]) {
                foreach ($card["skill"] as &$skill) {
                    $skill = DescriptionHelper::help($skills, $skill, $this->lang);
                }
            }

            if ($card["trait"]) {
                foreach ($card["trait"] as &$trait) {
                    $trait = DescriptionHelper::help($traits, $trait, $this->lang);
                }
            }

            $this->cards[] = $card;
        }
    }
}
