<?php

namespace App\Http\Livewire;

use App\Http\Helpers\TranslateHelper;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class TableCodex extends Component
{
    // Propiedades de Datatable
    public array $props = [
        "allowSelection" => false
    ];

    public array $headers = array();
    public array $elements = array();
    public string $lang;

    /**
     * Constructor del componente
     */
    public function mount()
    {
        $this->lang = session('locale');

        $this->loadHeaders();
        $this->loadElements();
    }

    /**
     * Vista del componente
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.table-codex');
    }

    /**
     * Genera las cabeceras de la tabla
     */
    private function loadHeaders(): void
    {
        $this->headers = array(
            array("key" => "id",      "value" => "ID"),
            array("key" => "number",  "value" => "Num"),
            array("key" => "name",    "value" => "Name"),
            array("key" => "traits",  "value" => "Traits"),
            array("key" => "version", "value" => "Ver"),
            array("key" => "cost",    "value" => "Cost"),
            array("key" => "atk",     "value" => "Atk"),
            array("key" => "def",     "value" => "Def"),
            array("key" => "skills",  "value" => "Skills"),
            array("key" => "vanguard",  "value" => "Vanguard"),
            array("key" => "rearguard", "value" => "Rearguard"),
            array("key" => "ultimate",  "value" => "Special / Ultimate"),
        );
    }

    /**
     * Genera los elementos de la tabla y formatea los datos
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function loadElements(): void
    {
        // Init
        $this->elements = array();
        $codex  = json_decode(Storage::disk('local')->get("osw_codex.json"), true);
        $skills = json_decode(Storage::disk('local')->get("osw_skills.json"), true);
        $traits = json_decode(Storage::disk('local')->get("osw_traits.json"), true);

        foreach ($codex as $card)
        {
            // Init
            $vanguard = $rearguard = $ultimate = $special = null;

            // Traducimos las habilidades
            try {
                $vanguard =
                    $card['vanguard']['desc'][$this->lang] ?
                        "<span class='skill-cost'>{$card['vanguard']['cost']}</span>" . TranslateHelper::help($skills, $traits, $card['vanguard']['desc'][$this->lang], $this->lang) :
                        null;
            } catch (Exception $e) {}

            try {
                $rearguard =
                    $card['rearguard']['desc'][$this->lang] ?
                        "<span class='skill-cost'>{$card['rearguard']['cost']}</span>" . TranslateHelper::help($skills, $traits, $card['rearguard']['desc'][$this->lang], $this->lang) :
                        null;
            } catch (Exception $e) {}

            try {
                $ultimate =
                    $card['ultimate']['desc'][$this->lang] ?
                        "<span class='skill-cost'>{$card['ultimate']['cost']}</span>" . TranslateHelper::help($skills, $traits, $card['ultimate']['desc'][$this->lang], $this->lang) :
                        null;
            } catch (Exception $e) {}

            try {
                $special   = $card['special']['desc'][$this->lang]   ? TranslateHelper::help($skills, $traits, $card['special']['desc'][$this->lang], $this->lang)   : null;
            } catch (Exception $e) {}

            // Genera el elemento final
            $this->elements[] = array
            (
                "id"        => strtoupper($card['set']) . $card['number'],
                "number"    => strtoupper($card['set']) . $card['number'],
                "name"      => $card['name'][$this->lang] ?? $card['name']['es'],
                "traits"    => $this->translateTraitArray($traits, $card['trait']),
                "version"   => $card['version'],
                "cost"      => $card['cost'] ? $card['cost'] : null,
                "atk"       => $card['atk'] ? $card['atk'] : null,
                "def"       => $card['def'] ? $card['def'] : null,
                "skills"    => $this->translateSkillArray($skills, $card['skill']),
                "vanguard"  => $vanguard,
                "rearguard" => $rearguard,
                "ultimate"  => $ultimate ?? $special
            );
        }
    }

    private function translateSkillArray(array $skills, ?array $array): ?string
    {
        if (!$array) return null;

        $final = "";
        foreach ($array as $item) {
            $final .= TranslateHelper::help($skills, array(), "{{$item}}", $this->lang) . " ";
        }

        return trim($final);
    }

    private function translateTraitArray(array $traits, ?array $array): ?string
    {
        if (!$array) return null;

        $final = "";
        foreach ($array as $item) {
            $final .= TranslateHelper::help(array(), $traits, "[{$item}]", $this->lang) . " ";
        }

        return trim($final);
    }
}
