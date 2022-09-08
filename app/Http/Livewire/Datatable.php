<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Datatable extends Component
{
    public array $headers = array();
    public array $elements = array();

    public string $lang;

    public function mount()
    {
        $this->lang = session('locale');

        $this->loadHeaders();
        $this->loadElements();
    }

    public function render()
    {
        return view('livewire.datatable.datatable');
    }

    public function setLang(string $lang): void
    {
        $this->lang = $lang;
        $this->loadElements();
    }

    private function loadHeaders(): void
    {
        $this->headers = array(
            array("key" => "id", "value" => "ID"),
            array("key" => "number", "value" => "Number"),
            array("key" => "name", "value" => "Name"),
            array("key" => "type", "value" => "Type"),
            array("key" => "class", "value" => "Class"),
            array("key" => "cost", "value" => "Cost"),
            array("key" => "atk", "value" => "Atk"),
            array("key" => "def", "value" => "Def"),
            array("key" => "vanguard", "value" => "Vanguard"),
            array("key" => "rearguard", "value" => "Rearguard"),
            array("key" => "ultimate", "value" => "Special / Ultimate"),
        );
    }

    private function loadElements(): void
    {
        // Init
        $this->elements = array();

        try {
            $codex = json_decode(Storage::disk('local')->get("osw_codex.json"), true);
        } catch (FileNotFoundException $e) {
            $codex = array();
        }

        foreach ($codex as $card)
        {
            $this->elements[] = array
            (
                "id"        => $card['set'] . $card['number'],
                "number"    => $card['number'],
                "name"      => $card['name'][$this->lang] ?? $card['name']['es'],
                "type"      => $card['type'],
                "class"     => $card['class'],
                "cost"      => $card['cost'] ? $card['cost'] : null,
                "atk"       => $card['atk'] ? $card['atk'] : null,
                "def"       => $card['def'] ? $card['def'] : null,
                "vanguard"  => $card['vanguard']['desc'][$this->lang]  ?? null,
                "rearguard" => $card['rearguard']['desc'][$this->lang] ?? null,
                "ultimate"  => $card['special']['desc'][$this->lang]   ?? $card['flash']['desc'][$this->lang],
            );
        }
    }
}
