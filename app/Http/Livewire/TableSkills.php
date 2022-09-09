<?php

namespace App\Http\Livewire;

use App\Http\Helpers\TranslateHelper;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class TableSkills extends Component
{
    // Propiedades de Datatable
    public array $props = [
        "allowSelection" => false
    ];

    public array $headers  = array();
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
        return view('livewire.table-skills');
    }

    /**
     * Genera las cabeceras de la tabla
     */
    private function loadHeaders(): void
    {
        $this->headers = array(
            array("key" => "id", "value" => "ID"),
            array("key" => "name", "value" => "Keyword"),
            array("key" => "desc", "value" => "Description")
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
        $skills = json_decode(Storage::disk('local')->get("osw_skills.json"), true);

        foreach ($skills as $skill)
        {
            // Genera el elemento final
            $this->elements[] = array
            (
                "id"   => $skill['code'],
                "name" => "{{$skill['code']}|" . ($skill['name'][$this->lang] ?? $skill['name']['es']) . "}",
                "desc" => TranslateHelper::help($skills, array(), $skill['desc'][$this->lang], $this->lang)
            );
        }
    }
}
