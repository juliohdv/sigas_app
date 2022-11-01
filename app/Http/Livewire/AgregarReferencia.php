<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Referencia;
use App\Models\TipoReferencia;

class AgregarReferencia extends Component
{
    public bool $mas = false;
    public $referencias;
    
    public function mount()
    {
        
        
    }
    
    public function render()
    {
        $tipoReferencias = TipoReferencia::get()->all();
        return view('livewire.agregar-referencia',['tipoReferencias' => $tipoReferencias]);
    }

    public function mas()
    {
        $this->mas = !$this->mas;
    }
}
