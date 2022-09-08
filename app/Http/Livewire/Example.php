<?php

namespace App\Http\Livewire;

use Livewire\Component;
use WireUi\Traits\Actions;


/**
 * Class Example
 *
 * Componente de ejemplo de Livewire
 *
 * @author Marcos Julián
 * @version 1.0, 2021-04-21
 */
class Example extends Component
{
    // WireUI
    use Actions;

    // Propiedades del componente
    public string $property;

    /**
     * Inicializador
     */
    public function mount(): void
    {
        $this->property = "string";
    }

    /**
     * Método de renderizado
     *
     * @return mixed Devuelve la vista del componente renderizada
     */
    public function render()
    {
        return view('livewire.example.example');
    }

}
